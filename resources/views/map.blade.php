<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Display a map on a webpage</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v3.7.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v3.7.0/mapbox-gl.js"></script>
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>
<body>
<div id="map"></div>
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoibWF1bGFuYWRldmVsb3AiLCJhIjoiY20yMGJwZXhuMGY1NTJrcHA4MW83YThuOSJ9.2zcYyZ4YS9mzFMhSuR1aIQ';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        center: [110.42426254790294, -7.026351176160473], // starting position [lng, lat]. Note that lat must be set between -90 and 90
        zoom: 14 // starting zoom
    });
</script>

</body>
</html>