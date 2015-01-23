@extends('layouts.master')

@stop

@section('content')

<div class="row">
							<div class="col-sm-12">
								<!-- start: TEXT FIELDS PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title">Nieuwe klant</h4>
										    @if($errors->has())
                                            <div class="alert alert-danger">
                                                <ul>
                                            @foreach($errors->all() AS $error)
                                            <li>{{  $error }}</li>
                                            @endforeach
                                                </ul>
                                            </div>
                                            @endif
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
											<a href="#" class="btn btn-xs btn-link panel-close">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
									<div class="panel-body">
											{{ Form::open(array('class'=>'form-horizontal','role'=>'form','url' => Request::path())) }}
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
													Naam
												</label>
												<div class="col-sm-9">
													{{ Form::text('naam', (isset($klant->naam)) ? $klant->naam : '',  array('id' => 'naam', 'class' => 'form-control')) }}
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
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
													Medewerker
												</label>
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
												<label for="form-field-1" class="col-sm-2 control-label">
													Bedrag lening
												</label>
												<div class="col-sm-9">
													{{ Form::text('bedrag_lening', (isset($klant->bedrag_lening)) ? $klant->bedrag_lening : '',  array('id' => 'bedrag_lening', 'class' => 'form-control')) }}
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
													Bedrag plaatsing geld
												</label>
												<div class="col-sm-9">
													{{ Form::text('bedrag_plaatsing_geld', (isset($klant->bedrag_plaatsing_geld)) ? $klant->bedrag_plaatsing_geld : '',  array('id' => 'bedrag_plaatsing_geld', 'class' => 'form-control')) }}
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
													Geldwisselaar aanwezig
												</label>
												<div class="col-sm-9">
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
												<label for="form-field-1" class="col-sm-2 control-label">
													Vulling machines
												</label>
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
												<label for="form-field-1" class="col-sm-2 control-label">
													Bedrag vulling machines	
												</label>
												<div class="col-sm-9">
													{{ Form::text('bedrag_vulling_machines', (isset($klant->bedrag_vulling_machines)) ? $klant->bedrag_vulling_machines : '',  array('id' => 'postcode', 'bedrag_vulling_machines' => 'form-control')) }}
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
													Vulling geldwisselaar
												</label>
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
												<label for="form-field-1" class="col-sm-2 control-label">
													Bedrag vulling geldwisselaar
												</label>
												<div class="col-sm-9">
													{{ Form::text('bedrag_vulling_geldwisselaar', (isset($klant->bedrag_vulling_geldwisselaar)) ? $klant->bedrag_vulling_geldwisselaar : '',  array('id' => 'bedrag_vulling_geldwisselaar', 'class' => 'form-control')) }}
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
													Vergunning nummer
												</label>
												<div class="col-sm-9">
													{{ Form::text('vergunning_nummer', (isset($klant->vergunning_nummer)) ? $klant->vergunning_nummer : '',  array('id' => 'vergunning_nummer', 'class' => 'form-control')) }}
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
													Vergunning verleend door
												</label>
												<div class="col-sm-9">
													{{ Form::text('vergunning_verl_door', (isset($klant->vergunning_verl_door)) ? $klant->vergunning_verl_door : '',  array('id' => 'vergunning_verl_door', 'class' => 'form-control')) }}
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
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
												<label for="form-field-1" class="col-sm-2 control-label">
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
												<label for="form-field-1" class="col-sm-2 control-label">
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
												<label for="form-field-1" class="col-sm-2 control-label">
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
												<label for="form-field-1" class="col-sm-2 control-label">
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
												<label for="form-field-1" class="col-sm-2 control-label">
													Netto winst verdeling
												</label>
												<div class="col-sm-9">
													{{ Form::text('nettowinst_verdeling', (isset($klant->nettowinst_verdeling)) ? $klant->nettowinst_verdeling : '',  array('id' => 'nettowinst_verdeling', 'class' => 'form-control')) }}
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
													Afreken frequentie
												</label>
												<div class="col-sm-9">
													{{ Form::text('afr_freq', (isset($klant->afr_freq)) ? $klant->afr_freq : '',  array('id' => 'afr_freq', 'class' => 'form-control')) }}
												</div>
											</div>
											
															<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
													Datum laatste verrekening
												</label>
												<div class="col-sm-9">
								                    <div class="input-group">
                                                    {{ Form::text('datum_laatste_verr', (isset($klant->datum_laatste_verr)) ? date('d-m-Y', strtotime($klant->datum_laatste_verr)) : '',  array('id' => 'datum_laatste_verr', 'class' => 'form-control date-picker', 'data-date-viewmode'=>'years', 'data-date-format'=>'dd-mm-yyyy')) }}
                                                    <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                                                    </div>
												</div>
											</div>	
											

									</div>
									            <div class="panel-footer">
                <div class="pull-left">
                    {{ Form::submit('Opslaan', array('class' => 'btn btn-primary form-control')) }}
                </div>
            </div>
            {{ Form::close() }}
								</div>
								<!-- end: TEXT FIELDS PANEL -->
							</div>
						</div>
						
@stop