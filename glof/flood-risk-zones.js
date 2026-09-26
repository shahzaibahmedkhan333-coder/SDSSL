// Initialize Map
const map = L.map('map').setView([30.3753, 69.3451], 6); // Centered in Pakistan

// Add OpenStreetMap Layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19
}).addTo(map);

// Dynamic Data for Flood Risk Zones in Pakistan
const floodZones = [
    { name: 'Gilgit-Baltistan', lat: 35.88, lon: 74.64, risk: 'high', region: 'gilgit-baltistan' },
    { name: 'Chitral', lat: 35.85, lon: 71.78, risk: 'medium', region: 'chitral' },
    { name: 'Swat', lat: 35.22, lon: 72.43, risk: 'severe', region: 'swat' },
    { name: 'Lahore', lat: 31.52, lon: 74.35, risk: 'low', region: 'punjab' },
    { name: 'Karachi', lat: 24.86, lon: 67.01, risk: 'medium', region: 'sindh' },
    { name: 'Peshawar', lat: 34.01, lon: 71.57, risk: 'high', region: 'kpk' },
    { name: 'Quetta', lat: 30.18, lon: 66.99, risk: 'low', region: 'balochistan' }
];

// Add Markers Dynamically
function addMarkers(filteredZones) {
    map.eachLayer(layer => {
        if (layer instanceof L.Marker) map.removeLayer(layer); // Clear old markers
    });

    filteredZones.forEach(zone => {
        L.marker([zone.lat, zone.lon])
            .bindPopup(`<b>${zone.name}</b><br>Risk
