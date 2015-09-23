(function(angular){
    'use strict';

    var app = angular.module('culturaviva.controllers', []);

    app.controller('ResponsibleCtrl', ['$scope', 'DATA', 'Responsible',
       function($scope, DATA, Responsible){
            console.log(Responsible.get({
                'agentId': 4
            }));
       }
    ]);

})(angular);
