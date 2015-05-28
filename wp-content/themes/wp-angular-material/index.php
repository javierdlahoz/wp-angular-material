<html>
<head>
<link rel="stylesheet"
	href="<?php echo get_template_directory_uri(); ?>/bower_components/angular-material/angular-material.min.css">
<link rel="stylesheet"
	href="<?php echo get_template_directory_uri(); ?>/css/docs.css">
</head>
<body ng-app="wp-angular" layout="column" ng-controller="MainController" ng-init="getCurrentUser()">
	
	<header-directive></header-directive>
	<section layout="row" flex>
		<md-sidenav class="md-sidenav-left md-whiteframe-z2"
			md-component-id="left" md-is-locked-open="$mdMedia('gt-md')"> <md-content
			layout-padding>
		<p hide-md show-gt-md>This is me Javier De la Hoz. Email:
			javierdlahoz@gmail.com</p>
		</md-content> </md-sidenav>
		<md-content flex layout-padding>
		<div layout="column" layout-fill layout-align="top center" class="doc-demo-content doc-content">
			<div ng-view></div>
		</div>
		</md-content>
	</section>
	
</body>
<footer>
	<!-- jQuery -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>

	<!-- Angular Material Dependencies -->
	<script
		src="<?php echo get_template_directory_uri(); ?>/bower_components/angular/angular.min.js"></script>
	<script
		src="<?php echo get_template_directory_uri(); ?>/bower_components/angular-animate/angular-animate.min.js"></script>
	<script
		src="<?php echo get_template_directory_uri(); ?>/bower_components/angular-aria/angular-aria.min.js"></script>
	<script
		src="<?php echo get_template_directory_uri(); ?>/bower_components/angular-route/angular-route.min.js"></script>
	<script
		src="<?php echo get_template_directory_uri(); ?>/bower_components/angular-material/angular-material.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/app/app.js"></script>

	<!-- Loading all directives -->
	<script
		src="<?php echo get_template_directory_uri(); ?>/app/directives/headerDirective.js"></script>

	<!-- Loading all controllers -->
	<script
		src="<?php echo get_template_directory_uri(); ?>/app/controllers/MainController.js"></script>

	<script
		src="<?php echo get_template_directory_uri(); ?>/app/controllers/PostController.js"></script>

	<!-- Loading all services -->
	<script
		src="<?php echo get_template_directory_uri(); ?>/app/services/PostService.js"></script>
	<script
		src="<?php echo get_template_directory_uri(); ?>/app/services/UserService.js"></script>

	<!-- Loading all Helpers -->
	<script
		src="<?php echo get_template_directory_uri(); ?>/app/helpers/PostHelper.js"></script>
	
		
	<script type="text/javascript">
		window.templatePath = "<?php echo get_template_directory_uri(); ?>";
	</script>
</footer>
</html>