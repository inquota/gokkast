@extends('layouts.master')

@stop

@section('content')

@if($errors->has())
	<div class="alert alert-danger">
	    <ul>
	@foreach($errors->all() AS $error)
	<li>{{  $error }}</li>
	@endforeach
	    </ul>
	</div>
@endif

<div class="row">
	<div class="col-md-12">
			@if(isset($klant->id))
<div class="panel panel-white">
	<div class="panel-heading border-light">
		<h4 class="panel-title">Machines bij <a href="/admin/klanten/edit/{{$klant->id}}">{{ $klant->bedrijf }}</a> </h4>
	</div>
	<div class="panel-body">
		<p>
											<a href="/admin/machines/new/{{ $klant->id }}" class="btn btn-green"><i class="glyphicon glyphicon-plus"></i> Nieuw</a>
										</p>
										<table id="sample-table-1" class="table table-hover">
											<thead>
												<tr>
													<th class="center">#</th>
													<th>Machine nummer</th>
													<th class="hidden-xs">Machine type</th>
													<th>Type nummer</th>
													<th>Locatie</th>
													<th>Beheer</th>
												</tr>
											</thead>
											<tbody>
											@if(!empty($machines))
												@foreach($machines as $machine)
												<tr>
													<td class="center">{{$machine->id}}</td>
													<td>{{$machine->machinenr}}</td>
													<td>{{$machine->machine_type}}</td>
													<td>{{$machine->type_nummer}}</td>
													<td>{{$machine->locatie}}</td>
													<td class="center">
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<a data-original-title="Bekijk" data-placement="top" class="btn btn-xs btn-blue tooltips" href="/admin/machines/save/{{$machine->id}}/{{ $klant->id }}"><i class="fa fa-edit"></i> Bewerken</a>
														<a data-original-title="Verwijder" data-placement="top" class="btn btn-xs btn-red tooltips" href="#"><i class="fa fa-times fa fa-white"></i> Verwijderen</a>
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
	@endif
</div>
</div>

@stop