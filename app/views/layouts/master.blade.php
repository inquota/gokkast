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
		<!-- start: SLIDING BAR (SB) -->
		<div id="slidingbar-area">
			<div id="slidingbar">
				<div class="row">
					<!-- start: SLIDING BAR FIRST COLUMN -->
					<div class="col-md-4 col-sm-4">
						<h2>My Options</h2>
						<div class="row">
							<div class="col-xs-6 col-lg-3">
								<button class="btn btn-icon btn-block space10">
									<i class="fa fa-folder-open-o"></i>
									Projects <span class="badge badge-info partition-red"> 4 </span>
								</button>
							</div>
							<div class="col-xs-6 col-lg-3">
								<button class="btn btn-icon btn-block space10">
									<i class="fa fa-envelope-o"></i>
									Messages <span class="badge badge-info partition-red"> 23 </span>
								</button>
							</div>
							<div class="col-xs-6 col-lg-3">
								<button class="btn btn-icon btn-block space10">
									<i class="fa fa-calendar-o"></i>
									Calendar <span class="badge badge-info partition-blue"> 5 </span>
								</button>
							</div>
							<div class="col-xs-6 col-lg-3">
								<button class="btn btn-icon btn-block space10">
									<i class="fa fa-bell-o"></i>
									Notifications <span class="badge badge-info partition-red"> 9 </span>
								</button>
							</div>
						</div>
					</div>
					<!-- end: SLIDING BAR FIRST COLUMN -->
					<!-- start: SLIDING BAR SECOND COLUMN -->
					<div class="col-md-4 col-sm-4">
						<h2>My Recent Works</h2>
						<div class="blog-photo-stream margin-bottom-30">
							<ul class="list-unstyled">
								<li>
									<a href="#"><img alt="" src="/images/image01_th.jpg"></a>
								</li>
								<li>
									<a href="#"><img alt="" src="/images/image02_th.jpg"></a>
								</li>
								<li>
									<a href="#"><img alt="" src="/images/image03_th.jpg"></a>
								</li>
								<li>
									<a href="#"><img alt="" src="/images/image04_th.jpg"></a>
								</li>
								<li>
									<a href="#"><img alt="" src="/images/image05_th.jpg"></a>
								</li>
								<li>
									<a href="#"><img alt="" src="/images/image06_th.jpg"></a>
								</li>
								<li>
									<a href="#"><img alt="" src="/images/image07_th.jpg"></a>
								</li>
								<li>
									<a href="#"><img alt="" src="/images/image08_th.jpg"></a>
								</li>
								<li>
									<a href="#"><img alt="" src="/images/image09_th.jpg"></a>
								</li>
								<li>
									<a href="#"><img alt="" src="/images/image10_th.jpg"></a>
								</li>
							</ul>
						</div>
					</div>
					<!-- end: SLIDING BAR SECOND COLUMN -->
					<!-- start: SLIDING BAR THIRD COLUMN -->
					<div class="col-md-4 col-sm-4">
						<h2>My Info</h2>
						<address class="margin-bottom-40">
							Peter Clark
							<br>
							12345 Street Name, City Name, United States
							<br>
							P: (641)-734-4763
							<br>
							Email:
							<a href="#">
								peter.clark@example.com
							</a>
						</address>
						<a class="btn btn-transparent-white" href="#">
							<i class="fa fa-pencil"></i> Edit
						</a>
					</div>
					<!-- end: SLIDING BAR THIRD COLUMN -->
				</div>
				<div class="row">
					<!-- start: SLIDING BAR TOGGLE BUTTON -->
					<div class="col-md-12 text-center">
						<a href="#" class="sb_toggle"><i class="fa fa-chevron-up"></i></a>
					</div>
					<!-- end: SLIDING BAR TOGGLE BUTTON -->
				</div>
			</div>
		</div>
		<!-- end: SLIDING BAR -->
		<div class="main-wrapper">
			@include('layouts.header')
			
			
			@include('layouts.navigation')
			<!-- start: MAIN CONTAINER -->
			<div class="main-container inner">
				<!-- start: PAGE -->
				<div class="main-content">
					<!-- start: PANEL CONFIGURATION MODAL FORM -->
					<div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;
									</button>
									<h4 class="modal-title">Panel Configuration</h4>
								</div>
								<div class="modal-body">
									Here will be a configuration form
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">
										Close
									</button>
									<button type="button" class="btn btn-primary">
										Save changes
									</button>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
					<!-- /.modal -->
					<!-- end: SPANEL CONFIGURATION MODAL FORM -->
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
								<div class="toolbar-tools pull-right">
									<!-- start: TOP NAVIGATION MENU -->
									<ul class="nav navbar-right">
										<!-- start: TO-DO DROPDOWN -->
										<li class="dropdown">
											<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
												<i class="fa fa-plus"></i> SUBVIEW
												<div class="tooltip-notification hide">
													<div class="tooltip-notification-arrow"></div>
													<div class="tooltip-notification-inner">
														<div>
															<div class="semi-bold">
																HI THERE!
															</div>
															<div class="message">
																Try the Subview Live Experience
															</div>
														</div>
													</div>
												</div>
											</a>
											<ul class="dropdown-menu dropdown-light dropdown-subview">
												<li class="dropdown-header">
													Notes
												</li>
												<li>
													<a href="#newNote" class="new-note"><span class="fa-stack"> <i class="fa fa-file-text-o fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Add new note</a>
												</li>
												<li>
													<a href="#readNote" class="read-all-notes"><span class="fa-stack"> <i class="fa fa-file-text-o fa-stack-1x fa-lg"></i> <i class="fa fa-share fa-stack-1x stack-right-bottom text-danger"></i> </span> Read all notes</a>
												</li>
												<li class="dropdown-header">
													Calendar
												</li>
												<li>
													<a href="#newEvent" class="new-event"><span class="fa-stack"> <i class="fa fa-calendar-o fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Add new event</a>
												</li>
												<li>
													<a href="#showCalendar" class="show-calendar"><span class="fa-stack"> <i class="fa fa-calendar-o fa-stack-1x fa-lg"></i> <i class="fa fa-share fa-stack-1x stack-right-bottom text-danger"></i> </span> Show calendar</a>
												</li>
												<li class="dropdown-header">
													Contributors
												</li>
												<li>
													<a href="#newContributor" class="new-contributor"><span class="fa-stack"> <i class="fa fa-user fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Add new contributor</a>
												</li>
												<li>
													<a href="#showContributors" class="show-contributors"><span class="fa-stack"> <i class="fa fa-user fa-stack-1x fa-lg"></i> <i class="fa fa-share fa-stack-1x stack-right-bottom text-danger"></i> </span> Show all contributor</a>
												</li>
											</ul>
										</li>
										<li class="dropdown">
											<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
												<span class="messages-count badge badge-default hide">3</span> <i class="fa fa-envelope"></i> MESSAGES
											</a>
											<ul class="dropdown-menu dropdown-light dropdown-messages">
												<li>
													<span class="dropdown-header"> You have 9 messages</span>
												</li>
												<li>
													<div class="drop-down-wrapper ps-container">
														<ul>
															<li class="unread">
																<a href="javascript:;" class="unread">
																	<div class="clearfix">
																		<div class="thread-image">
																			<img src=".//images/avatar-2.jpg" alt="">
																		</div>
																		<div class="thread-content">
																			<span class="author">Nicole Bell</span>
																			<span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>
																			<span class="time"> Just Now</span>
																		</div>
																	</div>
																</a>
															</li>
															<li>
																<a href="javascript:;" class="unread">
																	<div class="clearfix">
																		<div class="thread-image">
																			<img src=".//images/avatar-3.jpg" alt="">
																		</div>
																		<div class="thread-content">
																			<span class="author">Steven Thompson</span>
																			<span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>
																			<span class="time">8 hrs</span>
																		</div>
																	</div>
																</a>
															</li>
															<li>
																<a href="javascript:;">
																	<div class="clearfix">
																		<div class="thread-image">
																			<img src=".//images/avatar-5.jpg" alt="">
																		</div>
																		<div class="thread-content">
																			<span class="author">Kenneth Ross</span>
																			<span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>
																			<span class="time">14 hrs</span>
																		</div>
																	</div>
																</a>
															</li>
														</ul>
													</div>
												</li>
												<li class="view-all">
													<a href="pages_messages.html">
														See All
													</a>
												</li>
											</ul>
										</li>
										<li class="menu-search">
											<a href="#">
												<i class="fa fa-search"></i> SEARCH
											</a>
											<!-- start: SEARCH POPOVER -->
											<div class="popover bottom search-box transition-all">
												<div class="arrow"></div>
												<div class="popover-content">
													<!-- start: SEARCH FORM -->
													<form class="" id="searchform" action="#">
														<div class="input-group">
															<input type="text" class="form-control" placeholder="Search">
															<span class="input-group-btn">
																<button class="btn btn-main-color btn-squared" type="button">
																	<i class="fa fa-search"></i>
																</button> </span>
														</div>
													</form>
													<!-- end: SEARCH FORM -->
												</div>
											</div>
											<!-- end: SEARCH POPOVER -->
										</li>
									</ul>
									<!-- end: TOP NAVIGATION MENU -->
								</div>
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
		{{ HTML::script('/plugins/bootbox/bootbox.min.js') }}
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