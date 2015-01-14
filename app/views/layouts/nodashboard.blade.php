<!DOCTYPE html>
<!-- Template Name: Rapido - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.2 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Beheerders Login</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		{{ HTML::style('/plugins/bootstrap/css/bootstrap.min.css') }}
		{{ HTML::style('/plugins/font-awesome/css/font-awesome.min.css') }}
		{{ HTML::style('/plugins/animate.css/animate.min.css') }}
		{{ HTML::style('/plugins/iCheck/skins/all.css') }}
		{{ HTML::style('/css/styles.css') }}
		{{ HTML::style('/css/styles-responsive.css') }}
		{{ HTML::style('/plugins/iCheck/skins/all.css') }}
		<!--[if IE 7]>
		{{ HTML::style('/plugins/font-awesome/css/font-awesome-ie7.min.css') }}
		<![endif]-->
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login">
    @yield('content')
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		{{ HTML::script('/plugins/respond.min.js') }}
		{{ HTML::script('/plugins/excanvas.min.js') }}
		{{ HTML::script('/plugins/jQuery/jquery-1.11.1.min.js') }}
		<![endif]-->
		<!--[if gte IE 9]><!-->
		{{ HTML::script('/plugins/jQuery/jquery-2.1.1.min.js') }}
		<!--<![endif]-->
		{{ HTML::script('/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js') }}
		{{ HTML::script('/plugins/bootstrap/js/bootstrap.min.js') }}
		{{ HTML::script('/plugins/iCheck/jquery.icheck.min.js') }}
		{{ HTML::script('/plugins/jquery.transit/jquery.transit.js') }}
		{{ HTML::script('/plugins/TouchSwipe/jquery.touchSwipe.min.js') }}
		{{ HTML::script('/js/main.js') }}
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		{{ HTML::script('/plugins/jquery-validation/dist/jquery.validate.min.js') }}
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	</body>
	<!-- end: BODY -->
</html>