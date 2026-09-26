<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potential GLOF Scenarios in Pakistan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
        }

        .container {
            margin-top: 20px;
        }

        h2 {
            color: #0056b3;
            font-size: 1.6rem;
            margin-bottom: 20px;
        }

        .card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f1f1f1;
            font-weight: bold;
            padding: 8px;
            font-size: 1.1rem;
        }

        .card-body {
            padding: 15px;
        }

        .map {
            height: 180px; /* Reduced map height */
            margin-top: 15px;
            border-radius: 8px;
        }

        .chart-container {
            margin-top: 15px;
        }

        .chart-container canvas {
            border-radius: 8px;
        }

        .image-container {
            margin-top: 15px;
            text-align: center;
        }

        img {
            max-width: 90%;
            height: auto;
            border-radius: 8px;
        }

        .analysis-text {
            font-size: 0.95rem;
            margin-top: 10px;
            line-height: 1.5;
        }

        .location-info {
            margin-bottom: 8px;
        }

        .location-info strong {
            font-weight: bold;
        }

        /* Adjustments for smaller screens */
        @media (max-width: 767px) {
            .map {
                height: 180px;
            }

            .chart-container canvas {
                width: 100% !important;
            }

            img {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- GLOF in Hunza Valley -->
        <div class="card">
            <div class="card-header">GLOF Scenario in Hunza Valley</div>
            <div class="card-body">
                <div class="location-info">
                    <p><strong>Location:</strong> Hunza Valley, Gilgit-Baltistan, Pakistan</p>
                    <p><strong>Coordinates:</strong> Latitude: 36.4, Longitude: 74.7</p>
                </div>

                <!-- Map -->
                <div id="map1" class="map"></div>

                <!-- Chart -->
                <div class="chart-container">
                    <canvas id="chart1" width="300" height="150"></canvas>
                </div>

                <!-- Analysis -->
                <div class="analysis-text">
                    <p><strong>Analysis:</strong> Hunza Valley, a popular tourist location, is vulnerable to GLOF events due to its proximity to glacier-fed lakes. These floods can cause significant infrastructure damage and disrupt the local economy.</p>
                </div>

                <!-- Image -->
                <div class="image-container">
                    <img src="hunza_image.jpg" alt="Hunza Valley GLOF">
                </div>
            </div>
        </div>

        <!-- GLOF in Swat Valley -->
        <div class="card">
            <div class="card-header">GLOF Scenario in Swat Valley</div>
            <div class="card-body">
                <div class="location-info">
                    <p><strong>Location:</strong> Swat Valley, Khyber Pakhtunkhwa, Pakistan</p>
                    <p><strong>Coordinates:</strong> Latitude: 35.1, Longitude: 72.6</p>
                </div>

                <!-- Map -->
                <div id="map2" class="map"></div>

                <!-- Chart -->
                <div class="chart-container">
                    <canvas id="chart2" width="300" height="150"></canvas>
                </div>

                <!-- Analysis -->
                <div class="analysis-text">
                    <p><strong>Analysis:</strong> Swat Valley is prone to flash floods, including GLOFs, due to the melting of glaciers. Rapid urbanization and agricultural expansion increase the risk of damage from such floods.</p>
                </div>

                <!-- Image -->
                <div class="image-container">
                    <img src="swat_image.jpg" alt="Swat Valley GLOF">
                </div>
            </div>
        </div>

        <!-- GLOF in Chitral -->
        <div class="card">
            <div class="card-header">GLOF Scenario in Chitral</div>
            <div class="card-body">
                <div class="location-info">
                    <p><strong>Location:</strong> Chitral Valley, Khyber Pakhtunkhwa, Pakistan</p>
                    <p><strong>Coordinates:</strong> Latitude: 35.8, Longitude: 71.8</p>
                </div>

                <!-- Map -->
                <div id="map3" class="map"></div>

                <!-- Chart -->
                <div class="chart-container">
                    <canvas id="chart3" width="300" height="150"></canvas>
                </div>

                <!-- Analysis -->
                <div class="analysis-text">
                    <p><strong>Analysis:</strong> Chitral, situated near several glacial lakes, is vulnerable to GLOFs. These floods have historically caused significant damage to local communities, infrastructure, and agriculture.</p>
                </div>

                <!-- Image -->
                <div class="image-container">
                    <img src="chitral_image.jpg" alt="Chitral Valley GLOF">
                </div>
            </div>
        </div>

    </div>

    <!-- Map Scripts (Leaflet.js) -->
    <script>
        // Hunza Valley Map
        var map1 = L.map('map1').setView([36.4, 74.7], 8);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map1);
        L.marker([36.4, 74.7]).addTo(map1)
            .bindPopup("GLOF Scenario in Hunza Valley")
            .openPopup();

        // Swat Valley Map
        var map2 = L.map('map2').setView([35.1, 72.6], 8);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map2);
        L.marker([35.1, 72.6]).addTo(map2)
            .bindPopup("GLOF Scenario in Swat Valley")
            .openPopup();

        // Chitral Map
        var map3 = L.map('map3').setView([35.8, 71.8], 8);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map3);
        L.marker([35.8, 71.8]).addTo(map3)
            .bindPopup("GLOF Scenario in Chitral")
            .openPopup();
    </script>

    <!-- Chart Scripts (Chart.js) -->
    <script>
        // Hunza Valley Chart
        var ctx1 = document.getElementById('chart1').getContext('2d');
        var chart1 = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5'],
                datasets: [{
                    label: 'GLOF Impact in Hunza',
                    data: [10, 15, 8, 12, 20],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true
                }]
            }
        });

        // Swat Valley Chart
        var ctx2 = document.getElementById('chart2').getContext('2d');
        var chart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5'],
                datasets: [{
                    label: 'GLOF Impact in Swat',
                    data: [14, 18, 10, 13, 25],
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    fill: true
                }]
            }
        });

        // Chitral Valley Chart
        var ctx3 = document.getElementById('chart3').getContext('2d');
        var chart3 = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5'],
                datasets: [{
                    label: 'GLOF Impact in Chitral',
                    data: [12, 16, 9, 10, 22],
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: true
                }]
            }
        });
    </script>

    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
