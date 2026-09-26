<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time GLOF Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="realtime.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
        }
        .data-card {
            transition: transform 0.3s ease-in-out;
        }
        .data-card:hover {
            transform: translateY(-10px);
        }
        .card-header {
            background-color: #2c3e50;
            color: #fff;
            font-weight: bold;
        }
        .card-body {
            background-color: #ecf0f1;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-text {
            font-size: 1rem;
            color: #34495e;
        }
        .container {
            margin-top: 100px;
        }
        .loading {
            text-align: center;
            font-size: 1.5rem;
            color: #34495e;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GLOF Monitoring</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="realtimedata.html">Real-Time Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container">
        <h2 class="text-center mt-5 mb-4">Real-Time GLOF Data for Pakistan</h2>

        <div id="loading" class="loading">
            Loading data...
        </div>

        <div id="data-container" class="row">
            <!-- Real-time data cards will be inserted here dynamically -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2024 GLOF Monitoring System. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to fetch real-time data from multiple APIs
        async function fetchRealTimeData() {
            try {
                // OpenWeatherMap API (Weather Data)
                const weatherAPIKey = '2a374cbfcb82d78eefb1a6a738cc52d0';  // Replace with your OpenWeatherMap API key
                const weatherAPIUrl = `https://api.openweathermap.org/data/2.5/weather?q=Pakistan&appid=2a374cbfcb82d78eefb1a6a738cc52d0`;
                const weatherResponse = await fetch(weatherAPIUrl);
                const weatherData = await weatherResponse.json();

                // USGS Earthquake API (Earthquake Data)
                const earthquakeAPIUrl = `https://earthquake.usgs.gov/fdsnws/event/1/query?format=geojson&latitude=30&longitude=70&maxradius=10`;
                const earthquakeResponse = await fetch(earthquakeAPIUrl);
                const earthquakeData = await earthquakeResponse.json();

                // Process and display weather data
                const weatherCard = createDataCard('Weather Data', 'Weather Info for Pakistan', `Temperature: ${weatherData.main.temp}°C`, 'Learn More', weatherAPIUrl);
                document.getElementById('data-container').appendChild(weatherCard);

                // Process and display earthquake data
                earthquakeData.features.forEach(event => {
                    const earthquakeCard = createDataCard('Earthquake Data', event.properties.title, `Magnitude: ${event.properties.mag}`, 'Learn More', `https://earthquake.usgs.gov/earthquakes/eventpage/${event.id}`);
                    document.getElementById('data-container').appendChild(earthquakeCard);
                });

                // Hide loading message after data is loaded
                document.getElementById('loading').style.display = 'none';

            } catch (error) {
                console.error('Error fetching data:', error);
                document.getElementById('loading').innerHTML = 'Failed to load data. Please try again later.';
            }
        }

        // Function to create a data card element
        function createDataCard(title, subtitle, description, linkText, linkUrl) {
            const card = document.createElement('div');
            card.classList.add('col-md-4', 'mb-4');
            card.innerHTML = `
                <div class="card data-card">
                    <div class="card-header">${title}</div>
                    <div class="card-body">
                        <h5 class="card-title">${subtitle}</h5>
                        <p class="card-text">${description}</p>
                        <a href="${linkUrl}" class="btn btn-primary">${linkText}</a>
                    </div>
                </div>
            `;
            return card;
        }

        // Load real-time data when the page is loaded
        window.onload = fetchRealTimeData;
    </script>
</body>
</html>
