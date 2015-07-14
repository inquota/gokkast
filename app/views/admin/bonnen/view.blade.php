@extends('layouts.master')

@stop

@section('content')
@if(isset($klant->id))
{{ Form::open(array('class'=>'form-horizontal','role'=>'form','url' => '/admin/bonnen/update/'.$bon_id . '/'. $klant->id )) }}
@endif
<div class="row">

<div class="col-md-7">
<div class="panel panel-white">
			<div class="panel-heading border-light">
				<h4 class="panel-title">Afreken opdracht</h4>
			</div>
			<div class="panel-body">

					

					@if(count($bon) == 0)
					De klant heeft nog geen Machines.
					@else
					@foreach($bon as $machine)

					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-white">
								<div class="panel-heading border-light">
									<h4 class="panel-title"><strong>{{ (isset($machine->machine->type_nummer)) ? $machine->machine->type_nummer: 'Machine onbekend' }}</strong><label class="label label-inverse">{{ (isset($machine->machine->nummer)) ? $machine->machine->nummer : 'Machine onbekend' }}</label> {{ (isset($machine->machine->machinenr)) ? $machine->machine->machinenr : 'Machine onbekend' }}</h4>
								</div>
								<div class="panel-body">
									
									<table class="table table-hover">
											<tbody>
												
												<tr>
													<td>Nieuw in:</td>
													<td class="hidden-xs">&euro; {{ number_format( $machine->nieuw_in, 2, ',', '.' ) }}</td>
												</tr>
												
												<tr>
													
													<td>{{ date('d-m-Y', strtotime(Stand::where('m_id', '=', $machine->machine_id)->firstOrFail()->created_at)) }}</td>
													<td class="hidden-xs">&euro; {{ number_format( Stand::where('m_id', '=', $machine->machine_id)->firstOrFail()->e_stand, 2, ',', '.' ) }}</td>
												</tr>
												
												<tr>
													<td style="border-bottom: 1px solid #000;">Tikken in (x 0.1):</td>
													<td class="hidden-xs" style="border-bottom: 1px solid #000;">
														
														&euro;											
														<?php
														 $in = ( ($machine->nieuw_in - Stand::where('m_id', '=', $machine->machine_id)->firstOrFail()->e_stand) * 0.1 );
														$totaal_in= number_format( $in, 2, ',', '.' );
														echo $totaal_in;	
														?> 
													</td>
												</tr>
												
											</tbody>
										</table>						
							
							
										<table class="table table-hover" style="margin-top: 20px;">
											<tbody>
												
												<tr>
													<td>Nieuw uit:</td>
													<td class="hidden-xs">&euro; {{ number_format( $machine->nieuw_uit, 2, ',', '.' ) }}</td>
												</tr>
												
												<tr>
													<td></td>
													<td class="hidden-xs">&euro; {{ number_format( $machine->tikken_uit, 2, ',', '.' ) }}</td>
												</tr>
												
												<tr>
													<td style="border-bottom: 1px solid #000;">Tikken uit (x 0.1):</td>
													<td class="hidden-xs" style="border-bottom: 1px solid #000;">
														
														&euro;											
																	<?php
					
											$uit = ( ($machine->nieuw_uit - $machine->tikken_uit) * 0.1 );
											$totaal_uit= number_format( $uit, 2, ',', '.' );
											echo $totaal_uit;	
											?> 
													</td>
												</tr>
																			<tr>
													<td>Over</td>
													<td class="hidden-xs">
														
														&euro;	{{ number_format( ($in - $uit), 2, ',', '.' ) }}
										
													</td>
												</tr>
												
											</tbody>
										</table>
							
					
											<?php
										$subtotals[] = ($in - $uit);
										?>
									

							
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
				
			<table class="table table-hover">
				<tbody>
					<tr>
						<td>Sub totaal</td>
						<td class="hidden-xs"><?php $totaal_subs = array_sum($subtotals); ?>
						&euro; {{ number_format( array_sum($subtotals) , 2, ',', '.' )}}</td>
					</tr>
					<tr>
						<td>29% kansspelbelasting</td>
						<td>&euro; {{ number_format( (array_sum($subtotals) / 100 * 29) , 2, ',', '.' )}}</td>
					</tr>
					<tr>
						<td>Delen</td>
						<td>						<?php
						$delen = (array_sum($subtotals) - ($totaal_subs / 100 * 29) );
						?>
						&euro; {{ number_format( $delen , 2, ',', '.' )}}</td>
					</tr>
					<tr>
						<td>{{ (isset($klant->bedrijf)) ? $klant->bedrijf : 'Klant onbekend' }}</td>
						<td>
						@if(isset($klant->nettowinst_verdeling))
						<?php
						$nettowinst_verdeling = ( ( array_sum($subtotals) - ($totaal_subs / 100 * 29)  ) / 100 * $klant->nettowinst_verdeling ); 
						?>
						&euro; 
						{{ number_format( $nettowinst_verdeling , 2, ',', '.' ) }}
						@else
						Verdeling onbekend ivm ontbreken klant
						@endif
						</td>
					</tr>
					<tr>
						<td>Exploitant</td>
						<td>@if(isset($klant->nettowinst_verdeling))
						&euro; {{ number_format( ( $delen - $nettowinst_verdeling ) , 2, ',', '.' )  }}
						@else
                        Verdeling onbekend ivm ontbreken klant
						@endif</td>
					</tr>
				</tbody>
			</table>
				
				<div class="form-group">
					<?php
                        $statusTypes = array('nieuw' => 'Nieuw', 'approved' => 'Goedgekeurd', 'paid' => 'Betaald', 'rejected' => 'Afgekeurd');
                    ?>
                    <select class="form-control" name="status">
                    @foreach($statusTypes as $key => $stype)
                    <option value="{{ $key }}">{{ $stype }}</option>
                    @endforeach
                    </select>
					
				<input type="submit" value="Opslaan" class="btn btn-primary form-control">
				@if(isset($klant->id))
				<br /><br /><a target="_blank" href="/admin/bonnen/pdfgen/{{ $bon_id }}/{{ $klant->id }}" class="btn btn-primary form-control">PDF</a>
				@else
				Pdf niet beschikbaar ivm ontbreken klant
				@endif
			</div>

			</div>
			
		</div>
	</div>
		
			
</div>
{{ Form::close() }}		
					
@stop