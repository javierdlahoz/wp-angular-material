angular.module('wp-angular', ['ngMaterial', 'ngRoute', 'ngAnimate'])
    .config(function ($routeProvider, $mdThemingProvider, $locationProvider) {
    	$routeProvider
	    	.when('/', {
	            controller: 'PostController',
	            templateUrl: '/wp-content/themes/wp-angular-material/views/front-page.html'
	        })
	        .otherwise({
	        	controller: 'PostController',
	            templateUrl: '/wp-content/themes/wp-angular-material/views/posts/single.html'
	        });
    	
    	$mdThemingProvider.theme('default');
    	$locationProvider.html5Mode({
    		enabled: true,
    		requireBase: false
    	});
    });

function getUrls(){
	return {

		//for regular posts
		searchPost: "/api/post/search",
		recentPosts: "/api/post/recents",
		postByUrl: "/api/post/post",
		
		//for users
		getUserInfo: "/api/user/info",

		//for email
		sendContactEmail: "/api/email/send",
		shareThis: "/api/email/share"
	};
}

function getContentTypes(){
	return {
		form: {'Content-Type': 'application/x-www-form-urlencoded'},
	};
}

jQuery(document).ready(function(){
	jQuery("#wp-angular").show();
});