(function(angular){
    'use strict';

    var app = angular.module('culturaviva.directives', []);
    
    app.directive('taxonomyCheckboxes', function () {
        return {
            restrict: 'E',
            templateUrl: MapasCulturais.templateUrl.taxonomyCheckboxes,
            scope: {
                'taxonomy': '@',
                'restrictedTerms': '@',
                'terms': '=',
                'entity': '='
            },
            link: function ($scope, element, attribute) {
                var entity = $scope.entity;
                var taxonomy = $scope.taxonomy;
                $scope.cfg = {
                    show: false,
                    outros: ''
                };
                
                // inicializa a diretiva
                entity.$promise.then(function(){
                    setOutros();
                    $scope.cfg.show = $scope.cfg.outros.length > 0;
                });
                
                function sanitize(term){
                    if($scope.restrictedTerms){
                        return term;
                    }else{
                        return term.toLowerCase().trim();
                    }
                }
                
                // cria um array com os termos lowe case
                var terms = $scope.terms.map(function(term){
                    return sanitize(term);
                });
                
                
                // define a variavel de escopo "outros", model do input outros
                function setOutros(virgula){
                    var _outros = [];
                    entity.terms[taxonomy].forEach(function(term){
                        if(terms.indexOf(term) === -1){
                            _outros.push(term);
                        }
                    });
                    
                    $scope.cfg.outros = _outros.join(', ');
                    
                    if(virgula && $scope.cfg.outros.trim().length > 0){
                        $scope.cfg.outros += ',';
                    }
                }
                
                
                // verifica se um checkbox deve estar checkado ou não
                $scope.checked = function(term){
                    term = sanitize(term);
                    return entity.$resolved && entity.terms[taxonomy].indexOf(term) >= 0;
                };
                
                // função chamada no click do checkbox
                $scope.toggleTerm = function (term) {
                    term = sanitize(term);
                    
                    if (!angular.isArray(entity.terms[taxonomy])) {
                        entity.terms[taxonomy] = [term];
                    } else {
                        var idx = entity.terms[taxonomy].indexOf(term);
                        
                        if (idx < 0) {
                            entity.terms[taxonomy].push(term);
                        } else {
                            entity.terms[taxonomy].splice(idx, 1);
                        }
                    }
                    
                    $scope.$parent.save_field('terms');
                };
                
                // função chamada pelo input text "outros"
                $scope.update = function(e){
                    if(!e || e && e.keyCode === 188 && !e.shiftKey){
                        var _outros = $scope.cfg.outros.split(',').map(function(term){
                            return term.toLowerCase().trim();
                        });
                        
                        
                        _outros.forEach(function (term, i){
                            term = _outros[i] = term.trim();
                            
                            if(term.length && entity.terms[taxonomy].indexOf(term) === -1){
                                entity.terms[taxonomy].push(term);
                            }
                        });
                        entity.terms[taxonomy].forEach(function(term, i){
                            if(terms.indexOf(term) === -1 && _outros.indexOf(term) === -1){
                                entity.terms[taxonomy].splice(i, 1);
                            }
                        });
                        setOutros(e && e.keyCode === 188);
                        $scope.$parent.save_field('terms');
                    }
                };
            }
        };
    });
    
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
                        map.setZoom((points.main||{}).zoom || 14, true);
                        map.panTo(markers.main.getLatLng());
                    } else {
                        map.setZoom(3, true);
                    }
                }

                scope.$watch('markers', update_markers, true);
            }
        };
    });

})(window.angular);