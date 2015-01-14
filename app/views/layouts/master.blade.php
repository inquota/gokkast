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
		<link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
		<link rel="stylesheet" href="/plugins/animate.css/animate.min.css">
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR SUBVIEW CONTENTS -->
		
		<!-- end: CSS REQUIRED FOR THIS SUBVIEW CONTENTS-->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="stylesheet" href="/plugins/weather-icons/css/weather-icons.min.css">
		<link rel="stylesheet" href="/plugins/nvd3/nv.d3.min.css">
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE CSS -->
		<link rel="stylesheet" href="/css/styles.css">
		<link rel="stylesheet" href="/css/styles-responsive.css">
		<link rel="stylesheet" href="/css/plugins.css">
		<link rel="stylesheet" href="/css/themes/theme-default.css" type="text/css" id="skin_color">
		<link rel="stylesheet" href="/css/print.css" type="text/css" media="print"/>
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
		<script src="/plugins/respond.min.js"></script>
		<script src="/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="/plugins/jQuery/jquery-1.11.1.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		{{ HTML::script('/plugins/jQuery/jquery-2.1.1.min.js') }}
		<!--<![endif]-->
		<script src="/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="/plugins/blockUI/jquery.blockUI.js"></script>
		<script src="/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="/plugins/moment/min/moment.min.js"></script>
		<script src="/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
		<script src="/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
		<script src="/plugins/bootbox/bootbox.min.js"></script>
		<script src="/plugins/jquery.scrollTo/jquery.scrollTo.min.js"></script>
		<script src="/plugins/ScrollToFixed/jquery-scrolltofixed-min.js"></script>
		<script src="/plugins/jquery.appear/jquery.appear.js"></script>
		<script src="/plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="/plugins/velocity/jquery.velocity.min.js"></script>
		<script src="/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
		<script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		
		<script src="/js/subview.js"></script>
		<script src="/js/subview-examples.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

		{{ HTML::script('/js/index.js') }}
		{{ HTML::script('plugins/easy-pie-chart/dist/jquery.easypiechart.min.js') }}
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