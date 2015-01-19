@extends('layouts.master')

@stop

@section('content')

<div class="row">
							<div class="col-sm-12">
								<!-- start: TEXT FIELDS PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title">Bekijk machine</h4>
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
														<a href="#" class="panel-refresh">
															<i class="fa fa-refresh"></i> <span>Refresh</span>
														</a>
													</li>
													<li>
														<a data-toggle="modal" href="#panel-config" class="panel-config">
															<i class="fa fa-wrench"></i> <span>Configurations</span>
														</a>
													</li>
													<li>
														<a href="#" class="panel-expand">
															<i class="fa fa-expand"></i> <span>Fullscreen</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="panel-body">
								<table id="sample-table-1" class="table table-hover">
											<thead>
												<tr>
													
												</tr>
											</thead>
											<tbody>
												
												<tr>
													<td>Machine nummer</td>
													<td>{{$machine->machinenr}}</td>	
												</tr>
												
														<tr>
													<td>Machine type</td>
													<td>{{$machine->machine_type}}</td>	
												</tr>
												
														<tr>
													<td>Th nummer</td>
													<td>{{$machine->th_nr}}</td>	
												</tr>
												
														<tr>
													<td>Tb nummer</td>
													<td>{{$machine->tb_nr}}</td>	
												</tr>
												
														<tr>
													<td>Locatie</td>
													<td>{{$machine->locatie}}</td>	
												</tr>
												
														<tr>
													<td>Aangemaakt op</td>
													<td>{{$machine->created_at}}</td>	
												</tr>
											
											</tbody>
										</table>

				
											
									</div>
            
								</div>
								<!-- end: TEXT FIELDS PANEL -->
							</div>
						</div>
						

						
						<div class="row">
							<div class="col-sm-12">
								<!-- start: TEXT FIELDS PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title">Standen van deze machine</h4>
									</div>
									<div class="panel-body">
					<table id="sample-table-1" class="table table-hover">
											<thead>
												<tr>
													<th class="center">#</th>
													<th>Begin stand</th>
													<th>Eind stand</th>
													<th>Aangemaakt op</th>
													<th>Acties</th>
												</tr>
											</thead>
											<tbody>
												@if(count($standen) == 0 )
													<tr>
														<td colspan="5"class="center">Er zijn nog geen standen geregistreerd</td>
													</tr>
												@else
												
												@foreach($standen as $machine)
												<tr>
													<td class="center">{{$machine->id}}</td>
													<td class="hidden-xs">&euro; {{$machine->b_stand}}</td>
													<td>&euro; {{$machine->e_stand}}</td>
													<td>{{$machine->created_at}}</td>
													<td class="center">
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<a data-original-title="Bewerk" data-placement="top" class="btn btn-xs btn-blue tooltips" href="/admin/standen/edit/{{$machine->id}}"><i class="fa fa-edit"></i></a>
														<a data-original-title="Verwijder" data-placement="top" class="btn btn-xs btn-red tooltips" href="/admin/standen/remove/{{$machine->id}}" onclick="confirm('Weet je zeker dat je stand nummer {{$machine->id}} wilt verwijderen? LET OP: Deze actie kan niet meer ongedaan gemaakt worden');"><i class="fa fa-times fa fa-white"></i></a>
													</div>
													<div class="visible-xs visible-sm hidden-md hidden-lg">
														<div class="btn-group">
															<a href="#" data-toggle="dropdown" class="btn btn-green dropdown-toggle btn-sm">
																<i class="fa fa-cog"></i> <span class="caret"></span>
															</a>
															<ul class="dropdown-menu pull-right dropdown-dark" role="menu">
																<li>
																	<a href="/admin/machines/view/{{$machine->id}}" tabindex="-1" role="menuitem">
																		<i class="fa fa-edit"></i> View
																	</a>
																</li>
																<li>
																	<a href="/admin/machines/edit/{{$machine->id}}" tabindex="-1" role="menuitem">
																		<i class="fa fa-edit"></i> Edit
																	</a>
																</li>
																<li>
																	<a href="#" tabindex="-1" role="menuitem">
																		<i class="fa fa-times"></i> Remove
																	</a>
																</li>
															</ul>
														</div>
													</div></td>
												</tr>
												@endforeach
												@endif
											</tbody>
										</table>

				
											
									</div>
            
								</div>
								<!-- end: TEXT FIELDS PANEL -->
							</div>
						</div>
						
						
						
						
@stop