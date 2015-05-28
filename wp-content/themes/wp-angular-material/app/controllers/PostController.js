angular.module('wp-angular')
    .controller('PostController', function ($scope, $http, $rootScope, PostService, UserService) {
    	$scope.paged = 1;

    	$scope.searchPosts = function(){
    		$scope.isLoading = true;
    		var formData = {
            	query: $scope.getQueryValue(),
            	paged: $scope.paged
            };

    		PostService.getPosts(formData, function(data){
    			$scope.isLoading = false;
            	$scope.posts = data.posts;
            	$scope.paged = data.paged;
            	$scope.pagesNumber = data.pagesNumber;
            	$scope.postsFound = data.count;
    		});

    	};
    	
    	$scope.getRecentPosts = function(){
    		$scope.isLoading = true;
    		PostService.getRecentPosts(function(data){
    			$scope.posts = data.posts;
    			$scope.isLoading = false;
    		});
    	};
    	
    	$scope.getPostByUrl = function(){
    		PostService.getPostByUrl(function(data){
    			$scope.post = data.post;
    			$scope.getAuthorInfoFromUsername($scope.post.author);
    		});
    	};

		$scope.increasePaged = function(){
			$scope.paged++;
		};

		$scope.decreasePaged = function(){
			$scope.paged--;
		};

    	/**
    	 * it gets the value of query param
    	 */
    	$scope.getQueryValue = function(){
    		if($scope.query == "" || $scope.query == undefined){
    			$scope.query = jQuery("#query").val();
    		}

    		return $scope.query;
    	};
    	
    	$scope.getAuthorInfoFromUsername = function(username){
    		UserService.getUserInfo(username, function(data){
    			$scope.author = data.user;
    		});
    	};
    	
    	$scope.goToEditPost = function(postId){
    		console.log(PostHelper.getEditPostUrl(postId));
    	}
    }
);