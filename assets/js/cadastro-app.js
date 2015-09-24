(function (angular) {
    'use strict';

    var app = angular.module('culturaviva', [
        'culturaviva.controllers',
        'culturaviva.services',
        'Notifications'
    ]);

    app.config(['$httpProvider', function ($httpProvider) {
            $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
            $httpProvider.defaults.headers.patch['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
            $httpProvider.defaults.headers.post['X-Requested-With'] = 'XMLHttpRequest';
            $httpProvider.defaults.headers.patch['X-Requested-With'] = 'XMLHttpRequest';
            $httpProvider.defaults.transformRequest = function (data) {
                var result = angular.isObject(data) && String(data) !== '[object File]' ? $.param(data) : data;

                return result;
            };
        }]);


})(angular);
