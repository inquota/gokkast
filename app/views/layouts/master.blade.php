<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Rapido - Responsive Admin Template</title>
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
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,200,100,800' rel='stylesheet' type='text/css'>
		{{ HTML::style('/plugins/bootstrap/css/bootstrap.min.css') }}
		{{ HTML::style('/plugins/font-awesome/css/font-awesome.min.css') }}
		{{ HTML::style('/plugins/iCheck/skins/all.css') }}
		{{ HTML::style('/plugins/perfect-scrollbar/src/perfect-scrollbar.css') }}
		{{ HTML::style('/plugins/animate.css/animate.min.css') }}
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR SUBVIEW CONTENTS -->
		
		<!-- end: CSS REQUIRED FOR THIS SUBVIEW CONTENTS-->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		{{ HTML::style('/plugins/weather-icons/css/weather-icons.min.css') }}
		{{ HTML::style('/plugins/nvd3/nv.d3.min.css') }}
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE CSS -->
		{{ HTML::style('/css/styles.css') }}
		{{ HTML::style('/css/styles-responsive.css') }}
		{{ HTML::style('/css/plugins.css') }}
		{{ HTML::style('/css/themes/theme-default.css') }}
		{{ HTML::style('/css/print.css') }}
		<!-- end: CORE CSS -->
		<link rel="shortcut icon" href="favicon.ico" />
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
		<div class="main-wrapper">
			@include('layouts.header')
			
			
			@include('layouts.navigation')
			<!-- start: MAIN CONTAINER -->
			<div class="main-container inner">
				<!-- start: PAGE -->
				<div class="main-content">
					<div class="container">
						<!-- start: PAGE HEADER -->
						<!-- start: TOOLBAR -->
						<div class="toolbar row">
							<div class="col-sm-6 hidden-xs">
								<div class="page-header">
									<h1>Dashboard</h1>
								</div>
							</div>
							<div class="col-sm-6 col-xs-12">
								<a href="#" class="back-subviews">
									<i class="fa fa-chevron-left"></i> BACK
								</a>
								<a href="#" class="close-subviews">
									<i class="fa fa-times"></i> CLOSE
								</a>
					
							</div>
						</div>
						<!-- end: TOOLBAR -->
						<!-- end: PAGE HEADER -->
						<!-- start: BREADCRUMB -->
						<div class="row">
							<div class="col-md-12">
								<ol class="breadcrumb">
									<li>
										<a href="#">
											Dashboard
										</a>
									</li>
									<li class="active">
										Dashboard
									</li>
								</ol>
							</div>
						</div>
						<!-- end: BREADCRUMB -->
						<!-- start: PAGE CONTENT -->
						@yield('content')
						<!-- end: PAGE CONTENT-->
					</div>
					<div class="subviews">
						<div class="subviews-container"></div>
					</div>
				</div>
				<!-- end: PAGE -->
			</div>
			<!-- end: MAIN CONTAINER -->

			@include('layouts.footer')
		</div>
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
		{{ HTML::script('/plugins/blockUI/jquery.blockUI.js') }}
		{{ HTML::script('/plugins/iCheck/jquery.icheck.min.js') }}
		{{ HTML::script('/plugins/moment/min/moment.min.js') }}
		{{ HTML::script('/plugins/perfect-scrollbar/src/jquery.mousewheel.js') }}
		{{ HTML::script('/plugins/perfect-scrollbar/src/perfect-scrollbar.js') }}
		{{ HTML::script('/plugins/bootbox/bootbox.js') }}
		{{ HTML::script('/plugins/jquery.scrollTo/jquery.scrollTo.min.js') }}
		{{ HTML::script('/plugins/ScrollToFixed/jquery-scrolltofixed-min.js') }}
		{{ HTML::script('/plugins/jquery.appear/jquery.appear.js') }}
		{{ HTML::script('/plugins/jquery-cookie/jquery.cookie.js') }}
		{{ HTML::script('/plugins/velocity/jquery.velocity.min.js') }}
		{{ HTML::script('/plugins/TouchSwipe/jquery.touchSwipe.min.js') }}
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		
		{{ HTML::script('/js/subview.js') }}
		{{ HTML::script('/js/subview-examples.js') }}
		<!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

		{{ HTML::script('/js/index.js') }}
		{{ HTML::script('/plugins/easy-pie-chart/dist/jquery.easypiechart.min.js') }}
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE JAVASCRIPTS  -->
		{{ HTML::script('/js/main.js') }}
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				SVExamples.init();
				Index.init();
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>