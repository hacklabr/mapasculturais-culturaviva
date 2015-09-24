(function(angular){
    'use strict';

    var app = angular.module('culturaviva.controllers', []);

    function BaseAgentCtrl($scope, Agent, MapasCulturais, agent_id){
        $scope.agent = Agent.get({
            'id': agent_id
        });
        var _saved_agent = angular.copy($scope.agent);

        $scope.save_field = function save_field(field) {
            var new_value = $scope.agent[field] || "";
            var old_value = _saved_agent[field] || "";

            if((new_value || old_value) && new_value !== old_value) {
                $scope.agent.patch(field).then(function(){
                    _saved_agent[field] = angular.copy(new_value);
                });
            }
        };
   }

    app.controller('ResponsibleCtrl', ['$scope', 'Agent', 'MapasCulturais',
        function ResponsibleCtrl($scope, Agent, MapasCulturais){
            var agent_id = MapasCulturais.redeCulturaViva.agenteIndividual;
            BaseAgentCtrl.call(this, $scope, Agent, MapasCulturais, agent_id);
       }
    ]);

    app.controller('PointCtrl', ['$scope', 'Agent', 'MapasCulturais',
        function PointCtrl($scope, Agent, MapasCulturais){
            var agent_id = MapasCulturais.redeCulturaViva.agentePonto;
            BaseAgentCtrl.call(this, $scope, Agent, MapasCulturais, agent_id);
        }
    ]);

})(angular);
