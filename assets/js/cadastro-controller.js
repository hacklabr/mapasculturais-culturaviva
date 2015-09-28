(function(angular){
    'use strict';

    var app = angular.module('culturaviva.controllers', []);

    // Função base para os outros controllers """herdarem"""
    function BaseAgentCtrl($scope, Agent, MapasCulturais, agent_id)
    {
        $scope.errors = {};
        $scope.agent = Agent.get({
            'id': agent_id
        });

        var _saved_agent = angular.copy($scope.agent);

        $scope.save_field = function save_field(field, force_patch) 
        {
            var new_value = $scope.agent[field] || "";
            var old_value = _saved_agent[field] || "";

            if(force_patch || (new_value || old_value) && new_value !== old_value)
            {
                $scope.agent.patch(field).then(function(res)
                {
                    if(res.data && res.data.error)
                    {   // aconteceu algum erro de validação
                        $scope.errors[field] = res.data.data[field];
                    }
                    else
                    {   // deu tudo certo
                        $scope.errors[field] = null;
                        _saved_agent[field] = angular.copy(new_value);
                    }
                })
                ['catch'](function()
                {
                    $scope.errors[field] = ['O sistema não conseguir interpretar essa informação'];
                });
            }
        };
        
        $scope.toggle_term = function(taxonomy, term){
            var agent = $scope.agent;
            
            if(!angular.isArray(agent.terms[taxonomy])) {
                agent.terms[taxonomy] = [term];
            } else {
                var idx = agent.terms[taxonomy].indexOf(term);
                if(idx < 0)
                {
                    agent.terms[taxonomy].push(term);
                }
                else
                {
                    agent.terms[taxonomy].splice(idx, 1);
                }
            }
            $scope.save_field('terms');
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
            
            $scope.locaisRealizacao = ['Escolas', 'Universidades', 'Praças', 'Salas', 'CEUs', 'Feiras', 'Eventos'];

        }
    ]);

})(angular);
