(function () {
    'use strict';

    angular
      .module('app.controllers')
      .controller('Navigate', Navigate);

    Navigate.$inject = [];

    /* @ngInject */
    function Navigate() {

        var nav = this;

        nav.navName = {
            home: 'home',
            help: 'help'
        };

        nav.currentTab = nav.navName.home;

        nav.setTab = function (currentTab) {

            nav.currentTab = currentTab;
        };
    }

})();

