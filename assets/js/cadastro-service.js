(function(angular){
    'use strict';

    var app = angular.module('culturaviva.services', ['ngResource']);

    app.factory('MapasCulturais', function (){
        if(!window.MapasCulturais) {
            throw new Error('É necessário ter o obj "MapasCulturais" em window');
        }
        return window.MapasCulturais;
    });


    app.factory('Responsible', ['$resource', '$http', 'MapasCulturais',
        function($resource, $http, MapasCulturais){
            var resourceConfig = {
                'get':  {
                    'method':'GET',
                    'params':{
                        '@select': 'id,singleUrl,name,'+
                            'rg,rg_orgao,relacaoPonto,cpf,'+
                            'geoEstado,emailPrivado,telefone1,'+
                            'telefone1_operadora,nomeCompleto,'+
                            'geoCidade,facebook,twitter,googleplus',
                        '@permissions': 'view'
                    }
                },
                'patch': {
                    'method': 'PATCH',
                }
            };

            var getUrl = '/api/agent/findOne?id=EQ(:id)';
            var Responsible = $resource(getUrl, {'id': '@id'}, resourceConfig);

            // 1) o angular não deixa selecionar individualmente o campos para patch
            // 2) a api do mapas não devolve o objeto (nem parte dele) após a consulta
            Responsible.prototype.patch = function patch_responsible(field) {
                if(!this.id) {
                    throw new Error('Não é possível salvar sem o id');
                }

                if(!this.hasOwnProperty(field)){
                    throw new Error('Não foi informado o campo que se quer salvar');
                }

                var patchUrl = MapasCulturais.createUrl('agent','single',[this.id]);
                if(!patchUrl) {
                    throw new Error('O agente não tem o endereço para PATCH');
                }

                var patchObj = {};
                patchObj.id = this.id;
                patchObj[field] = this[field] || "";

                return $http({method:'PATCH', url: patchUrl, data: patchObj});
            };

            return Responsible;
        }
    ]);

})(angular);
