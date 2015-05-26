<html>
<head>
<link rel="stylesheet"
	href="/wp-content/themes/wp-angular-material/bower_components/angular-material/angular-material.min.css">
<link rel="stylesheet"
	href="/wp-content/themes/wp-angular-material/css/docs.css">
</head>
<body ng-app="wp-angular" layout="row">
	<div layout="column" flex="100">
		<header-directive></header-directive>
		<section layout="row" flex>
			<md-sidenav class="md-sidenav-left md-whiteframe-z2"
				md-component-id="left" md-is-locked-open="$mdMedia('gt-md')"> <md-content
				layout-padding>
			<p hide-md show-gt-md>This is me Javier De la Hoz. Email:
				javierdlahoz@gmail.com</p>
			</md-content> </md-sidenav>
			<md-content flex layout-padding>
			<div layout="column" layout-fill layout-align="top center">
				<div ng-view></div>
				<div>
			
			</md-content>
		</section>
	</div>
</body>
<footer>
	<!-- jQuery -->
	<script src="/wp-content/themes/wp-angular-material/js/jquery.min.js"></script>

	<!-- Angular Material Dependencies -->
	<script
		src="/wp-content/themes/wp-angular-material/bower_components/angular/angular.min.js"></script>
	<script
		src="/wp-content/themes/wp-angular-material/bower_components/angular-animate/angular-animate.min.js"></script>
	<script
		src="/wp-content/themes/wp-angular-material/bower_components/angular-aria/angular-aria.min.js"></script>
	<script
		src="/wp-content/themes/wp-angular-material/bower_components/angular-route/angular-route.min.js"></script>
	<script
		src="/wp-content/themes/wp-angular-material/bower_components/angular-material/angular-material.min.js"></script>
	<script src="/wp-content/themes/wp-angular-material/app/app.js"></script>

	<!-- Loading all directives -->
	<script
		src="/wp-content/themes/wp-angular-material/app/directives/headerDirective.js"></script>

	<!-- Loading all controllers -->
	<script
		src="/wp-content/themes/wp-angular-material/app/controllers/MainController.js"></script>

	<script
		src="/wp-content/themes/wp-angular-material/app/controllers/PostController.js"></script>

	<!-- Loading all services -->
	<script
		src="/wp-content/themes/wp-angular-material/app/services/PostService.js"></script>
	<script
		src="/wp-content/themes/wp-angular-material/app/services/UserService.js"></script>

</footer>
</html>