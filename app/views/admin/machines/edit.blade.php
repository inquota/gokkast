@extends('layouts.master')

@stop

@section('content')
@if(isset($machine))
	<h1>Bewerk machine</h1>
@else
	<h1>Nieuwe machine</h1>
@endif

<div class="row">
							<div class="col-sm-12">
								<!-- start: TEXT FIELDS PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading">
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
											{{ Form::open(array('class'=>'form-horizontal','role'=>'form','url' =>  Request::path() )) }}
											
											<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
													Machine nummer
												</label>
												<div class="col-sm-9">
													{{ Form::text('machinenr', (isset($machine->machinenr)) ? $machine->machinenr : '',  array('id' => 'machinenr', 'class' => 'form-control')) }}
												</div>
											</div>
												<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
													Machine Types
												</label>
												<div class="col-sm-9">
													@if(count($machine_types) > 0) 
														<select name="machine_type">
														@if(isset($machine->machine_type) && (isset($current_machinetype)))
															<option value="{{ $current_machinetype->id }}">{{ $current_machinetype->type }}</option>
														@endif
														@foreach($machine_types as $machine_type)
															<option value="{{$machine_type->id}}">{{$machine_type->type}}</option>
														@endforeach
														</select>
													@else
														Er zijn nog geen Machine Types aangemaakt
													@endif
												</div>
											</div>
																						
											<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
													Type nummer
												</label>
												<div class="col-sm-9">
												
												
												<label class="radio-inline">
													@if(isset($machine->type_nummer) && $machine->type_nummer=='TH nummer')
														<input type="radio" class="square-green" value="TH nummer" checked="checked" name="type_nummer">
													@else
														<input type="radio" class="square-green" value="TH nummer" name="type_nummer">
													@endif
													TH nummer
												</label>
												
												<label class="radio-inline">
													@if(isset($machine->type_nummer) && $machine->type_nummer=='TB nummer')
														<input type="radio" class="square-green" value="TB nummer" checked="checked" name="type_nummer">
													@else
														<input type="radio" class="square-green" value="TB nummer" name="type_nummer">
													@endif
													TB nummer
												</label>
												</div>
											</div>
											
												<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
													Locatie
												</label>
												<div class="col-sm-9">
													<select name="locatie">
														@if(isset($machine->locatie))
															<option value="{{ $machine->locatie }}">{{ $machine->locatie }}</option>
														@endif
														<option value="Magazijn">Magazijn</option>
														<option value="Sloop">Sloop</option>
														<option value="Verkocht">Verkocht</option>
														<option value="Klant">Klant</option>
													</select>
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