@extends('layouts.master')

@stop

@section('content')

<?php
	$statusarray = array('new' => 'Openstaand', 'approved' => 'Goedgekeurd', 'rejected'=> 'Afgewezen');
        ?>

<div class="row">
							<div class="col-md-12">
								<!-- start: BASIC TABLE PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title">Bonnen</h4>
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
										<table id="sample-table-1" class="table table-hover">
											<thead>
												<tr>
													<th>Bon nr</th>
													<th>Klant</th>
													<th>Status</th>
													<th>Acties</th>
												</tr>
											</thead>
											<tbody>
											@if(!empty($bonnen))
												@foreach($bonnen as $bon)
												<tr>
													<td>{{$bon->bon_id}}</td>
													<td class="hidden-xs">{{(!empty($klanten)) ? $klanten[$bon->klant_id] : 'Geen klant beschikbaar'}}</td>
													<td class="hidden-xs">{{ $statusarray[$bon->status] }}</td>
													<td class="center">
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<a data-original-title="Bekijk" data-placement="top" class="btn btn-xs btn-blue tooltips" href="/admin/bonnen/view/{{$bon->bon_id}}/{{$bon->klant_id}}"><i class="fa fa-file-o"></i></a>
														<a data-original-title="Bewerk" data-placement="top" class="btn btn-xs btn-blue tooltips" href="/admin/bonnen/edit/{{$bon->bon_id}}"><i class="fa fa-edit"></i></a>
														<a data-original-title="Verwijder" data-placement="top" class="btn btn-xs btn-red tooltips" href="/admin/bonnen/delete/{{$bon->bon_id}}"><i class="fa fa-times fa fa-white"></i></a>
													</div>
													<div class="visible-xs visible-sm hidden-md hidden-lg">
														<div class="btn-group">
															<a href="#" data-toggle="dropdown" class="btn btn-green dropdown-toggle btn-sm">
																<i class="fa fa-cog"></i> <span class="caret"></span>
															</a>
															<ul class="dropdown-menu pull-right dropdown-dark" role="menu">
																<li>
																	<a href="/admin/bonnen/view/{{$bon->bon_id}}/{{$bon->klant_id}}" tabindex="-1" role="menuitem">
																		<i class="fa fa-edit"></i> View
																	</a>
																</li>
																<li>
																	<a href="/admin/bonnen/edit/{{$bon->bon_id}}" tabindex="-1" role="menuitem">
																		<i class="fa fa-edit"></i> Edit
																	</a>
																</li>
																<li>
																	<a href="/admin/bonnen/delete/{{$bon->id}}" tabindex="-1" role="menuitem">
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
								<!-- end: BASIC TABLE PANEL -->
							</div>
						</div>


@stop