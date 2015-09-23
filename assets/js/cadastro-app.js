(function(angular){
    'use strict';

    var app = angular.module('culturaviva', [
        'culturaviva.controllers',
        'culturaviva.services',
        'Notifications'
    ]);

    app.constant('context', {
        'agentId': ((MapasCulturais||{}).redeCulturaViva||{}).agenteIndividual || null
    });

})(angular);
