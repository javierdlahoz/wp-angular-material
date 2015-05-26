angular.module('wp-angular')

    .directive('headerDirective', function () {
        return {
            restrict: 'E',
            templateUrl: '/wp-content/themes/wp-angular-material/views/header.html',
            controller: 'MainController'
        };
    });