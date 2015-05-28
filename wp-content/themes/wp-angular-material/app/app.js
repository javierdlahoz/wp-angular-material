angular.module('wp-angular', ['ngMaterial', 'ngRoute', 'ngAnimate'])
    .config(function ($routeProvider, $mdThemingProvider, $locationProvider) {
    	
    	$routeProvider
	    	.when('/', {
	            controller: 'PostController',
	            templateUrl: window.templatePath + '/views/front-page.html'
	        })
	        .when('/blog/:slug',{
	        	controller: 'PostController',
	        	templateUrl: window.templatePath + '/views/posts/single.html'
	        })
	        .when('/:type/:slug',{
	        	controller: 'PostController',
	        	templateUrl: function(params){ 
	        		return  window.templatePath + '/views/'+params.type+'/single.html';
	        	}
	        })
	        .when('/wp-login.php', {
	        	templateUrl: function(){
	        		window.location = '/wp-login.php';
	        	}
	        })
	        .when('/dashboard', {
	        	templateUrl: function(){
	        		window.location = '/dashboard';
	        	}
	        })
	        .when('/wp-admin/:query', {
	        	templateUrl: function(){
	        		window.location = '/wp-admin/'+params.query;
	        	}
	        })
	        .otherwise({
	        	controller: 'PostController',
	            templateUrl: window.templatePath + '/views/posts/single.html'
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
		getCurrentUser: "/api/user/current",

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