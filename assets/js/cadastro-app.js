(function(angular){
    'use strict';

    var app = angular.module('culturaviva', [
        'culturaviva.controllers',
        'culturaviva.services',
        'Notifications'
    ]);

    app.constant('DATA', {
        'responsible_id': ((MapasCulturais||{}).redeCulturaViva||{}).agenteIndividual || null
    });

})(angular);
