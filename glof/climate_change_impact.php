<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLOF Impact Dashboard</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link Leaflet.js for maps -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Link Chart.js for graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            padding-top: 30px;
        }

        .map-container {
            height: 400px;
            margin-top: 20px;
        }

        .chart-container {
            margin-top: 30px;
        }

        .card {
            margin-bottom: 30px;
        }

        .nav-link:hover {
            color: #ff5733 !important;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">GLOF Impact Dashboard</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Scenarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Climate Impact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
  </div>
</nav>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!-- Dropdown for selecting GLOF scenario -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Select GLOF Scenario</h4>
                    <select class="form-select" id="glof-scenario">
                        <option selected>Choose a Scenario</option>
                        <option value="climate-change">Climate Change Impact</option>
                        <option value="glacial-lake-outburst">Glacial Lake Outburst</option>
                        <option value="historical-data">Historical GLOF Data</option>
                    </select>
                </div>
            </div>

            <!-- GLOF Risk Areas Map -->
            <div id="glof-risk-map" class="map-container"></div>

            <!-- Historical GLOF Events Map -->
            <div id="historical-glof-map" class="map-container"></div>

            <!-- Glacial Lakes Map -->
            <div id="glacial-lakes-map" class="map-container"></div>

            <!-- Snow and Ice Melt Zones Map -->
            <div id="snow-ice-melt-map" class="map-container"></div>
        </div>
        <div class="col-md-4">
            <!-- Additional Charts and Graphs -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Climate Change Impact</h4>
                    <canvas id="glof-chart"></canvas>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Temperature vs GLOF Occurrence</h4>
                    <canvas id="temperature-glof"></canvas>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Precipitation vs Glacier Melt</h4>
                    <canvas id="precipitation-glacier"></canvas>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Regional GLOF Risk Comparison</h4>
                    <canvas id="regional-risk"></canvas>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Glacial Lake Area Over Time</h4>
                    <canvas id="lake-area"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Link JS files (Bootstrap, Leaflet, and custom JS for charts) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    // Leaflet Map Initialization
    var map = L.map('glof-risk-map').setView([35.3, 73.1], 6); // Default view in Pakistan

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // GLOF Risk Areas Map
    var glofRiskAreas = [
        { lat: 35.3, lng: 73.1, name: "Hunza Valley", risk: "High" },
        { lat: 34.8, lng: 73.6, name: "Naltar Valley", risk: "Medium" },
        { lat: 35.5, lng: 72.5, name: "Chitral", risk: "High" },
        { lat: 33.7, lng: 73.7, name: "Neelum Valley", risk: "Medium" },
        { lat: 29.0, lng: 66.9, name: "Ziarat", risk: "Low" }
    ];

    glofRiskAreas.forEach(function(area) {
        var color = area.risk === "High" ? "red" : area.risk === "Medium" ? "orange" : "green";
        L.circleMarker([area.lat, area.lng], {
            color: color,
            radius: 8
        }).addTo(map).bindPopup('<b>' + area.name + '</b><br>Risk Level: ' + area.risk);
    });

    // Historical GLOF Events Map
    var historicalMap = L.map('historical-glof-map').setView([35.3, 73.1], 6);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(historicalMap);

    // Historical GLOF event markers
    var historicalEvents = [
        { lat: 35.3, lng: 73.1, event: "2015 - Hunza Valley GLOF", description: "Severe flood caused by glacier melt." },
        { lat: 34.8, lng: 73.6, event: "2012 - Naltar Valley", description: "A major glacial lake outburst led to massive flooding." }
    ];

    historicalEvents.forEach(function(event) {
        L.marker([event.lat, event.lng]).addTo(historicalMap)
            .bindPopup('<b>' + event.event + '</b><br>' + event.description);
    });

    // Glacial Lakes Map
    var glacialMap = L.map('glacial-lakes-map').setView([35.3, 73.1], 6);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(glacialMap);

    var glacialLakes = [
        { lat: 35.0, lng: 74.0, name: "Ratti Gali Lake", risk: "High" },
        { lat: 34.9, lng: 73.4, name: "Siachen Glacier", risk: "Medium" }
    ];

    glacialLakes.forEach(function(lake) {
        var color = lake.risk === "High" ? "red" : "orange";
        L.circleMarker([lake.lat, lake.lng], { color: color, radius: 8 })
            .addTo(glacialMap)
            .bindPopup('<b>' + lake.name + '</b><br>Risk Level: ' + lake.risk);
    });

    // Snow and Ice Melt Zones Map
    var snowIceMap = L.map('snow-ice-melt-map').setView([35.3, 73.1], 6);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(snowIceMap);

    var snowMeltZones = [
        { lat: 35.1, lng: 74.1, area: "Northern Gilgit-Baltistan", meltingRate: "High" },
        { lat: 34.7, lng: 73.9, area: "Eastern Chitral", meltingRate: "Medium" }
    ];

    snowMeltZones.forEach(function(zone) {
        var color = zone.meltingRate === "High" ? "blue" : "cyan";
        L.circleMarker([zone.lat, zone.lng], { color: color, radius: 8 })
            .addTo(snowIceMap)
            .bindPopup('<b>' + zone.area + '</b><br>Melting Rate: ' + zone.meltingRate);
    });

    // Chart.js Example Graph
    var ctx1 = document.getElementById('glof-chart').getContext('2d');
    var ctx2 = document.getElementById('temperature-glof').getContext('2d');
    var ctx3 = document.getElementById('precipitation-glacier').getContext('2d');
    var ctx4 = document.getElementById('regional-risk').getContext('2d');
    var ctx5 = document.getElementById('lake-area').getContext('2d');

    // Example Chart - GLOF Risk Bar Chart
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Hunza', 'Naltar', 'Chitral', 'Neelum', 'Ziarat'],
            datasets: [{
                label: 'Risk Level',
                data: [8, 6, 9, 6, 3], // Risk level score
                backgroundColor: ['red', 'orange', 'red', 'orange', 'green']
            }]
        }
    });

    // Example Temperature vs GLOF Occurrence
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Temperature (°C)',
                data: [3, 4, 8, 12, 18, 21, 24, 23, 18, 12, 7, 4],
                borderColor: 'blue',
                fill: false
            }]
        }
    });

    // Example Precipitation vs Glacier Melt
    new Chart(ctx3, {
        type: 'scatter',
        data: {
            datasets: [{
                label: 'Precipitation vs Glacier Melt',
                data: [
                    { x: 150, y: 200 }, { x: 200, y: 250 }, { x: 300, y: 400 },
                    { x: 250, y: 300 }, { x: 400, y: 500 }
                ],
                backgroundColor: 'rgba(75, 192, 192, 1)'
            }]
        }
    });

    // Regional Risk Comparison
    new Chart(ctx4, {
        type: 'pie',
        data: {
            labels: ['High Risk', 'Medium Risk', 'Low Risk'],
            datasets: [{
                data: [60, 30, 10],
                backgroundColor: ['red', 'orange', 'green']
            }]
        }
    });

    // Glacial Lake Area Over Time
    new Chart(ctx5, {
        type: 'line',
        data: {
            labels: ['2010', '2012', '2014', '2016', '2018', '2020'],
            datasets: [{
                label: 'Glacial Lake Area (sq.km)',
                data: [12, 15, 18, 22, 25, 30],
                borderColor: 'brown',
                fill: false
            }]
        }
    });

</script>
</body>
</html>
