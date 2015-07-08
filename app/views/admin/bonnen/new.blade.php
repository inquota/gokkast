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
											{{ Form::number('nieuw_in[]', Input::old('nieuw_in'),  array('id' => 'nieuw_in' . $machine->id, 'class' => 'form-control inputField')) }}
										</div>
									</div>
									
									<div class="form-group">
										<label for="form-field-1" class="col-sm-4 control-label"> {{ date('d-m-Y', strtotime(Stand::where('m_id', '=', $machine->id)->firstOrFail()->created_at)) }} </label>
										<div class="col-sm-8">
											&euro; {{ number_format( Stand::where('m_id', '=', $machine->id)->firstOrFail()->e_stand, 2, ',', '.' ) }}
											x 0,1 = 
											&euro;
											<input type="hidden" class="tikken_in_old" id="tikken_in_old<?php echo $machine->id ?>" value="{{ Stand::where('m_id', '=', $machine->id)->firstOrFail()->e_stand }}" />
											<span class="tikken_in" id="tikken_in_span<?php echo $machine->id ?>"></span> 
											<input type="hidden" name="tikken_in_result[]" class="tikken_in_clean" id="tikken_in_clean_hidden<?php echo $machine->id ?>" value="" />
											
											<input type="hidden" name="stand_date[]" value="{{ Stand::where('m_id', '=', $machine->id)->firstOrFail()->created_at }}" />
											<input type="hidden" name="stand_eind[]" value="{{ Stand::where('m_id', '=', $machine->id)->firstOrFail()->e_stand }}" />
										</div>

									</div>
									
									<hr />
									

								<div class="form-group">
										<label for="form-field-1" class="col-sm-4 control-label"> Nieuw uit: </label>
										<div class="col-sm-5">
											{{ Form::number('nieuw_uit[]', Input::old('nieuw_uit'),  array('id' => 'nieuw_uit'.$machine->id, 'class' => 'form-control nieuw_uit')) }}
										</div>
									</div>
									
									<div class="form-group">
										<label for="form-field-1" class="col-sm-4 control-label"> Tikken uit: </label>
										<div class="col-sm-5">
											{{ Form::number('tikken_uit[]', Input::old('tikken_uit'),  array('id' => 'tikken_uit' . $machine->id, 'class' => 'form-control inputNieuwUit tikken_uit')) }}
										</div>
									</div>
								
																<div class="form-group">
										<label for="form-field-1" class="col-sm-4 control-label">  </label>
										<div class="col-sm-5">
										x 0,1 = 
											&euro;
											<span class="tikken_uit_result" id="tikken_uit_result<?php echo $machine->id ?>"></span>
											<input type="hidden" class="tikken_uit_result" name="tikken_uit_result[]" id="tikken_uit_result_hidden<?php echo $machine->id ?>" value="" /> 
										</div>
									</div>	
									<hr />
									
									<div class="col-sm-12 right">
										<span class="verschil_in_uit" id="verschil_in_uit_span_<?php echo $machine->id ?>"></span> 
										<input class="verschil_in_uit" id="verschil_in_uit_hidden_<?php echo $machine->id ?>" type="hidden" value="" />
									</div>
							
								</div>
							</div>
						</div>
					</div>
					
					{{ Form::hidden('machne_id[]', $machine->id) }}
					
					@endforeach
					
					
					
									<script>
					
								jQuery(document).ready(function() {
				
				function number_format(number, decimals, dec_point, thousands_sep) {
  //  discuss at: http://phpjs.org/functions/number_format/
  // original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: davook
  // improved by: Brett Zamir (http://brett-zamir.me)
  // improved by: Brett Zamir (http://brett-zamir.me)
  // improved by: Theriault
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // bugfixed by: Michael White (http://getsprink.com)
  // bugfixed by: Benjamin Lupton
  // bugfixed by: Allan Jensen (http://www.winternet.no)
  // bugfixed by: Howard Yeend
  // bugfixed by: Diogo Resende
  // bugfixed by: Rival
  // bugfixed by: Brett Zamir (http://brett-zamir.me)
  //  revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
  //  revised by: Luke Smith (http://lucassmith.name)
  //    input by: Kheang Hok Chin (http://www.distantia.ca/)
  //    input by: Jay Klehr
  //    input by: Amir Habibi (http://www.residence-mixte.com/)
  //    input by: Amirouche
  //   example 1: number_format(1234.56);
  //   returns 1: '1,235'
  //   example 2: number_format(1234.56, 2, ',', ' ');
  //   returns 2: '1 234,56'
  //   example 3: number_format(1234.5678, 2, '.', '');
  //   returns 3: '1234.57'
  //   example 4: number_format(67, 2, ',', '.');
  //   returns 4: '67,00'
  //   example 5: number_format(1000);
  //   returns 5: '1,000'
  //   example 6: number_format(67.311, 2);
  //   returns 6: '67.31'
  //   example 7: number_format(1000.55, 1);
  //   returns 7: '1,000.6'
  //   example 8: number_format(67000, 5, ',', '.');
  //   returns 8: '67.000,00000'
  //   example 9: number_format(0.9, 0);
  //   returns 9: '1'
  //  example 10: number_format('1.20', 2);
  //  returns 10: '1.20'
  //  example 11: number_format('1.20', 4);
  //  returns 11: '1.2000'
  //  example 12: number_format('1.2000', 3);
  //  returns 12: '1.200'
  //  example 13: number_format('1 000,50', 2, '.', ' ');
  //  returns 13: '100 050.00'
  //  example 14: number_format(1e-8, 8, '.', '');
  //  returns 14: '0.00000001'

  number = (number + '')
    .replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + (Math.round(n * k) / k)
        .toFixed(prec);
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
    .split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '')
    .length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1)
      .join('0');
  }
  return s.join(dec);
}

							
			    jQuery(".inputField").focusout(function(event){
			    	
			    	var id = this.id;
			    	var replaced_id = id.replace('nieuw_in', '');
			    	
			    	var tikken_in_old = jQuery('#tikken_in_old'+replaced_id).val();
			    	var tikken_in_result = ((this.value - tikken_in_old) * 0.1);

			    
			    	jQuery('#tikken_in_span'+replaced_id).html(number_format(tikken_in_result, 2, ',', '.'));
			    	jQuery('#tikken_in_clean_hidden'+replaced_id).val(parseFloat(tikken_in_result.toFixed(2)));
				});
			
			    jQuery(".inputNieuwUit").focusout(function(event){
			    	
					var id = this.id;
		
			    	var replaced_id = id.replace('#verschil_in_uit_span_tikken_uit', '');
			    	var replaced_id2 = replaced_id.replace('tikken_uit', '');
			    	
			    	var nieuw_uit = jQuery('#nieuw_uit'+replaced_id2).val();
			    	var tikken_uit = jQuery('#tikken_uit'+replaced_id2).val();
			    	var tikken_uit_result = ((nieuw_uit - tikken_uit) * 0.1);

			    	jQuery('#tikken_uit_result'+replaced_id2).html(number_format(tikken_uit_result, 2, ',', '.'));
			    	jQuery('#tikken_uit_result_hidden'+replaced_id2).val(tikken_uit_result);
			    	
			    	var verschil_in_uit = (jQuery('#tikken_in_clean_hidden'+replaced_id2).val() - jQuery('#tikken_uit_result_hidden'+replaced_id2).val());
			    	
			    	jQuery('#verschil_in_uit_span_'+replaced_id2).html('&euro; ' + number_format(verschil_in_uit, 2, ',', '.'));
			    	jQuery('#verschil_in_uit_hidden_'+replaced_id2).val(verschil_in_uit);
			});

		jQuery('#calc').click(function(){
			
			var subtotal = 0;
			$('.verschil_in_uit').each(function() {
		        subtotal += Number($(this).val());
		    });
		    
		    // subtotaal
		    jQuery('span.subtotal').html('&euro; ' + number_format(subtotal, 2, ',', '.'));
			jQuery('input.subtotal').val(subtotal);
			
			// kansspelbelasting
			var tax = (subtotal / 100 * 29);
			jQuery('span.tax').html('&euro; ' + number_format(tax, 2, ',', '.'));
			jQuery('input.tax').val(tax);
			
			// delen
			var share = (subtotal - (subtotal) / 100 * 29);
			jQuery('span.share').html('&euro; ' + number_format(share, 2, ',', '.'));
			jQuery('input.share').val(share);
			
			// netto winst verdeling
			var net_profit = ( (subtotal - (subtotal / 100 * 29 ) ) / 100 *  {{ $klant->nettowinst_verdeling }});
			jQuery('span.net_profit').html('&euro; ' + number_format(net_profit, 2, ',', '.'));
			jQuery('input.net_profit').val(net_profit);
			
			// exploitant
			var exploitant = ( share - net_profit);
			jQuery('span.exploitant').html('&euro; ' + number_format(exploitant, 2, ',', '.'));
			jQuery('input.exploitant').val(exploitant);
			
			if(subtotal > 0 && tax > 0 && share > 0 && net_profit > 0 && exploitant > 0){
				jQuery('#save').fadeIn('slow');
			}
			
		});
			});
		</script>

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
						<span class="subtotal"></span>
						{{ Form::hidden('subtotal', '',  array('class' => 'subtotal')) }}
					</div>
				</div>
				
								<div class="form-group">
					<label for="form-field-1" class="col-sm-5 control-label">29% kansspelbelasting </label>
					<div class="col-sm-5">
						<span class="tax"></span>
						{{ Form::hidden('tax', '',  array('class' => 'tax')) }}
					</div>
				</div>
				
								<div class="form-group">
					<label for="form-field-1" class="col-sm-5 control-label">Delen</label>
					<div class="col-sm-5">
						<span class="share"></span>
						{{ Form::hidden('share', '',  array('class' => 'share')) }}
						
					</div>
				</div>
				
				<div class="form-group">
					<label for="form-field-1" class="col-sm-5 control-label">{{ $klant->bedrijf }}</label>
					<div class="col-sm-5">
						<span class="net_profit"></span>
						{{ Form::hidden('net_profit', '',  array('class' => 'net_profit')) }}
					</div>
				</div>
				
				<div class="form-group">
					<label for="form-field-1" class="col-sm-5 control-label">Exploitant</label>
					<div class="col-sm-5">
						<span class="exploitant"></span>
						{{ Form::hidden('exploitant', '',  array('class' => 'exploitant')) }}
					</div>
				</div>
				
				<div class="form-group">
					<input type="button" value="Berekenen" id="calc" name="calculate" class="btn btn-primary form-control">
					<hr />
					<p>
						<small>Er verschijnt een knop Opslaan zodra de gegevens zijn ingevuld en je op Berekenen hebt geklikt.</small>	
					</p>
					
					<input type="submit" value="Opslaan" id="save" name="save" class="btn btn-primary form-control" style="display: none;">
					
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