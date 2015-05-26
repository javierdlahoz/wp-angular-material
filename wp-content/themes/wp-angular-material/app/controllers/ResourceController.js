angular.module('angular-wp')
    .controller('ResourceController', function ($scope, $http, $rootScope, ResourceService) {
		$scope.orderby = "title";
		$scope.stakeholders = "*";
		$scope.resourceType = "*";
		$scope.paged = 1;

		/**
		 * Main activity to search across resources
		 */
    	$scope.searchResources = function(){

    		var formData = {
				query: $scope.getQueryValue(),
				orderby: $scope.orderby,
		    	stakeholders: $scope.stakeholders,
		    	'areas-of-focus': $scope.getAreasOfFocusValue(),
		    	'resource-types': $scope.resourceType,
		    	paged: $scope.paged
			};

    		$scope.isLoading = true;

			ResourceService.getResources(formData, function(data){
				$scope.isLoading = false;
				$scope.resources = data;

	        	if($scope.resources.resources == null){
	        		$scope.resourcesFound = 0;
	        	}
	        	else{
	        		$scope.resourcesFound = $scope.resources.resources.length;
	        	}
			});
    	};

    	/**
    	 * it gets the different values of resource formats
    	 */
    	$scope.getResourceFormats = function(){
    		ResourceService.getResourceFormats(function(data){
	    		$scope.resourceFormats = data;
    		});
    	};

    	/**
    	 * it gets the different values of resource areas of focus
    	 */
    	$scope.getAreasOfFocus = function(){
    		ResourceService.getAreasOfFocus(function(data){
    			$scope.resourceFormats = data;
    		});
    	};

    	/**
    	 * it gets the different values of resource type
    	 */
    	$scope.getResourceTypes = function(){
    		ResourceService.getResourceTypes(function(data){
    			$scope.resourceFormats = data;
    		});
    	};

    	/**
    	 * it gets the different values of stakeholders
    	 */
    	$scope.getResourceStakeholders = function(){
    		ResourceService.getResourceStakeholders(function(data){
    			$scope.resourceFormats = data;
    		});
    	};

    	/**
    	 * it gets the value of query param
    	 */
    	$scope.getQueryValue = function(){
    		if($scope.query == "" || $scope.query == undefined){
    			$scope.query = jQuery("#query").val();;
    		}

    		return $scope.query;
    	};

    	/**
    	 * it gets the value of resourceType param
    	 */
    	$scope.getAreasOfFocusValue = function(){
    		if($scope.areasOfFocus == "" || $scope.areasOfFocus == undefined){
    			$scope.areasOfFocus = jQuery("#area-of-focus").val();
    		}
    		return $scope.areasOfFocus;
    	};

    	$scope.setAreasOfFocus = function(areasOfFocus){
    		$scope.areasOfFocus = areasOfFocus;
    	};

    	$scope.setStakeholders = function(stakeholders){
    		$scope.stakeholders = stakeholders;
    	};

    	$scope.setOrderBy = function(orderby){
    		$scope.orderby = orderby;
    	};

    	$scope.setResourceType = function(resourceType){
    		$scope.resourceType = resourceType;
    	};

		$scope.increasePaged = function(){
			$scope.paged++;
		};

		$scope.decreasePaged = function(){
			$scope.paged--;
		};

		jQuery(".secondary-nav a").click(function(event){
		    event.preventDefault();
		});
    }
);