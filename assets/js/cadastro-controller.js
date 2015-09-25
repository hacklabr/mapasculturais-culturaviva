(function(angular){
    'use strict';

    var app = angular.module('culturaviva.controllers', []);

    // Função base para os outros controllers """herdarem"""
    function BaseAgentCtrl($scope, Agent, MapasCulturais, agent_id)
    {
        $scope.agent = Agent.get({
            'id': agent_id
        });
        var _saved_agent = angular.copy($scope.agent);

        $scope.save_field = function save_field(field) 
        {
            var new_value = $scope.agent[field] || "";
            var old_value = _saved_agent[field] || "";

            if((new_value || old_value) && new_value !== old_value) {
                $scope.agent.patch(field).then(function(){
                    _saved_agent[field] = angular.copy(new_value);
                });
            }
        };
    }

    // Controller do 'Informações do responsável'
    app.controller('ResponsibleCtrl', ['$scope', 'Agent', 'MapasCulturais',
        function ResponsibleCtrl($scope, Agent, MapasCulturais)
        {
            var agent_id = MapasCulturais.redeCulturaViva.agenteIndividual;
            BaseAgentCtrl.call(this, $scope, Agent, MapasCulturais, agent_id);
       }
    ]);

    // Controller do 'Seu ponto no Mapa'
    app.controller('PointCtrl', ['$scope', 'Agent', 'MapasCulturais',
        function PointCtrl($scope, Agent, MapasCulturais)
        {
            var agent_id = MapasCulturais.redeCulturaViva.agentePonto;
            BaseAgentCtrl.call(this, $scope, Agent, MapasCulturais, agent_id);

            // verifica se agente tem o local fornecido
            $scope.check_espaco = function check_espaco(espaco) {
                var agent = $scope.agent;
                return agent && espaco &&
                       angular.isArray(agent.local_de_acao_espaco) &&
                       agent.local_de_acao_espaco.indexOf(espaco) > -1;
            };

            // seleciona ou remove um espaco do agente e salva na api
            $scope.toggle_espaco = function toggle_espaco(espaco) {
                var agent = $scope.agent;
                
                if(!angular.isArray(agent.local_de_acao_espaco)) {
                    agent.local_de_acao_espaco = [espaco];
                } else {
                    var idx = agent.local_de_acao_espaco.indexOf(espaco);
                    if(idx < 0)
                    {
                        agent.local_de_acao_espaco.push(espaco);
                    }
                    else
                    {
                        agent.local_de_acao_espaco.splice(idx, 1);
                    }
                }
                $scope.save_field('local_de_acao_espaco');
            };
        }
    ]);

    app.controller('EntityCtrl', ['$scope', 'Entity', 'MapasCulturais',
        function($scope, Entity, MapasCulturais){
            var agent_id = MapasCulturais.redeCulturaViva.agenteEntidade;

            var params = {
                'id': agent_id,
                '@select': 'id,name,nomeCompleto,cnpj,representanteLegal' +
                    'tipoCertificacao,foiFomentado,' +
                    'tipoReconhecimentonumEdital,anoEdital,nomeProjeto,localRealizacao,etapaProjeto,' +
                    'proponente,resumoProjeto,prestacaoContasEnvio,prestacaoContasStatus,vigenciaProjeto' +
                    'recebeOutrosFinanciamentos,descOutrosFinanciamentos',

                '@permissions': 'view'
            };

            $scope.entity = Entity.get(params);

            $scope.save_field = function save_field(field) {
                var entity_update = {};
                entity_update[field] = $scope.entity[field];
                Entity.patch({'id': agent_id}, entity_update);
            };
        }
    ]);

})(angular);
