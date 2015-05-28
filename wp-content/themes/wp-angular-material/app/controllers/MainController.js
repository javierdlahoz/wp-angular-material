angular.module('wp-angular')
    .controller('MainController', function ($scope, $rootScope, UserService) {
    	
    	$scope.getCurrentUser = function(){
    		UserService.getCurrentUser(function(data){
    			$rootScope.currentUser = data.user;
    		});
    	};
    	
    }
);