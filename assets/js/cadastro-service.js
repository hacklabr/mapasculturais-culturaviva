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
                            'geoCidade,facebook,twitter,googleplus'
                    }
                }
            };

            var url = '/api/agent/findOne?id=EQ(:agentId)';
            var Responsible = $resource(url, {'agentId': '@agentId'}, resourceConfig);

            return Responsible;
        }
    ]);

})(angular);
