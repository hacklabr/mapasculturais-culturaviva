(function(angular){
    'use strict';

    var app = angular.module('culturaviva.services', ['ngResource']);

    app.factory('MapasCulturais', function (){
        if(!window.MapasCulturais) {
            throw new Error('É necessário ter o obj "MapasCulturais" em window');
        }
        return window.MapasCulturais;
    });


    app.factory('Agent', ['$resource', '$http', 'MapasCulturais',
        function($resource, $http, MapasCulturais){
            var resourceConfig = {
                'get':  {
                    'method':'GET',
                    'params':{
                        '@select': 'id,singleUrl,name,rg,rg_orgao,relacaoPonto,cpf,geoEstado,'+
                                   'emailPrivado,telefone1,telefone1_operadora,nomeCompleto,'+
                                   // 'geoCidade,facebook,twitter,googleplus',
                                   'geoMunicipio,facebook,twitter,googleplus,mesmoEndereco',
                        '@permissions': 'view'
                    }
                }
            };

            var getUrl = '/api/agent/findOne?id=EQ(:id)';
            var Agent = $resource(getUrl, {'id': '@id'}, resourceConfig);

            Agent.prototype.patch = function patch_responsible(field) {
                var patchUrl = MapasCulturais.createUrl('agent','single',[this.id]);

                if(!(this.id && this.hasOwnProperty(field) && patchUrl)) {
                    throw new Error('REQUIRED: id:' + this.id + '; field:' + field + '; url:' + patchUrl);
                }

                var data = {};
                data[field] = this[field];
                
                return $http({
                    method:'PATCH',
                    url: patchUrl,
                    data:data
                });
            };

            return Agent;
        }
    ]);

    app.factory('Entity', ['$resource',
        function($resource){
            return $resource('/api/agent/findOne?id=EQ(:id)', {'id': '@id'}, {
                patch: {
                    url: '/agente/:id/',
                    method: 'PATCH'
                }
            });
        }
    ]);

})(angular);
