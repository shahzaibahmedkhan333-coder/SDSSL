<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLOF Monitoring Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js for Dynamic Data Visualization -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Leaflet for GIS Mapping -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Custom Styles -->
    <style>
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            font-size: 18px;
            padding: 12px 20px;
            text-decoration: none;
            display: block;
        }
        .sidebar a:hover {
            background-color: #007bff;
        }
        .main-content {
            margin-left: 250px;
            padding: 30px;
        }
        .card-stat {
            text-align: center;
            background-color: #f8f9fa;
        }
        .card-stat h3 {
            font-size: 2.5rem;
            color: #007bff;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                width: 100%;
                height: auto;
            }
            .main-content {
                margin-left: 0;
            }
        }
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Sidebar Navigation -->
    <div class="sidebar position-fixed">
        <h3 class="text-white text-center mb-4">GLOF Dashboard</h3>
        <a href="glof_index.php">Home</a>
        <a href="#">GLOF Risk Analysis</a>
        <a href="#">Flood Simulation</a>
        <a href="#">GLOF Data Insights</a>
        <a href="#">Live Monitoring</a>
        <a href="#">Historical Data</a>
        <a href="#">Simulation Reports</a>
        <a href="#">Map View</a>
        <a href="#">User Management</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">GLOF Monitoring System</a>
            </div>
        </nav>

        <!-- Dashboard Header -->
        <div class="container-fluid mt-4">
            <h1 class="text-center mb-5">Welcome to the GLOF Monitoring Dashboard</h1>
            <div class="row">
                <!-- Existing Cards -->
                <!-- Add more cards here if needed -->
            </div>

            <!-- Map Section -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Map View</div>
                        <div class="card-body">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table for GLOF Events -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Detailed GLOF Events</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Location</th>
                                        <th>Risk Level</th>
                                        <th>Impact</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>July 2024</td>
                                        <td>Karakoram Range</td>
                                        <td>High</td>
                                        <td>Severe Flooding</td>
                                    </tr>
                                    <!-- Add more rows dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header">Flood Risk Level Chart</div>
                        <div class="card-body">
                            <canvas id="riskLevelChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header">GLOF Prediction Chart</div>
                        <div class="card-body">
                            <canvas id="glofPredictionChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 GLOF Monitoring System. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js Dynamic Data -->
    <script>
        var ctx1 = document.getElementById('riskLevelChart').getContext('2d');
        var riskLevelChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Low', 'Moderate', 'High'],
                datasets: [{
                    label: 'Risk Level (%)',
                    data: [10, 30, 60],
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545']
                }]
            }
        });
        var ctx2 = document.getElementById('glofPredictionChart').getContext('2d');
        var glofPredictionChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Prediction Risk (%)',
                    data: [5, 10, 25, 35, 50, 60],
                    borderColor: '#007bff',
                    fill: true
                }]
            }
        });
        // Leaflet Map
        var map = L.map('map').setView([35.8617, 74.6054], 8);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18
        }).addTo(map);
          // Adding Markers for Potential GLOF Areas
    var areas = [
        { name: "Shisper Glacier (Hunza)", coords: [36.417, 74.776] },
        { name: "Passu Glacier (Hunza)", coords: [36.492, 74.888] },
        { name: "Bagrot Valley (Gilgit)", coords: [35.966, 74.453] },
        { name: "Skardu Region", coords: [35.353, 75.536] },
        { name: "Khurdopin Glacier (Shimshal)", coords: [36.454, 75.235] },
        { name: "Ratti Gali Lake (Neelum Valley)", coords: [34.845, 74.342] },
        { name: "Chitral Region", coords: [35.846, 71.800] }
    ];

    // Adding Markers with Popups
    areas.forEach(area => {
        L.marker(area.coords)
            .addTo(map)
            .bindPopup(`<b>${area.name}</b>`);
    });
    </script>
</body>
</html>
