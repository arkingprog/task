<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple markers</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map {
            height: 100%;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>

</head>
<body>
<div style="margin: 0 auto;width: calc(100% - 100px)">
    <label for="city">Выберите город</label>
    <select name="" id="city" >
        <option value="empty">Выберите город</option>
    </select>
    <br>
    <label for="city">Выберите отделение</label>
    <select name="" id="warehouse"></select>

</div>
<div id="map"></div>

<script src="index.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANiMwGfErilTPm9qmtAiJ2YbElZxuY64U&signed_in=true&callback=initMap"></script>
</body>
</html>