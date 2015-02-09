@extends('layouts.master')

@stop

@section('content')

{{ Form::open(array('class'=>'form-horizontal','role'=>'form','url' => '/admin/bonnen/new/'.$klant->id )) }}

<div class="row">

<div class="col-md-7">
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
						<div class="col-md-12">
							<div class="panel panel-white">
								<div class="panel-heading border-light">
									<h4 class="panel-title"><strong>{{ $machine->type_nummer }}</strong><label class="label label-inverse">{{ $machine->nummer }}</label> {{ $machine->machinenr }}</h4>
								</div>
								<div class="panel-body">

									<div class="form-group">
										<label for="form-field-1" class="col-sm-4 control-label"> Nieuw in: </label>
										<div class="col-sm-5">
											{{ Form::number('nieuw_in'. $machine->id , Input::old('nieuw_in'),  array('id' => 'nieuw_in', 'class' => 'form-control')) }}
										</div>
									</div>
									
									<div class="form-group">
										<label for="form-field-1" class="col-sm-4 control-label"> {{ date('d-m-Y', strtotime(Stand::where('m_id', '=', $machine->id)->firstOrFail()->created_at)) }} </label>
										<div class="col-sm-8">
											&euro; {{ number_format( Stand::where('m_id', '=', $machine->id)->firstOrFail()->e_stand, 2, ',', '.' ) }}
											x 0,1 = 
											&euro;
											<?php
											$in[$machine->id] = Session::get('in'.$machine->id);
											$totaal_in= number_format( $in[$machine->id], 2, ',', '.' );
											echo $totaal_in;	
											?> 
										</div>

									</div>
									
									<hr />
									

								<div class="form-group">
										<label for="form-field-1" class="col-sm-4 control-label"> Nieuw uit: </label>
										<div class="col-sm-5">
											{{ Form::number('nieuw_uit'. $machine->id, Input::old('nieuw_uit'),  array('id' => 'nieuw_uit', 'class' => 'form-control')) }}
										</div>
									</div>
									
									<div class="form-group">
										<label for="form-field-1" class="col-sm-4 control-label"> Tikken uit: </label>
										<div class="col-sm-5">
											{{ Form::number('tikken_uit'. $machine->id, Input::old('tikken_uit'),  array('id' => 'tikken_uit', 'class' => 'form-control')) }}
										</div>
									</div>
								
																<div class="form-group">
										<label for="form-field-1" class="col-sm-4 control-label">  </label>
										<div class="col-sm-5">
																		x 0,1 = 
											&euro;
											<?php
											$uit[$machine->id] = Session::get('uit'.$machine->id);
											$totaal_uit= number_format( $uit[$machine->id], 2, ',', '.' );
											echo $totaal_uit;	
											?> 

										</div>
									</div>	
									<hr />
									
									<div class="col-sm-12 right">
										<?php
										$subtotals[] = ($in[$machine->id] - $uit[$machine->id]);
										?>
										&euro; <?php echo number_format($in[$machine->id] - $uit[$machine->id], 2, ',', '.' ); ?>
										
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
		
		
		
<div class="col-md-4">
		<div class="panel panel-white">
			<div class="panel-heading border-light">
				<h4 class="panel-title">Afreken opdracht</h4>
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label for="form-field-1" class="col-sm-5 control-label">Sub totaal </label>
					<div class="col-sm-5">
						<?php
						$totaal_subs = 2233.2;
						?>
						&euro; {{ array_sum($subtotals) }}
					</div>
				</div>
				
								<div class="form-group">
					<label for="form-field-1" class="col-sm-5 control-label">29% kansspelbelasting </label>
					<div class="col-sm-5">
						&euro; {{ ($totaal_subs / 100 * 29) }}
					</div>
				</div>
				
								<div class="form-group">
					<label for="form-field-1" class="col-sm-5 control-label">Delen</label>
					<div class="col-sm-5">
						<?php
						$delen = (array_sum($subtotals) - ($totaal_subs / 100 * 29) );
						?>
						&euro; 
						
						{{ $delen  }}
						
						
					</div>
				</div>
				
				<div class="form-group">
					<label for="form-field-1" class="col-sm-5 control-label">{{ $klant->bedrijf }}</label>
					<div class="col-sm-5">
						<?php
						$nettowinst_verdeling = ( ( array_sum($subtotals) - ($totaal_subs / 100 * 29)  ) / 100 * $klant->nettowinst_verdeling ); 
						?>
						&euro; 
						{{ $nettowinst_verdeling  }}
					</div>
				</div>
				
				<div class="form-group">
					<label for="form-field-1" class="col-sm-5 control-label">Exploitant</label>
					<div class="col-sm-5">
						
						&euro; 
						{{ ( $delen - $nettowinst_verdeling )  }}
					</div>
				</div>
				
				<div class="form-group">
				<input type="submit" value="Berekenen" name="calculate" class="btn btn-primary form-control">
				<?php
				$calculate = Session::get('calculate');
				
				if($calculate==true) :
				?>
				of
				<input type="submit" value="Indienen" name="save" class="btn btn-primary form-control">
				<?php endif; ?>
			</div>

			</div>
			
		</div>
	</div>
		
		
		
		
		
</div>


<p>
	Uw afreken opdracht, wordt nog goedgekeurd. Bij goedkeuring wordt de afreken opdracht naar de klant opgestuurd.
</p>



			
                    
    
{{ Form::close() }}						
@stop