<!-- Begin Page Content -->

<link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
<div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="card-title">Area Report</h6>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                    <div id="map" style="width: 100%; height: 100%;"></div>
                        <!-- <div class="chart-container" style="position: relative; height:40vh;">
                            <img src="https://cdn.discordapp.com/attachments/699829022934433803/1043519428203122739/image.png" alt="vio" style="position: relative; height:43vh;">
                        </div> -->
                    </div>
                </div>
            </div>
<!-- <!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
  <title>Google Maps Multiple Markers</title> 
</head> 
<body>
  <div id="map" style="width: 100%; height: 100%;"></div>
  <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script> -->

  <script>
    var attribution = new ol.control.Attribution({
        collapsible: false
    });

    var map = new ol.Map({
        controls: ol.control.defaults({attribution: false}).extend([attribution]),
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM({
                    //  url: 'https://tile.openstreetmap.be/osmbe/{z}/{x}/{y}.png',
                    //  attributions: [ ol.source.OSM.ATTRIBUTION, 'Tiles courtesy of <a href="https://geo6.be/">GEO-6</a>' ],
                    //  maxZoom: 18
                }),
                // style: new ol.style.Style({
                //     image: new ol.style.Icon({
                //         anchor: [0.5, 1],
                //         anchorXUnits: "fraction",
                //         anchorYUnits: "fraction",
                //         src: "https://www.pinpng.com/pngs/m/75-750238_car-top-view-vector-png-transparent-png.png"
                //     })
                // })
            })
        ],
        target: 'map',
        view: new ol.View({
            center: ol.proj.fromLonLat([107.6103, -6.8877]),
            //  maxoom: 18,
            zoom: 16
        })
    });
    var layer = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: [
                new ol.Feature({
                    geometry: new ol.geom.Point(ol.proj.fromLonLat([107.6103, -6.8877])),
                    
                    
                }),
                new ol.Feature({
                    geometry: new ol.geom.Point(ol.proj.fromLonLat([107.6080,-6.8908]))
                }),
            ]
        }),
        style: new ol.style.Style({
            image: new ol.style.Icon({
                anchor: [0.5, 1],
                anchorXUnits: "fraction",
                anchorYUnits: "fraction",
                src: "https://openlayers.org/en/v3.20.1/examples/data/icon.png"
            })
        })
    });
    map.addLayer(layer);
  </script>