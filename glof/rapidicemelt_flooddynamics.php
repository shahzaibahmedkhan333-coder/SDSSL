<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLOF Impact in Pakistan - Ice Melt & Flood Dynamics</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin-top: 30px; }
        #glof-map, #flood-dynamics-map { height: 400px; }
        .chart-container { width: 100%; height: 400px; }
        .card { margin-bottom: 20px; }
        .map-container { margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">GLOF Impact in Pakistan</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Rapid Ice Melt Zones in Pakistan</h5>
                </div>
                <div class="card-body">
                    <div id="glof-map"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Flood Dynamics in Glacial Regions</h5>
                </div>
                <div class="card-body">
                    <div id="flood-dynamics-map"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Ice Melt Rate Over Time</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="ice-melt-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Flood Events Frequency Over Time</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="flood-dynamics-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>River Flow vs Ice Melt</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="river-flow-correlation"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Ice Melt Impact Over Time</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="impact-over-time"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Flood Risk Heatmap</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="flood-risk-heatmap"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Ice Melt and Flood Zones Data (Updated for Pakistan's GLOFs)
var iceMeltZones = [
    { lat: 35.5, lng: 77.1, name: "Siachen Glacier", impact: "Severe" },
    { lat: 35.7, lng: 74.2, name: "Ratti Gali Lake", impact: "Moderate" },
    { lat: 35.0, lng: 74.4, name: "Shisper Glacier", impact: "Severe" },
    { lat: 36.3, lng: 74.8, name: "Passu Glacier", impact: "Moderate" },
    { lat: 35.5, lng: 71.5, name: "Chitral Valley Glaciers", impact: "High" }
];

// Flood Dynamics Data (GLOF risk in Pakistan)
var floodZones = [
    { lat: 35.5, lng: 77.1, name: "Siachen Glacier Flood Zone", risk: "High" },
    { lat: 35.7, lng: 74.2, name: "Ratti Gali Flood Zone", risk: "Moderate" },
    { lat: 35.0, lng: 74.4, name: "Shisper Glacier Flood Zone", risk: "High" },
    { lat: 36.3, lng: 74.8, name: "Passu Glacier Flood Zone", risk: "Moderate" },
    { lat: 35.5, lng: 71.5, name: "Chitral Flood Zone", risk: "High" }
];

// Create Ice Melt Impact Zones Map
var iceMeltImpactZonesMap = L.map('glof-map').setView([35.3, 73.1], 6);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(iceMeltImpactZonesMap);

iceMeltZones.forEach(function(zone) {
    var color = zone.impact === "Severe" ? "red" : "orange";
    L.circleMarker([zone.lat, zone.lng], { color: color, radius: 8 })
        .addTo(iceMeltImpactZonesMap)
        .bindPopup('<b>' + zone.name + '</b><br>Impact: ' + zone.impact);
});

// Create Flood Dynamics Map
var floodDynamicsMap = L.map('flood-dynamics-map').setView([35.3, 73.1], 6);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(floodDynamicsMap);

floodZones.forEach(function(zone) {
    var color = zone.risk === "High" ? "red" : "yellow";
    L.circleMarker([zone.lat, zone.lng], { color: color, radius: 8 })
        .addTo(floodDynamicsMap)
        .bindPopup('<b>' + zone.name + '</b><br>Flood Risk: ' + zone.risk);
});

// Ice Melt Rate Over Time Chart
var ctx1 = document.getElementById('ice-melt-chart').getContext('2d');
new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['Siachen', 'Ratti Gali', 'Shisper', 'Passu', 'Chitral'],
        datasets: [{
            label: 'Ice Melt Rate (cm per year)',
            data: [10, 12, 15, 7, 5],
            backgroundColor: ['red', 'orange', 'blue', 'green', 'purple']
        }]
    }
});

// Flood Dynamics Frequency Chart
var ctx2 = document.getElementById('flood-dynamics-chart').getContext('2d');
new Chart(ctx2, {
    type: 'line',
    data: {
        labels: ['2010', '2012', '2014', '2016', '2018', '2020'],
        datasets: [{
            label: 'Flood Events Frequency',
            data: [2, 4, 6, 8, 10, 12],
            borderColor: 'red',
            fill: false
        }]
    }
});

// River Flow vs Ice Melt Correlation Chart
var ctx3 = document.getElementById('river-flow-correlation').getContext('2d');
new Chart(ctx3, {
    type: 'scatter',
    data: {
        datasets: [{
            label: 'River Flow vs Ice Melt',
            data: [
                { x: 10, y: 2 }, { x: 12, y: 4 }, { x: 15, y: 6 },
                { x: 7, y: 2 }, { x: 5, y: 1 }
            ],
            backgroundColor: 'rgba(75, 192, 192, 1)'
        }]
    }
});

// Ice Melt Impact Over Time Chart
var ctx4 = document.getElementById('impact-over-time').getContext('2d');
new Chart(ctx4, {
    type: 'radar',
    data: {
        labels: ['Siachen', 'Ratti Gali', 'Shisper', 'Passu', 'Chitral'],
        datasets: [{
            label: 'Ice Melt Impact',
            data: [5, 7, 9, 6, 4],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    }
});

// Flood Risk Heatmap Chart
var ctx5 = document.getElementById('flood-risk-heatmap').getContext('2d');
new Chart(ctx5, {
    type: 'heatmap',
    data: {
        labels: ['Siachen', 'Ratti Gali', 'Shisper', 'Passu', 'Chitral'],
        datasets: [{
            data: [
                [35.5, 77.1, 0.9], [35.7, 74.2, 0.8], [35.0, 74.4, 0.9],
                [36.3, 74.8, 0.7], [35.5, 71.5, 0.85]
            ],
            backgroundColor: 'rgba(255, 99, 132, 0.5)'
        }]
    }
});
</script>

</body>
</html>
