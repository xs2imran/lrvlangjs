(function () {
    'use strict';

    angular
      .module('app.controllers')
      .controller('TempCalculator', TempCalculator);

    TempCalculator.$inject = ['$http'];

    /* @ngInject */
    function TempCalculator ($http) {
        var vm = this;
        vm.message = '';
        vm.fahrenheit = '';
        vm.celsius = '';

        function isInt(n) {
            return n % 1 === 0;
        }

        function isFloat (value) {

            return  (!isNaN(value) && value.toString().indexOf('.') != -1)  ? true : false;
        }

        vm.validateInput = function (val) {

            return ( isInt(val) || isFloat(val) ) ? true : false;
        };

        vm.clearMessage = function () {

            $('#message').removeClass('btn-success');
            $('#message').removeClass('btn-danger');
            vm.message = '';
        };

        vm.showMessage = function (msgType, message) {

            switch ( msgType ) {
                case "success":
                    $('#message').addClass('btn-success');
                    vm.message = message;
                    break;
                case "fail":
                    $('#message').addClass('btn-danger');
                    vm.message = message;
                    break;
            }
        };

        vm.logTemp = function () {

            var data = {
                'f': vm.fahrenheit,
                'c': vm.celsius
            };

            $http.post( 'tempsave', data).then( function (response) {

                var apiResponse = response.data && response.data.apiResponse || null;

                if ( apiResponse !== null && apiResponse.result == 'TRUE' ) {

                    vm.showMessage('success', 'success');
                    return;
                }

                vm.showMessage('fail', 'Error:: Invalid Response');

            }, function (response) {

                vm.showMessage('fail', 'Error:: Bad Response');
                return;
            });
        };

        vm.toFahrenheit = function () {

            vm.clearMessage();
            if ( !vm.validateInput(vm.celsius) ) {

                vm.showMessage('fail', 'Error:: in-valid input');
                return;
            }

            vm.fahrenheit = (vm.celsius * 9/5) + 32;
        };

        vm.toCelsius = function () {

            vm.clearMessage();
            if ( !vm.validateInput(vm.celsius) ) {

                vm.showMessage('fail', 'Error:: in-valid input');
                return;
            }

            vm.celsius = (vm.fahrenheit - 32) / 1.8;
        };
    }

})();

