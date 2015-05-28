angular.module('wp-angular')
	.factory('UserService', function($http) {

		return{
			getUserInfo: function(username, callBack){
				var formData = {
						username: username
				};
				$http({
	                url: getUrls().getUserInfo,
	                method: "POST",
	                data: jQuery.param(formData),
	                headers: getContentTypes().form
	            }).success(function (data) {
	            	return callBack(data);
	            });
			},
			
			getCurrentUser: function(callback){
				$http({
	                url: getUrls().getCurrentUser,
	                method: "GET"
	            }).success(function (data) {
	            	return callback(data);
	            });
			}
		};
	});