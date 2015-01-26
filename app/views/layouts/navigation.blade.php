			<!-- start: PAGESLIDE LEFT -->
			<a class="closedbar inner hidden-sm hidden-xs" href="#">
			</a>
			<nav id="pageslide-left" class="pageslide inner">
				<div class="navbar-content">
					<!-- start: SIDEBAR -->
					<div class="main-navigation left-wrapper transition-left">
						<div class="navigation-toggler hidden-sm hidden-xs">
							<a href="#main-navbar" class="sb-toggle-left">
							</a>
						</div>
						<div class="user-profile border-top padding-horizontal-10 block">
							<div class="inline-block">
							</div>
							<div class="inline-block">
								<h5 class="no-margin"> Welcome </h5>
								<h4 class="no-margin"> {{ $currentuser->username}}</h4>
								<a class="btn user-options sb_toggle">
									<i class="fa fa-cog"></i>
								</a>
							</div>
						</div>
						<!-- start: MAIN NAVIGATION MENU -->
						<ul class="main-navigation-menu">
							<li class="active open">
								<a href="/users/dashboard/"><i class="fa fa-home"></i> <span class="title"> Dashboard </span></a>
							</li>

                            <li>
								<a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="title"> Klanten</span><i class="icon-arrow"></i></a>
                                    <ul class="sub-menu">
                                        <li>
                                        <a href="/admin/klanten/list"><i class="fa fa-desktop"></i> <span class="title"> Overzicht </span></a>
                                        </li>
                                        <li>
                                        <a href="/admin/klanten/new"><i class="fa fa-desktop"></i> <span class="title"> Klant aanmaken </span></a>
                                        </li>
                                    </ul>
							</li>

                            <li>
								<a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="title"> Machines</span><i class="icon-arrow"></i></a>
                                    <ul class="sub-menu">
                                        <li>
                                        <a href="/admin/machines/list"><i class="fa fa-desktop"></i> <span class="title"> Overzicht </span></a>
                                        </li>
                                        <li>
                                        <a href="/admin/machines/new"><i class="fa fa-desktop"></i> <span class="title"> Machine aanmaken </span></a>
                                        </li>
                                    </ul>
							</li>

                            <li>
								<a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="title"> Medewerkers</span><i class="icon-arrow"></i></a>
                                    <ul class="sub-menu">
                                        <li>
                                        <a href="/admin/medewerkers/list"><i class="fa fa-desktop"></i> <span class="title"> Overzicht </span></a>
                                        </li>
                                        <li>
                                        <a href="/admin/medewerkers/new"><i class="fa fa-desktop"></i> <span class="title"> Medewerker aanmaken </span></a>
                                        </li>
                                    </ul>
							</li>

                            <li>
								<a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="title"> Standen</span><i class="icon-arrow"></i></a>
                                    <ul class="sub-menu">
                                        <li>
                                        <a href="/admin/standen/list"><i class="fa fa-desktop"></i> <span class="title"> Overzicht </span></a>
                                        </li>
                                    </ul>
							</li>

						</ul>
						<!-- end: MAIN NAVIGATION MENU -->
					</div>
					<!-- end: SIDEBAR -->
				</div>
				<div class="slide-tools">
					<div class="col-xs-6 text-right no-padding">
						<a class="btn btn-sm log-out text-right" href="login_login.html">
							<i class="fa fa-power-off"></i> Uitloggen
						</a>
					</div>
				</div>
			</nav>
			<!-- end: PAGESLIDE LEFT -->

			<!-- start: PAGESLIDE RIGHT -->
			<div id="pageslide-right" class="pageslide slide-fixed inner">
				<div class="right-wrapper">
					<ul class="nav nav-tabs nav-justified" id="sidebar-tab">
						<li class="active">
							<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-users"></i></a>
						</li>
						<li>
							<a href="#notifications" role="tab" data-toggle="tab"><i class="fa fa-bookmark "></i></a>
						</li>
						<li>
							<a href="#settings" role="tab" data-toggle="tab"><i class="fa fa-gear"></i></a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="users">
							<div class="users-list">
								<h5 class="sidebar-title">On-line</h5>
								<ul class="media-list">
									<li class="media">
										<a href="#">
											<i class="fa fa-circle status-online"></i>
											<img alt="..." src="/images/avatar-2.jpg" class="media-object">
											<div class="media-body">
												<h4 class="media-heading">Nicole Bell</h4>
												<span> Content Designer </span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="#">
											<div class="user-label">
												<span class="label label-default">3</span>
											</div>
											<i class="fa fa-circle status-online"></i>
											<img alt="..." src="/images/avatar-3.jpg" class="media-object">
											<div class="media-body">
												<h4 class="media-heading">Steven Thompson</h4>
												<span> Visual Designer </span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="#">
											<i class="fa fa-circle status-online"></i>
											<img alt="..." src="/images/avatar-4.jpg" class="media-object">
											<div class="media-body">
												<h4 class="media-heading">Ella Patterson</h4>
												<span> Web Editor </span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="#">
											<i class="fa fa-circle status-online"></i>
											<img alt="..." src="/images/avatar-5.jpg" class="media-object">
											<div class="media-body">
												<h4 class="media-heading">Kenneth Ross</h4>
												<span> Senior Designer </span>
											</div>
										</a>
									</li>
								</ul>
								<h5 class="sidebar-title">Off-line</h5>
								<ul class="media-list">
									<li class="media">
										<a href="#">
											<img alt="..." src="/images/avatar-6.jpg" class="media-object">
											<div class="media-body">
												<h4 class="media-heading">Nicole Bell</h4>
												<span> Content Designer </span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="#">
											<div class="user-label">
												<span class="label label-default">3</span>
											</div>
											<img alt="..." src="/images/avatar-7.jpg" class="media-object">
											<div class="media-body">
												<h4 class="media-heading">Steven Thompson</h4>
												<span> Visual Designer </span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="#">
											<img alt="..." src="/images/avatar-8.jpg" class="media-object">
											<div class="media-body">
												<h4 class="media-heading">Ella Patterson</h4>
												<span> Web Editor </span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="#">
											<img alt="..." src="/images/avatar-9.jpg" class="media-object">
											<div class="media-body">
												<h4 class="media-heading">Kenneth Ross</h4>
												<span> Senior Designer </span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="#">
											<img alt="..." src="/images/avatar-10.jpg" class="media-object">
											<div class="media-body">
												<h4 class="media-heading">Ella Patterson</h4>
												<span> Web Editor </span>
											</div>
										</a>
									</li>
									<li class="media">
										<a href="#">
											<img alt="..." src="/images/avatar-5.jpg" class="media-object">
											<div class="media-body">
												<h4 class="media-heading">Kenneth Ross</h4>
												<span> Senior Designer </span>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="user-chat">
								<div class="sidebar-content">
									<a class="sidebar-back" href="#"><i class="fa fa-chevron-circle-left"></i> Back</a>
								</div>
								<div class="user-chat-form sidebar-content">
									<div class="input-group">
										<input type="text" placeholder="Type a message here..." class="form-control">
										<div class="input-group-btn">
											<button class="btn btn-blue no-radius" type="button">
												<i class="fa fa-chevron-right"></i>
											</button>
										</div>
									</div>
								</div>
								<ol class="discussion sidebar-content">
									<li class="other">
										<div class="avatar">
											<img src="/images/avatar-4.jpg" alt="">
										</div>
										<div class="messages">
											<p>
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
											</p>
											<span class="time"> 51 min </span>
										</div>
									</li>
									<li class="self">
										<div class="avatar">
											<img src="/images/avatar-1.jpg" alt="">
										</div>
										<div class="messages">
											<p>
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
											</p>
											<span class="time"> 37 mins </span>
										</div>
									</li>
									<li class="other">
										<div class="avatar">
											<img src="/images/avatar-4.jpg" alt="">
										</div>
										<div class="messages">
											<p>
												Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
											</p>
										</div>
									</li>
								</ol>
							</div>
						</div>
						<div class="tab-pane" id="notifications">
							<div class="notifications">
								<div class="pageslide-title">
									You have 11 notifications
								</div>
								<ul class="pageslide-list">
									<li>
										<a href="javascript:void(0)">
											<span class="label label-primary"><i class="fa fa-user"></i></span> <span class="message"> New user registration</span> <span class="time"> 1 min</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
											<span class="label label-success"><i class="fa fa-comment"></i></span> <span class="message"> New comment</span> <span class="time"> 7 min</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
											<span class="label label-success"><i class="fa fa-comment"></i></span> <span class="message"> New comment</span> <span class="time"> 8 min</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
											<span class="label label-success"><i class="fa fa-comment"></i></span> <span class="message"> New comment</span> <span class="time"> 16 min</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
											<span class="label label-primary"><i class="fa fa-user"></i></span> <span class="message"> New user registration</span> <span class="time"> 36 min</span>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)">
											<span class="label label-warning"><i class="fa fa-shopping-cart"></i></span> <span class="message"> 2 items sold</span> <span class="time"> 1 hour</span>
										</a>
									</li>
									<li class="warning">
										<a href="javascript:void(0)">
											<span class="label label-danger"><i class="fa fa-user"></i></span> <span class="message"> User deleted account</span> <span class="time"> 2 hour</span>
										</a>
									</li>
								</ul>
								<div class="view-all">
									<a href="javascript:void(0)">
										See all notifications <i class="fa fa-arrow-circle-o-right"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="settings">
							<h5 class="sidebar-title">General Settings</h5>
							<ul class="media-list">
								<li class="media">
									<div class="checkbox sidebar-content">
										<label>
											<input type="checkbox" value="" class="green" checked="checked">
											Enable Notifications
										</label>
									</div>
								</li>
								<li class="media">
									<div class="checkbox sidebar-content">
										<label>
											<input type="checkbox" value="" class="green" checked="checked">
											Show your E-mail
										</label>
									</div>
								</li>
								<li class="media">
									<div class="checkbox sidebar-content">
										<label>
											<input type="checkbox" value="" class="green">
											Show Offline Users
										</label>
									</div>
								</li>
								<li class="media">
									<div class="checkbox sidebar-content">
										<label>
											<input type="checkbox" value="" class="green" checked="checked">
											E-mail Alerts
										</label>
									</div>
								</li>
								<li class="media">
									<div class="checkbox sidebar-content">
										<label>
											<input type="checkbox" value="" class="green">
											SMS Alerts
										</label>
									</div>
								</li>
							</ul>
							<div class="sidebar-content">
								<button class="btn btn-success">
									<i class="icon-settings"></i> Save Changes
								</button>
							</div>
						</div>
					</div>
					<div class="hidden-xs" id="style_selector">
						<div id="style_selector_container">
							<div class="pageslide-title">
								Style Selector
							</div>
							<div class="box-title">
								Choose Your Layout Style
							</div>
							<div class="input-box">
								<div class="input">
									<select name="layout" class="form-control">
										<option value="default">Wide</option><option value="boxed">Boxed</option>
									</select>
								</div>
							</div>
							<div class="box-title">
								Choose Your Header Style
							</div>
							<div class="input-box">
								<div class="input">
									<select name="header" class="form-control">
										<option value="fixed">Fixed</option><option value="default">Default</option>
									</select>
								</div>
							</div>
							<div class="box-title">
								Choose Your Sidebar Style
							</div>
							<div class="input-box">
								<div class="input">
									<select name="sidebar" class="form-control">
										<option value="fixed">Fixed</option><option value="default">Default</option>
									</select>
								</div>
							</div>
							<div class="box-title">
								Choose Your Footer Style
							</div>
							<div class="input-box">
								<div class="input">
									<select name="footer" class="form-control">
										<option value="default">Default</option><option value="fixed">Fixed</option>
									</select>
								</div>
							</div>
							<div class="box-title">
								10 Predefined Color Schemes
							</div>
							<div class="images icons-color">
								<a href="#" id="default"><img src="/images/color-1.png" alt="" class="active"></a>
								<a href="#" id="style2"><img src="/images/color-2.png" alt=""></a>
								<a href="#" id="style3"><img src="/images/color-3.png" alt=""></a>
								<a href="#" id="style4"><img src="/images/color-4.png" alt=""></a>
								<a href="#" id="style5"><img src="/images/color-5.png" alt=""></a>
								<a href="#" id="style6"><img src="/images/color-6.png" alt=""></a>
								<a href="#" id="style7"><img src="/images/color-7.png" alt=""></a>
								<a href="#" id="style8"><img src="/images/color-8.png" alt=""></a>
								<a href="#" id="style9"><img src="/images/color-9.png" alt=""></a>
								<a href="#" id="style10"><img src="/images/color-10.png" alt=""></a>
							</div>
							<div class="box-title">
								Backgrounds for Boxed Version
							</div>
							<div class="images boxed-patterns">
								<a href="#" id="bg_style_1"><img src="/images/bg.png" alt=""></a>
								<a href="#" id="bg_style_2"><img src="/images/bg_2.png" alt=""></a>
								<a href="#" id="bg_style_3"><img src="/images/bg_3.png" alt=""></a>
								<a href="#" id="bg_style_4"><img src="/images/bg_4.png" alt=""></a>
								<a href="#" id="bg_style_5"><img src="/images/bg_5.png" alt=""></a>
							</div>
							<div class="style-options">
								<a href="#" class="clear_style">
									Clear Styles
								</a>
								<a href="#" class="save_style">
									Save Styles
								</a>
							</div>
						</div>
						<div class="style-toggle open"></div>
					</div>
				</div>
			</div>
			<!-- end: PAGESLIDE RIGHT -->