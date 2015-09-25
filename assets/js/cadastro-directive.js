(function(angular){
    'use strict';

    var app = angular.module('culturaviva.directives', []);

    app.directive('leaflet', function() {
        return {
            'restrict': 'E',
            'template': '<div class="leaflet-canvas">leafleft</div>',
            'scope': {
                'markers': '=markers'
            },
            'link': function(scope, element, attribute) {
                var target = element.context.firstElementChild;

                var config = {
                    center: [-23.548991, -46.633328],
                    zoom: 3
                };

                var map = L.map(target).setView(config.center, config.zoom);
                var layer = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                layer.addTo(map);

                /* Controle de markers */

                var markers = { };

                function add_marker(idx, lat, lon, text) {console.log('3>', arguments);
                    var marker = L.marker([lat, lon]);
                    marker.bindPopup(text);
                    marker.addTo(map);

                    markers[idx] = marker;
                    return marker;
                }

                function remove_marker(idx) {
                    var marker = markers[idx];
                    map.removeLayer(marker);
                    markers[idx] = undefined;
                    delete markers[idx];
                    return marker;
                }

                function update_markers(points, points2)
                {
                    if(!points){
                        return;
                    }

                    var marker, point;
                    for(var idx in markers) {
                        marker = markers[idx];
                        point = points[idx];

                        if(marker){
                            if(!point){
                                remove_marker(idx);
                            } else {
                                marker.setLatLng({lat: point.lat, lon: point.lng});
                                marker.setPopupContent(point.message);
                            }
                        }
                    }

                    for(idx in points) {
                        marker = markers[idx];
                        point = points[idx];

                        if(!marker && point) {console.log('2>', point);
                            add_marker(idx, point.lat, point.lng, point.message);
                        }
                    }

                    if (markers.main) {
                        map.panTo(markers.main.getLatLng());
                    }
                }

                scope.$watch('markers', update_markers, true);
            }
        };
    });

})(window.angular);