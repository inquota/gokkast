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
								<h5 class="no-margin"> Welkom </h5>
								<h4 class="no-margin"> {{ $currentuser->username}}</h4>

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
                                    </ul>
							</li>

                            <li>
								<a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="title"> Gebruikers</span><i class="icon-arrow"></i></a>
                                    <ul class="sub-menu">
                                        <li>
                                        <a href="/admin/medewerkers/list"><i class="fa fa-desktop"></i> <span class="title"> Overzicht </span></a>
                                        </li>
                                        <li>
                                        <a href="/admin/beheerders/new"><i class="fa fa-desktop"></i> <span class="title"> Beheerder aanmaken </span></a>
                                        </li>
                                        <li>
                                        <a href="/admin/medewerkers/new"><i class="fa fa-desktop"></i> <span class="title"> Medewerker aanmaken </span></a>
                                        </li>
                                        <li>
                                        <a href="/admin/klanten/new"><i class="fa fa-desktop"></i> <span class="title"> Klant aanmaken </span></a>
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

			