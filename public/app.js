(function(angular) {
    'use strict';

    angular.module('MyApp', [])
        .controller('MyController', ['$scope', MyController]);

    function MyController() {
        //$http.get('/show/924d7516-dba4-4d84-8de1-c819752d4486').
        //    then(function(response) {
        //        console.log(response);
        //    });
    }

    MyController.prototype.objects = [];

    MyController.prototype.test = function(test) {
        console.log(test);
    };

})(window.angular);
