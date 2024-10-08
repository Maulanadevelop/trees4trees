<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Display a map on a webpage</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.7.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.7.0/mapbox-gl.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }

        .marker {
            background-color: white;
            border: 3px solid lightseagreen;
            padding: 6px;
            border-radius: 100px;
            position: absolute;
        }

        .marker:hover {
            background-color: white;
            border: 3px solid lightseagreen;
            padding: 12px;
            border-radius: 100px;
            position: absolute;
            cursor: pointer;
        }

        .popup {
            position: absolute;
            padding: 15px 25px;
            margin-left: 19px;
            margin-top: 8px;
            font-size: 16px;
            background-color: white;
            box-shadow: 1px 1px 5px dimgrey;
            border-radius: 2px 15px 15px 15px;
            color: #36454f;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    @foreach($lands as $key => $land)
        <div id="marker-{{$key}}" class="marker"></div>
    @endforeach
</body>

<script>
    const default_coord = {
        latitude: -6.916399183735122,
        longitude: 107.61929573865112
    }
    const lands = @json($lands)

    mapboxgl.accessToken = '{{env('MAPBOX_TOKEN')}}';
    const map = new mapboxgl.Map({
        container: 'map', // container ID
        center: [
            lands[0]?.longitude ?? default_coord.longitude,
            lands[0]?.latitude ?? default_coord.latitude
        ], // starting position [lng, lat]. Note that lat must be set between -90 and 90
        zoom: 15 // starting zoom
    });

    map.doubleClickZoom.disable();

    $(document).ready(function () {
        map.on('load', function () {

            lands.map((land, key) => {
                let marker = new mapboxgl.Marker(document.getElementById(`marker-${key}`)).setLngLat([
                    land?.longitude ?? default_coord.longitude,
                    land?.latitude ?? default_coord.latitude
                ]).addTo(map);

                $(`#marker-${key}`).on('mouseenter', () => {
                    $(`#marker-${key}`).append(`
                    <div class="popup">
                    <p>No. Lahan : ${land.land_no}</p>
                    <p>No. Petani : ${land.farmer_no}</p>
                    </div>
                    `);
                });
                $(`#marker-${key}`).on('mouseleave', () => {
                    $(`#marker-${key}`).empty();
                });

                $(`#marker-${key}`).dblclick(() => {
                    let coords = lands[key].land_area.split(';').map(coord => coord.split(',').map(Number));

                    if (map.getSource(`land-area-${key}`)) {
                        map.removeLayer(`land-area-layer-${key}`);
                        map.removeSource(`land-area-${key}`);
                    } else {
                        map.addSource(`land-area-${key}`, {
                            type: 'geojson',
                            data: {
                                type: 'Feature',
                                geometry: {
                                    type: 'Polygon',
                                    coordinates: [coords]
                                }
                            }
                        });

                        // Add a layer to display the polygon
                        map.addLayer({
                            id: `land-area-layer-${key}`,
                            type: 'fill',
                            source: `land-area-${key}`,
                            layout: {},
                            paint: {
                                'fill-color': 'pink', // Fill color
                                'fill-opacity': 0.5 // Fill opacity
                            }
                        });
                    }
                });
            })
        })
    })

</script>

</html>