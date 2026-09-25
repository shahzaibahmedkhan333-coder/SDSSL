<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historical GLOF Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            text-align: center;
            margin: 20px 0;
        }
        .event-card {
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            background: #ffffff;
        }
        .event-card img {
            border-radius: 10px 10px 0 0;
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        .event-details {
            padding: 20px;
        }
        .event-details h3 {
            color: #2c3e50;
        }
        .map {
            width: 100%;
            height: 300px;
            border-radius: 0 0 10px 10px;
            margin-top: 10px;
        }
        .btn-back {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="header">Historical GLOF Events in Pakistan</h1>

        <!-- Event 1 -->
        <div class="event-card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Attabad_Lake.jpg/1280px-Attabad_Lake.jpg" alt="Attabad Lake GLOF">
            <div class="event-details">
                <h3>Attabad Lake GLOF (2010)</h3>
                <p>The Attabad Lake GLOF was caused by a massive landslide in the Hunza Valley, which created a natural dam and submerged villages. The Karakoram Highway was also disrupted, affecting trade and local livelihoods.</p>
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13193.406512801274!2d74.61344915000001!3d36.31172245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38e73b76ad95f1c5%3A0x347b3ad8a8b259b3!2sAttabad%20Lake!5e0!3m2!1sen!2s!4v1689123456789!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <!-- Event 2 -->
        <div class="event-card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Naltar_valley.jpg" alt="Bagrot Valley GLOF">
            <div class="event-details">
                <h3>Bagrot Valley GLOF (2008)</h3>
                <p>This GLOF in Gilgit-Baltistan resulted from the sudden release of glacial meltwater. It damaged farmlands and disrupted local communities, highlighting the vulnerability of mountainous regions to such disasters.</p>
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26104.651382588934!2d74.26686825!3d35.919187049999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38e3cddd5e6f8f7b%3A0xcbbcd58e6a616748!2sBagrot%20Valley!5e0!3m2!1sen!2s!4v1689123456789!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <!-- Event 3 -->
        <div class="event-card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Chitral_river.jpg" alt="Chitral District GLOF">
            <div class="event-details">
                <h3>Chitral District GLOF (2015)</h3>
                <p>In 2015, Chitral experienced a severe GLOF due to rapid glacial melting. Entire villages were inundated, and significant agricultural land was lost. The event highlighted the increasing risks posed by climate change.</p>
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d104805.16766548585!2d71.74829045000001!3d35.8511941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38c4cc5e9c7d8287%3A0x3470cf9e55c5d5fa!2sChitral!5e0!3m2!1sen!2s!4v1689123456789!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <a href="glof_index.php" class="btn btn-dark btn-back">Back to Home</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
