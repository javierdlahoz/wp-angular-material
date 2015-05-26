angular.module('wp-angular')
	.factory('PostService', function($http) {

		return{
			getPosts: function(formData, callBack){
				$http({
	                url: getUrls().searchPost,
	                method: "POST",
	                data: jQuery.param(formData),
	                headers: getContentTypes().form
	            }).success(function (data) {
	            	return callBack(data);
	            });
			},
			getRecentPosts: function(callBack){
				$http({
	                url: getUrls().recentPosts,
	                method: "GET"
	            }).success(function (data) {
	            	return callBack(data);
	            });
			},
			getPostByUrl: function(callBack){
				var formData = {
						url: window.location.pathname
				};
				$http({
	                url: getUrls().postByUrl,
	                method: "POST",
	                data: jQuery.param(formData),
	                headers: getContentTypes().form
	            }).success(function (data) {
	            	return callBack(data);
	            });
			},
		};
	});