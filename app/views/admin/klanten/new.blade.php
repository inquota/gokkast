@extends('layouts.master')

@stop

@section('content')


@if(isset($klant))
	<h1>Bewerk klant</h1>
@else
	<h1>Nieuwe klant</h1>
@endif


@if($errors->has())
	<div class="alert alert-danger">
	    <ul>
	@foreach($errors->all() AS $error)
	<li>{{  $error }}</li>
	@endforeach
	    </ul>
	</div>
@endif

{{ Form::open(array('class'=>'form-horizontal','role'=>'form','url' => Request::path())) }}
<div class="row">
	
<div class="col-md-6">
<div class="panel panel-white">
	<div class="panel-heading border-light">
		<h4 class="panel-title">NAW</h4>
	</div>
	<div class="panel-body">
<div class="form-group">
		<label for="form-field-1" class="col-sm-2 control-label">
			Bedrijf
		</label>
		<div class="col-sm-9">
			{{ Form::text('bedrijf', (isset($klant->bedrijf)) ? $klant->bedrijf : '',  array('id' => 'bedrijf', 'class' => 'form-control')) }}
		</div>
	</div>
	
	<div class="form-group">
		<label for="form-field-1" class="col-sm-2 control-label">
			Voornaam
		</label>
		<div class="col-sm-9">
			{{ Form::text('first_name', (isset($klant->user->first_name)) ? $klant->user->first_name : '',  array('id' => 'first_name', 'class' => 'form-control')) }}
		</div>
	</div>

	<div class="form-group">
		<label for="form-field-1" class="col-sm-2 control-label">
			Achternaam
		</label>
		<div class="col-sm-9">
{{ Form::text('last_name', (isset($klant->user->last_name)) ? $klant->user->last_name : '',  array('id' => 'last_name', 'class' => 'form-control')) }}
		</div>
	</div>
	
	<div class="form-group">
		<label for="form-field-1" class="col-sm-2 control-label">
			Adres
		</label>
		<div class="col-sm-9">
			{{ Form::text('adres', (isset($klant->adres)) ? $klant->adres : '',  array('id' => 'adres', 'class' => 'form-control')) }}
		</div>
	</div>
	
	<div class="form-group">
		<label for="form-field-1" class="col-sm-2 control-label">
			Postcode
		</label>
		<div class="col-sm-9">
			{{ Form::text('postcode', (isset($klant->postcode)) ? $klant->postcode : '',  array('id' => 'postcode', 'class' => 'form-control')) }}
		</div>
	</div>
	
					<div class="form-group">
		<label for="form-field-1" class="col-sm-2 control-label">
			Woonplaats
		</label>
		<div class="col-sm-9">
			{{ Form::text('woonplaats', (isset($klant->woonplaats)) ? $klant->woonplaats : '',  array('id' => 'woonplaats', 'class' => 'form-control')) }}
		</div>
	</div>	
	</div>
</div>
</div>

<div class="col-md-6">
<div class="panel panel-white">
	<div class="panel-heading border-light">
		<h4 class="panel-title">Contact</h4>
	</div>
	<div class="panel-body">
<div class="form-group">
		<label for="form-field-1" class="col-sm-2 control-label">
			Telefoon
		</label>
		<div class="col-sm-9">
			{{ Form::text('telefoon_vast', (isset($klant->telefoon_vast)) ? $klant->telefoon_vast : '',  array('id' => 'telefoon_vast', 'class' => 'form-control')) }}
		</div>
	</div>
	
					<div class="form-group">
		<label for="form-field-1" class="col-sm-2 control-label">
			Mobiel
		</label>
		<div class="col-sm-9">
			{{ Form::text('telefoon_mobiel', (isset($klant->telefoon_mobiel)) ? $klant->telefoon_mobiel : '',  array('id' => 'telefoon_mobiel', 'class' => 'form-control')) }}
		</div>
	</div>
	
					<div class="form-group">
		<label for="form-field-1" class="col-sm-2 control-label">
			E-mail
		</label>
		<div class="col-sm-9">
			{{ Form::text('email', (isset($klant->email)) ? $klant->email : '',  array('id' => 'email', 'class' => 'form-control')) }}
		</div>
	</div>
	
					<div class="form-group">
		<label for="form-field-1" class="col-sm-2 control-label">
			Website
		</label>
		<div class="col-sm-9">
			{{ Form::text('website', (isset($klant->website)) ? $klant->website : '',  array('id' => 'website', 'class' => 'form-control')) }}
		</div>
		</div>	
	</div>
