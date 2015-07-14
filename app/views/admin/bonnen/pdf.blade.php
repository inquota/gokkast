@extends('layouts.pdf')

@section('content')



<?php
$uri = Request::path();
$parts = explode('/',$uri);
$klant_id = $parts[4];

$klant = Klant::find($klant_id);
$machines = Machine::where('klant_id', '=', $klant->id)->get();
$bon_id = $parts[3];
$bonnen = Bon::where('klant_id', '=', $klant->id)->where('bon_id', '=', $bon_id)->get();
$bonTotal = BonTotal::where('klant_id', '=', $klant->id)->where('bon_id', '=', $bon_id)->firstOrFail();
?>

<div class="panel panel-white">
			<div class="panel-body">
<table style="float: left;">
<tr>
<td><h4 class="panel-title">Namens</h4></td><td></td>
</tr>
<tr>
<td></td><td></td>
</tr>
<tr>
<td>Gokkasten B.V.</td>
</tr>
<tr>
<td>KVK: 233299223</td>
</tr>
<tr>
<td>BTW: NL00000000</td>
</tr>
<tr>
<td>Fred Alven</td>
</tr>
<tr>
<td>Troebelweg 23</td>
</tr>
<tr>
<td>4384 EL</td>
</tr>
<tr>
<td>Vlissingen</td>
</tr>
</table>

<table style="float: right;">
<tr>
<td><h4 class="panel-title">T.A.V.</h4></td><td></td>
</tr>
<tr>
<td></td><td></td>
</tr>
<tr>
<td>Naam bedrijf:</td><td>{{ $klant->bedrijf }}</td>
</tr>
<tr>
<td>Contactpersoon:</td><td>{{ $klant->naam }}</td>
</tr>
<tr>
<td>Adres:</td><td>{{ $klant->adres }}</td>
</tr>
<tr>
<td>Postcode:</td><td>{{ $klant->postcode }}</td>
</tr>
<tr>
<td>Woonplaats:</td><td>{{ $klant->woonplaats }}</td>
</tr>
</table>
</div>
</div>


<div class="panel panel-white">
			<div class="panel-heading border-light">
				<h4 class="panel-title">Afreken opdracht</h4>
			</div>
			<div class="panel-body">
					@if(count($machines) == 0)
					De klant heeft nog geen Machines.
					@else
					@foreach($bonnen as $bon)

					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-white">
								<div class="panel-heading border-light">
									<h4 class="panel-title"><strong>{{ $bon->machine->type_nummer }}</strong><label class="label label-inverse">{{ $bon->machine->nummer }}</label> {{ $bon->machine->machinenr }}</h4>
									
									
								</div>
								<div class="panel-body">

									<table class="table table-hover">
											<tbody>

												<tr>
													<td>Nieuw in:</td>
													<td>&euro; {{ number_format( $bon->nieuw_in, 2, ',', '.' ) }}</td>
												</tr>

												<tr>

													<td>{{ date('d-m-Y', strtotime($bon->stand_date)) }}</td>
													<td>&euro; {{ number_format( $bon->stand_eind, 2, ',', '.' ) }}</td>
												</tr>

												<tr>
													<td style="border-bottom: 1px solid #000;">Tikken in (x 0.1):</td>
													<td  style="border-bottom: 1px solid #000;">
														<?php
														$in = ($bon->nieuw_in - $bon->stand_eind) * 0.1;
														?>
														&euro;
													{{ number_format( $in, 2, ',', '.' ) }}
													</td>
												</tr>

											</tbody>
										</table>


										<table class="table table-hover" style="margin-top: 20px;">
											<tbody>

												<tr>
													<td>Nieuw uit:</td>
													<td >&euro; {{ number_format( $bon->nieuw_uit, 2, ',', '.' ) }}</td>
												</tr>

												<tr>
													<td></td>
													<td >&euro; {{ number_format( $bon->tikken_uit, 2, ',', '.' ) }}</td>
												</tr>

												<tr>
													<td style="border-bottom: 1px solid #000;">Tikken uit (x 0.1):</td>
													<td  style="border-bottom: 1px solid #000;">

														&euro;
																	<?php

											$uit = ( ($bon->nieuw_uit - $bon->tikken_uit) * 0.1 );
											$totaal_uit= number_format( $uit, 2, ',', '.' );
											echo $totaal_uit;
											?>
													</td>
												</tr>
																			<tr>
													<td>Over</td>
													<td>
														&euro; {{ number_format( ($in - $uit), 2, ',', '.' ) }}
													
													</td>
												</tr>

											</tbody>
										</table>


							

								</div>
							</div>
						</div>
					</div>

					@endforeach

					@endif


			</div>
		</div>


		<div class="panel panel-white">
			<div class="panel-heading border-light">
				<h4 class="panel-title">Afreken opdracht</h4>
			</div>
<div class="panel-body">
	
	

				<div class="form-group">
					<label for="form-field-1" class="col-lg-8 control-label">Sub totaal </label>
					<div class="col-sm-2">
						<span class="subtotal"></span>
						&euro; {{ $bonTotal->subtotal }}
					</div>
				</div>
				
								<div class="form-group">
					<label for="form-field-1" class="col-lg-8 control-label">29% kansspelbelasting </label>
					<div class="col-sm-2">
						<span class="tax"></span>
						&euro; {{ $bonTotal->with_tax }}
					</div>
				</div>
				
								<div class="form-group">
					<label for="form-field-1" class="col-lg-8 control-label">Delen</label>
					<div class="col-sm-2">
						<span class="share"></span>
						&euro; {{ $bonTotal->share }}
						
					</div>
				</div>
				
				<div class="form-group">
					<label for="form-field-1" class="col-lg-8 control-label">{{ $klant->bedrijf }}</label>
					<div class="col-sm-2">
						<span class="net_profit"></span>
						&euro; {{ $bonTotal->net_profit }}
					</div>
				</div>
				
				<div class="form-group">
					<label for="form-field-1" class="col-lg-8 control-label">Exploitant</label>
					<div class="col-sm-2">
						<span class="exploitant"></span>
						&euro; {{ $bonTotal->operator }}
					</div>
				</div>
			
			</div>

		</div>

@stop