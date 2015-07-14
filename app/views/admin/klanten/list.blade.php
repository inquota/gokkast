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
											<a href="/admin/klanten/new/" class="btn btn-green"><i class="glyphicon glyphicon-plus"></i> Nieuw</a>
										</p>
										<table id="sample-table-1" class="table table-hover">
											<thead>
												<tr>
													<th>Bedrijf</th>
													<th class="hidden-xs">Naam</th>
													<th>Medewerker</th>
													<th>Totaal openstaand <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Totaal openstaand inclusief 29% kansspel belasting"><i class="fa fa-info-circle"></i></a></th>
													<th>Totaal <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Totaal omzet exclusief kansspel belasting"><i class="fa fa-info-circle"></i></a></th>
													<th>Totaal incl. kansspel <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Totaal omzet inclusief 29% kansspel belasting"><i class="fa fa-info-circle"></i></a></th>
													<th>Beheer</th>
												</tr>
											</thead>
											<tbody>
											    @if(!$klanten->isEmpty())
												@foreach($klanten as $klant)
												<tr>
													<td class="hidden-xs">{{$klant->bedrijf}}</td>
													<td class="hidden-xs">{{$klant->naam}}</td>
													<td>{{$klant->medewerker_id}}</td>
													<th>&euro; {{ number_format( BonTotal::where('klant_id', '=', $klant->id)->where('status', '=', 'unpaid')->sum('with_tax') , 2, ',', '.' ) }}</th>
													<th>&euro; {{ number_format( BonTotal::where('klant_id', '=', $klant->id)->where('status', '=', 'approved')->sum('subtotal') , 2, ',', '.' ) }}</th>
													<th>&euro; {{ number_format( BonTotal::where('klant_id', '=', $klant->id)->where('status', '=', 'approved')->sum('with_tax') , 2, ',', '.' ) }}</th>
													<td class="center">
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<a data-original-title="Klik hier voor het machine overzicht" data-placement="top" class="btn btn-xs btn-primary tooltips" href="/admin/klanten/machines/{{$klant->id}}"><i class="fa fa-ticket"></i> Machines</a>
														<a data-original-title="Klik hier om een Bon aan te maken" data-placement="top" class="btn btn-xs btn-primary tooltips" href="/admin/bonnen/new/{{$klant->id}}"><i class="fa fa-money"></i> Bon aanmaken</a>
														<a data-original-title="Edit" data-placement="top" class="btn btn-xs btn-blue tooltips" href="/admin/klanten/edit/{{$klant->id}}"><i class="fa fa-edit"></i> Bewerken</a>
														<a onclick="confirm('Weet u zeker dat u de klant {{ $klant->naam }} wilt verwijderden?')" data-original-title="Remove" data-placement="top" class="btn btn-xs btn-red tooltips" href="/admin/klanten/delete/{{$klant->id}}"><i class="fa fa-times fa fa-white"></i> Verwijderen</a>
													</div>
													<div class="visible-xs visible-sm hidden-md hidden-lg">
														<div class="btn-group">
															<a href="#" data-toggle="dropdown" class="btn btn-green dropdown-toggle btn-sm">
																<i class="fa fa-cog"></i> <span class="caret"></span>
															</a>
															<ul class="dropdown-menu pull-right dropdown-dark" role="menu">
																<li>
																	<a href="/admin/klanten/machines/{{$klant->id}}" tabindex="-1" role="menuitem">
																		<i class="fa fa-edit"></i> Machines
																	</a>
																</li>
																<li>
																	<a href="/admin/klanten/edit/{{$klant->id}}" tabindex="-1" role="menuitem">
																		<i class="fa fa-edit"></i> Bewerken
																	</a>
																</li>
																<li>
																	<a href="/admin/klanten/delete/{{$klant->id}}" tabindex="-1" role="menuitem" onclick="confirm('Weet u zeker dat u de klant {{ $klant->naam }} wilt verwijderden?')">
																		<i class="fa fa-times"></i> Verwijderen
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