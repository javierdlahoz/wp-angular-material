angular.module('angular-wp')
    .directive('shareThis', function () {
        return {
            restrict: 'E',
            templateUrl: '/wp-content/themes/insites/share-this.html',
            controller: 'EmailController'
        };
    });