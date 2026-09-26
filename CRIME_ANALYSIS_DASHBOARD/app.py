from flask import Flask, render_template, request, jsonify
import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt
import io
import base64
import os
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

# Function to convert matplotlib plots to base64 images
def plot_to_base64(fig):
    img = io.BytesIO()
    fig.savefig(img, format='png', bbox_inches='tight')
    img.seek(0)
    plot_data = base64.b64encode(img.getvalue()).decode()
    plt.close(fig)
    return plot_data

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/provincial_crime_analysis')
def provincial_crime_analysis():
    # Render the Provincial Analysis HTML file
    return render_template('Provincial_analysis.html')

@app.route('/ctd_data_analysis')
def crime_analysis():
    # Render the crime analysis page
    return render_template('ctd_data_analysis.html')  # Make sure this file exists in templates folder

@app.route('/hotspot_analysis')
def hotspot_analysis():
    # Render the Provincial Analysis HTML file
    return render_template('hotspot_analysis.html')

@app.route('/analyze', methods=['POST'])
def analyze():
    if 'csvFile' not in request.files:
        return jsonify({'error': 'No file part'}), 400

    file = request.files['csvFile']
    if file.filename == '':
        return jsonify({'error': 'No selected file'}), 400

    try:
        # Read the uploaded CSV file
        df = pd.read_csv(file)

        # Generate Bar Chart (for categorical data)
        categorical_columns = df.select_dtypes(include=['object']).columns
        if len(categorical_columns) > 0:
            bar_chart_column = categorical_columns[0]  # Use the first categorical column
            fig = plt.figure(figsize=(8, 6))
            sns.countplot(data=df, x=bar_chart_column, palette="viridis")
            plt.title(f'Distribution of {bar_chart_column}')
            bar_chart = plot_to_base64(fig)
        else:
            bar_chart = None

        # Generate Histogram (for numerical data)
        numerical_columns = df.select_dtypes(include=['float64', 'int64']).columns
        if len(numerical_columns) > 0:
            histogram_column = numerical_columns[0]  # Use the first numerical column
            fig = plt.figure(figsize=(8, 6))
            sns.histplot(df[histogram_column], kde=True, color="blue")
            plt.title(f'Distribution of {histogram_column}')
            histogram = plot_to_base64(fig)
        else:
            histogram = None

        # Generate Correlation Heatmap
        if len(numerical_columns) > 1:
            fig = plt.figure(figsize=(10, 8))
            correlation_matrix = df[numerical_columns].corr()
            sns.heatmap(correlation_matrix, annot=True, cmap="coolwarm", fmt=".2f")
            plt.title('Correlation Heatmap')
            heatmap = plot_to_base64(fig)
        else:
            heatmap = None

        # Summary Statistics
        summary_stats = df.describe().to_html(classes='table table-striped', border=0)

        return jsonify({
            "bar_chart": bar_chart,
            "histogram": histogram,
            "heatmap": heatmap,
            "summary_stats": summary_stats,
        })

    except Exception as e:
        print(f"Error processing file: {e}")
        return jsonify({'error': 'Error processing the file'}), 500

if __name__ == "__main__":
    app.run(debug=True)