</div>
</div>

</div>
	
	
	
	
	
	
<div class="row">
	
<div class="col-md-6">
<div class="panel panel-white">
	<div class="panel-heading border-light">
		<h4 class="panel-title">Overige</h4>
	</div>
	<div class="panel-body">
<div class="form-group">
<label for="form-field-1" class="col-sm-3 control-label"> Medewerker </label>
					<div class="col-sm-9">
						@if($medewerkers)
						<select name="medewerker_id">
							@foreach($medewerkers as $medewerker)
							<option
							@if(isset($klant->medewerker_id) && $klant->medewerker_id == $medewerker->id)
								selected="selected"
								@endif
								value="{{$medewerker->id}}">{{$medewerker->naam}}</option>
							@endforeach
						</select>
						@else
						Er zijn nog geen Medewerkers
						@endif
					</div>
					</div>

					<div class="form-group">
						<label for="form-field-1" class="col-sm-3 control-label"> Bedrag lening </label>
						<div class="col-sm-3">
							{{ Form::text('bedrag_lening', (isset($klant->bedrag_lening)) ? $klant->bedrag_lening : '',  array('id' => 'bedrag_lening', 'class' => 'form-control')) }}
						</div>
					</div>

					<div class="form-group">
						<label for="form-field-1" class="col-sm-3 control-label"> Bedrag plaatsing geld </label>
						<div class="col-sm-3">
							{{ Form::text('bedrag_plaatsing_geld', (isset($klant->bedrag_plaatsing_geld)) ? $klant->bedrag_plaatsing_geld : '',  array('id' => 'bedrag_plaatsing_geld', 'class' => 'form-control')) }}
						</div>
					</div>

					<div class="form-group">
						<label for="form-field-1" class="col-sm-3 control-label"> Geldwisselaar aanwezig </label>
						<div class="col-sm-3">
							<select name="geldwisselaar">
								<option
								@if(isset($klant->geldwisselaar) && $klant->geldwisselaar == 'Eigendom ondernemer')
									selected="selected"
									@endif
									value="Eigendom ondernemer">Eigendom ondernemer</option>
								<option
								@if(isset($klant->geldwisselaar) && $klant->geldwisselaar == 'Eigendom speelautomatenbedrijf')
									selected="selected"
									@endif
									value="Eigendom speelautomatenbedrijf">Eigendom speelautomatenbedrijf</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="form-field-1" class="col-sm-3 control-label"> Vulling machines </label>
						<div class="col-sm-9">
							<select name="vulling_machines">
								<option
								@if(isset($klant->vulling_machines) && $klant->vulling_machines == 1)
									selected="selected"
									@endif
									value="1">Ja</option>
								<option
								@if(isset($klant->vulling_machines) && $klant->vulling_machines == 0)
									selected="selected"
									@endif
									value="0">Nee</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="form-field-1" class="col-sm-3 control-label"> Bedrag vulling machines </label>
						<div class="col-sm-3">
							{{ Form::text('bedrag_vulling_machines', (isset($klant->bedrag_vulling_machines)) ? $klant->bedrag_vulling_machines : '',  array('id' => 'postcode', 'bedrag_vulling_machines' => 'form-control')) }}
						</div>
					</div>

					<div class="form-group">
						<label for="form-field-1" class="col-sm-3 control-label"> Vulling geldwisselaar </label>
						<div class="col-sm-9">
							<select name="vulling_geldwisselaar">
								<option
								@if(isset($klant->vulling_geldwisselaar) && $klant->vulling_geldwisselaar == 1)
									selected="selected"
									@endif
									value="1">Ja</option>
								<option
								@if(isset($klant->vulling_geldwisselaar) && $klant->vulling_geldwisselaar == 0)
									selected="selected"
									@endif
									value="0">Nee</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="form-field-1" class="col-sm-3 control-label"> Bedrag vulling geldwisselaar </label>
						<div class="col-sm-2">
							{{ Form::text('bedrag_vulling_geldwisselaar', (isset($klant->bedrag_vulling_geldwisselaar)) ? $klant->bedrag_vulling_geldwisselaar : '',  array('id' => 'bedrag_vulling_geldwisselaar', 'class' => 'form-control')) }}
						</div>
					</div>
	</div>
