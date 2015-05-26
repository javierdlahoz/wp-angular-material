angular.module('wp-angular')
    .controller('UserController', function ($scope, $http, $rootScope, UserService) {
    
    	$scope.getUserInfo = function(username){
    		UserService.getUserInfo(username, function(data){
    			$scope.user = data.user;
    		});
    	};
    	
    }
);