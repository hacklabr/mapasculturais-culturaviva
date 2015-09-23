(function(angular){
    'use strict';

    var app = angular.module('culturaviva.controllers', []);

    app.controller('ResponsibleCtrl', ['$scope', 'context', 'Responsible',
       function($scope, context, Responsible){

            $scope.agent = Responsible.get({
                'id': context.agentId
            });

            
            // var timeout = null;
            // var user_update - new MapasUser();
            // // FormUser eh o usuario recebido da api.
            // $scope.agent = Responsible.get({
            //         'agentId': 4
            //     })

            // var update_field(new_var, old_var): {
            //     for (var key in new_var) {
            //         if (new_var.hasOwnProperty(key)) {
            //             if (new_var[key] != old_var)[key]{
            //                 user_update.key = new_var[key];
            //             }
            //         }
            //     }
            //     user_update.$update(new_var['id']); // update eh o patch, confirma se id e a chave
            // }

            // var debounceUpdates = function(newVal, oldVal) {
            //     if (newVal != oldVal) {
            //         if (timeout) {
            //             $timeout.cancel(timeout)
            //         }
            //         timeout = $timeout(update_field, 2000);  // 1000 = 1 second
            //     }
            // };

            // $scope.$watch('agent', debounceUpdates);
       }
    ]);

})(angular);
