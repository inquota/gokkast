@extends('layouts.pdf')

@section('content')

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
					@if(count($bon) == 0)
					De klant heeft nog geen Machines.
					@else
					@foreach($bon as $machine)

					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-white">
								<div class="panel-heading border-light">
									<h4 class="panel-title"><strong>{{ $machine->machine->type_nummer }}</strong><label class="label label-inverse">{{ $machine->machine->nummer }}</label> {{ $machine->machine->machinenr }}</h4>
								</div>
								<div class="panel-body">

									<table class="table table-hover">
											<tbody>

												<tr>
													<td>Nieuw in:</td>
													<td >&euro; {{ number_format( $machine->nieuw_in, 2, ',', '.' ) }}</td>
												</tr>

												<tr>

													<td>{{ date('d-m-Y', strtotime(Stand::where('m_id', '=', $machine->machine_id)->firstOrFail()->created_at)) }}</td>
													<td >&euro; {{ number_format( Stand::where('m_id', '=', $machine->machine_id)->firstOrFail()->e_stand, 2, ',', '.' ) }}</td>
												</tr>

												<tr>
													<td style="border-bottom: 1px solid #000;">Tikken in (x 0.1):</td>
													<td  style="border-bottom: 1px solid #000;">

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
													<td >&euro; {{ number_format( $machine->nieuw_uit, 2, ',', '.' ) }}</td>
												</tr>

												<tr>
													<td></td>
													<td >&euro; {{ number_format( $machine->tikken_uit, 2, ',', '.' ) }}</td>
												</tr>

												<tr>
													<td style="border-bottom: 1px solid #000;">Tikken uit (x 0.1):</td>
													<td  style="border-bottom: 1px solid #000;">

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
													<td >

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


		<div class="panel panel-white">
			<div class="panel-heading border-light">
				<h4 class="panel-title">Afreken opdracht</h4>
			</div>
			<div class="panel-body">

			<table class="table table-hover">
				<tbody>
					<tr>
						<td>Sub totaal</td>
						<td ><?php $totaal_subs = array_sum($subtotals); ?>
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
						<td>{{ $klant->bedrijf }}</td>
						<td><?php
						$nettowinst_verdeling = ( ( array_sum($subtotals) - ($totaal_subs / 100 * 29)  ) / 100 * $klant->nettowinst_verdeling );
						?>
						&euro;
						{{ number_format( $nettowinst_verdeling , 2, ',', '.' ) }}</td>
					</tr>
					<tr>
						<td>Exploitant</td>
						<td>&euro; {{ number_format( ( $delen - $nettowinst_verdeling ) , 2, ',', '.' )  }}</td>
					</tr>
				</tbody>
			</table>

				<div class="form-group">
			</div>

			</div>

		</div>

@stop