@extends('layouts.master')

@stop

@section('content')

<div class="row">
							<div class="col-sm-12">
								<!-- start: TEXT FIELDS PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title">Nieuwe medewerker</h4>
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
											{{ Form::open(array('class'=>'form-horizontal','role'=>'form','url' => '/admin/medewerkers/new/')) }}
											<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
													Naam
												</label>
												<div class="col-sm-9">
													{{ Form::text('naam', '',  array('id' => 'naam', 'class' => 'form-control')) }} 
												</div>
											</div>
											
											<div class="form-group">
												<label for="form-field-1" class="col-sm-2 control-label">
													Nummer
												</label>
												<div class="col-sm-9">
													{{ Form::text('nummer', '',  array('id' => 'nummer', 'class' => 'form-control')) }}
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