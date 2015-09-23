(function(angular){
    'use strict';

    var app = angular.module('culturaviva.services', ['ngResource']);

    app.factory('Responsible', ['$resource',
        function($resource){
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

            var url = '/api/agent/findOne?id=EQ(:id)';
            var Responsible = $resource(url, {'id': '@id'}, resourceConfig);

            // 1) o angular não deixa selecionar individualmente o campos para patch
            // 2) a api do mapas não devolve o objeto (nem parte dele) após a consulta
            Responsible.prototype.patch = function(field) {
                if(this.hasOwnProperty(field)){
                    var obj = new Responsible();
                    obj.id = this.id;
                    obj[field] = this[field];
                    return obj.$patch();
                }
            };

            return Responsible;
        }
    ]);

})(angular);