</div>
</div>

<div class="col-md-6">
<div class="panel panel-white">
	<div class="panel-heading border-light">
		<h4 class="panel-title">Vergunning en contract</h4>
	</div>
	<div class="panel-body">
						
															<div class="form-group">
												<label for="form-field-1" class="col-sm-3 control-label">
													Vergunning nummer
												</label>
												<div class="col-sm-9">
													{{ Form::text('vergunning_nummer', (isset($klant->vergunning_nummer)) ? $klant->vergunning_nummer : '',  array('id' => 'vergunning_nummer', 'class' => 'form-control')) }}
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-3 control-label">
													Vergunning verleend door
												</label>
												<div class="col-sm-9">
													{{ Form::text('vergunning_verl_door', (isset($klant->vergunning_verl_door)) ? $klant->vergunning_verl_door : '',  array('id' => 'vergunning_verl_door', 'class' => 'form-control')) }}
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-3 control-label">
													Vergunning geldig vanaf
												</label>
												<div class="col-sm-9">
												    <div class="input-group">
													{{ Form::text('verg_geldig_vanaf', (isset($klant->verg_geldig_vanaf)) ? date('d-m-Y', strtotime($klant->verg_geldig_vanaf)) : '',  array('id' => 'verg_geldig_vanaf', 'class' => 'form-control date-picker', 'data-date-viewmode'=>'years', 'data-date-format'=>'dd-mm-yyyy')) }}
													<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
													</div>
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-3 control-label">
													Vergunning geldig tot
												</label>
												<div class="col-sm-9">
												    <div class="input-group">
													{{ Form::text('verg_geldig_tot', (isset($klant->verg_geldig_tot)) ? date('d-m-Y', strtotime($klant->verg_geldig_tot)) : '',  array('id' => 'verg_geldig_tot', 'class' => 'form-control date-picker', 'data-date-viewmode'=>'years', 'data-date-format'=>'dd-mm-yyyy')) }}
										            <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
										            </div>
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-3 control-label">
													Contract
												</label>
												<div class="col-sm-9">
												<select name="contract">
														<option
					                                        @if(isset($klant->contract) && $klant->contract == 1)
															    selected="selected"
															@endif
														value="1">Ja</option>
														<option
					                                        @if(isset($klant->contract) && $klant->contract == 0)
															    selected="selected"
															@endif
														value="0">Nee</option>
													</select>
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-3 control-label">
													Contract geldig vanaf
												</label>
												<div class="col-sm-9">
													<div class="input-group">
														{{ Form::text('contr_geldig_vanaf', (isset($klant->contr_geldig_vanaf)) ? date('d-m-Y', strtotime($klant->contr_geldig_vanaf)) : '',  array('id' => 'contr_geldig_vanaf', 'class' => 'form-control date-picker', 'data-date-viewmode'=>'years', 'data-date-format'=>'dd-mm-yyyy')) }}
														<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
													</div>
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-3 control-label">
													Contract geldig tot
												</label>
												<div class="col-sm-9">
																<div class="input-group">
														{{ Form::text('contr_geldig_tot', (isset($klant->contr_geldig_tot)) ? date('d-m-Y', strtotime($klant->contr_geldig_tot)) : '',  array('id' => 'contr_geldig_tot', 'class' => 'form-control date-picker', 'data-date-viewmode'=>'years', 'data-date-format'=>'dd-mm-yyyy')) }}
														<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
													</div>
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-3 control-label">
													Netto winst verdeling
												</label>
												<div class="col-sm-9">
													<select name="nettowinst_verdeling">
														@if( isset($klant->nettowinst_verdeling) )
															<option value="{{ $klant->nettowinst_verdeling }}">{{ $klant->nettowinst_verdeling }}</option>
																				@for ($i = 1; $i <= 100; $i++)
															<option value="{{ $i }}">{{ $i }}%</option>
															@endfor
														@else
															@for ($i = 1; $i <= 100; $i++)
															<option value="{{ $i }}">{{ $i }}%</option>
															@endfor
														@endif
													</select>
												in %. (het percentage wat u hier invoert is voor het bedrijf)
													
													
													
													
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-3 control-label">
													Afreken frequentie
												</label>
												<div class="col-sm-9">
													<select name="afr_freq">
														@if( isset($klant->afr_freq) )
															<option value="{{ $klant->afr_freq }}">{{ $klant->afr_freq }}</option>
																				@for ($i = 1; $i <= 52; $i++)
															<option value="{{ $i }}">{{ $i }}</option>
															@endfor
														@else
															@for ($i = 1; $i <= 52; $i++)
															<option value="{{ $i }}">{{ $i }}</option>
															@endfor
														@endif
													</select>
													in weken
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-3 control-label">
													Datum laatste verrekening
												</label>
												<div class="col-sm-9">
								                    <div class="input-group">

                                                    @if(date('Y-m-d') <= date('Y-m-d',strtotime($klant->datum_laatste_verr.' + '.$klant->afr_freq * 7 .' days')))
                                                    {{ Form::text('datum_laatste_verr', (isset($klant->datum_laatste_verr)) ? date('d-m-Y', strtotime($klant->datum_laatste_verr)) : '',  array('id' => 'datum_laatste_verr', 'class' => 'form-control date-picker', 'data-date-viewmode'=>'years', 'data-date-format'=>'dd-mm-yyyy', 'readonly')) }}
                                                    @else
                                                    {{ Form::text('datum_laatste_verr', (isset($klant->datum_laatste_verr)) ? date('d-m-Y', strtotime($klant->datum_laatste_verr)) : '',  array('id' => 'datum_laatste_verr', 'class' => 'form-control date-picker', 'data-date-viewmode'=>'years', 'data-date-format'=>'dd-mm-yyyy')) }}
                                                    @endif

                                                    <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                                                    </div>
												</div>
											</div>	
											
	</div>
</div>
</div>

</div>	



<div class="row">
	<div class="col-sm-2">
		{{ Form::submit('Klant opslaan', array('class' => 'btn btn-primary form-control')) }}
	</div>
</div>
{{ Form::close() }}

<hr />
<div class="row">
	<div class="col-md-6">
			@if(isset($klant->id))
<div class="panel panel-white">
	<div class="panel-heading border-light">
		<h4 class="panel-title">Machines</h4>
	</div>
	<div class="panel-body">
		<p>
											<a href="/admin/machines/save/{{ $klant->id }}" class="btn btn-green"><i class="glyphicon glyphicon-plus"></i> Nieuw</a>
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
														<a data-original-title="Bekijk" data-placement="top" class="btn btn-xs btn-blue tooltips" href="/admin/machines/save/{{ $klant->id }}/{{$machine->id}}"><i class="fa fa-edit"></i> Bewerken</a>
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
	</div>

</div>
	@endif
</div>
</div>

   
@stop