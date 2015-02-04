@extends('layouts.master')

@stop

@section('content')

{{ Form::open(array('class'=>'form-horizontal','role'=>'form','url' => '/admin/machines/new/')) }}

<div class="row">

<div class="col-md-6">
<div class="panel panel-white">
			<div class="panel-heading border-light">
				<h4 class="panel-title">Afreken opdracht</h4>
			</div>
			<div class="panel-body">

					

					@if(count($machines) == 0)
					De klant heeft nog geen Machines.
					@else
					@foreach($machines as $machine)

					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-white">
								<div class="panel-heading border-light">
									<h4 class="panel-title"><strong>{{ $machine->type_nummer }}</strong><label class="label label-inverse">{{ $machine->machinenr }}</label></h4>
								</div>
								<div class="panel-body">

									<div class="form-group">
										<label for="form-field-1" class="col-sm-3 control-label"> Nieuw in: </label>
										<div class="col-sm-9">
											<?php
											$nieuw_in = 6402090;
											echo $nieuw_in;
											?>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					@endforeach

					@endif


			</div>
		</div>
		</div>
		
		
		
<div class="col-md-6">
		<div class="panel panel-white">
			<div class="panel-heading border-light">
				<h4 class="panel-title">Afreken opdracht</h4>
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label for="form-field-1" class="col-sm-3 control-label">Sub totaal </label>
					<div class="col-sm-9">
						&euro; 00000
					</div>
				</div>
				
								<div class="form-group">
					<label for="form-field-1" class="col-sm-3 control-label">29% kansspelbelasting </label>
					<div class="col-sm-9">
						&euro; 00000
					</div>
				</div>
				
								<div class="form-group">
					<label for="form-field-1" class="col-sm-3 control-label">Delen</label>
					<div class="col-sm-9">
						&euro; 00000
					</div>
				</div>

			</div>
		</div>
	</div>
		
		
		
		
		
</div>


<p>
	Uw afreken opdracht, wordt nog goedgekeurd. Bij goedkeuring wordt de afreken opdracht naar de klant opgestuurd.
</p>



			
                    {{ Form::submit('Indienen', array('class' => 'btn btn-primary form-control')) }}
    
{{ Form::close() }}						
@stop