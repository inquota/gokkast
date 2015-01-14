@extends('layouts.master')

@stop

@section('content')

<div class="row">
							<div class="col-md-12">
								<!-- start: BASIC TABLE PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title">Klanten</h4>
										<div class="panel-tools">										
											<div class="dropdown">
											<a class="btn btn-xs dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
												<i class="fa fa-cog"></i>
											</a>
											<ul role="menu" class="dropdown-menu dropdown-light pull-right">
												<li>
													<a href="#" class="panel-collapse collapses"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
												</li>
												<li>
													<a href="#" class="panel-refresh"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a>
												</li>
												<li>
													<a data-toggle="modal" href="#panel-config" class="panel-config"> <i class="fa fa-wrench"></i> <span>Configurations</span></a>
												</li>
												<li>
													<a href="#" class="panel-expand"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
												</li>										
											</ul>
											</div>
											<a href="#" class="btn btn-xs btn-link panel-close"> <i class="fa fa-times"></i> </a>
										</div>
									</div>
									<div class="panel-body">
										<p>
											<a href="/admin/klanten/new/">Nieuw</a>
											Hier vind je alle klanten.
										</p>
										<table id="sample-table-1" class="table table-hover">
											<thead>
												<tr>
													<th class="center">#</th>
													<th>Bedrijf</th>
													<th class="hidden-xs">Naam</th>
													<th class="hidden-xs">E-mail</th>
													<th>Medewerker</th>
													<th>Aangemaakt op</th>
													<th>Acties</th>
												</tr>
											</thead>
											<tbody>
												@foreach($machines as $machine)
												<tr>
													<td class="center">{{$machine->id}}</td>
													<td class="hidden-xs">{{$machine->bedrijf}}</td>
													<td class="hidden-xs">{{$machine->email}}</td>
													<td>{{$machine->naam}}</td>
													<td>{{$machine->medewerker_id}}</td>
													<td>{{$machine->created_at}}</td>
													<td class="center">
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<a data-original-title="Edit" data-placement="top" class="btn btn-xs btn-blue tooltips" href="/admin/machines/edit/{{$machine->id}}"><i class="fa fa-edit"></i></a>
														<a data-original-title="Remove" data-placement="top" class="btn btn-xs btn-red tooltips" href="#"><i class="fa fa-times fa fa-white"></i></a>
													</div>
													<div class="visible-xs visible-sm hidden-md hidden-lg">
														<div class="btn-group">
															<a href="#" data-toggle="dropdown" class="btn btn-green dropdown-toggle btn-sm">
																<i class="fa fa-cog"></i> <span class="caret"></span>
															</a>
															<ul class="dropdown-menu pull-right dropdown-dark" role="menu">
																<li>
																	<a href="/admin/klanten/edit/{{$machine->id}}" tabindex="-1" role="menuitem">
																		<i class="fa fa-edit"></i> Bewerken
																	</a>
																</li>
																<li>
																	<a href="#" tabindex="-1" role="menuitem">
																		<i class="fa fa-times"></i> Verwijderen
																	</a>
																</li>
															</ul>
														</div>
													</div></td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
								<!-- end: BASIC TABLE PANEL -->
							</div>
						</div>


@stop