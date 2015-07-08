<?php

class BonnenController extends BaseController {

	/* Get functions */
	public function getAdminList()
	{
        $klanten = Klant::lists('bedrijf', 'id');
        $machines = Machine::lists('machinenr', 'id');
		$bonnen = Bon::groupBy('bon_id')->get();
		
		return View::make('admin.bonnen.list')->with('bonnen', $bonnen)->with('klanten', $klanten)->with('machines', $machines);
	}
	
	public function getAdminEdit($machine_id)
	{
		$machine = Machine::find($machine_id);
        $machine_types = MachineType::get();
        $klantenlijst = Klant::lists('bedrijf', 'id');
        $klanten = Klant::get();
		
		return View::make('admin.bonnen.edit')->with('machine', $machine)->with('machine_types',$machine_types)->with('klantenlijst', $klantenlijst)->with('klanten', $klanten);
	}
	
	public function getAdminView($bon_id=null,$klant_id=null)
	{
		$bon = Bon::where('bon_id','=',$bon_id)->get();

        try {
            $klant = Klant::where('id', '=', $klant_id)->firstOrFail();
        }catch(Exception $e){
            $klant = null;
        }
		
       return View::make('admin.bonnen.view')
       		->with('klant', $klant)
			->with('bon', $bon)
			->with('bon_id', $bon_id);
	}

    public function getRemove($bon_id)
    {
        $bon = Bon::find($bon_id);

        $bon->delete();

        return Redirect::back()
            ->with('status', 'Bon verwijderd.');
    }

    public function getAdminPDF($bon_id=null,$klant_id=null)
    {
        $bon = Bon::where('bon_id','=',$bon_id)->get();
        $klant = Klant::where('id','=',$klant_id)->firstOrFail();

        return View::make('admin.bonnen.pdf')
            ->with('klant', $klant)
            ->with('bon', $bon)
            ->with('bon_id', $bon_id);
    }

    public function getAdminPDFgen(){
        PDF::url('http://bellamypark.nl/admin/bonnen/pdf/1/1'); // Pdf from url
    }


    public function getNew($klant_id) {
			
		$klant = Klant::find($klant_id);
		$machines = Machine::where('klant_id', '=', $klant->id)->get();
		
       return View::make('admin.bonnen.new')
       		->with('klant', $klant)
			->with('machines', $machines);
    }
	
	
	public function doSave($klant_id = null){
			
		$machines 			= 	Machine::where('klant_id', '=', $klant_id)->get();
		$klant 				= 	Klant::find($klant_id);
	
		// POST data
		$array_machine_id	=	Input::get('machne_id');
		$array_nieuw_in 	= 	Input::get('nieuw_in');
		$array_nieuw_uit 	= 	Input::get('nieuw_uit');
		$array_tikken_uit 	= 	Input::get('tikken_uit');
		$array_tikken_in 	= 	Input::get('tikken_in');
		$array_tikken_in_result 	= 	Input::get('tikken_in_result');
		$array_tikken_uit_result 	= 	Input::get('tikken_uit_result');
		
		$array_stand_date 			= 	Input::get('stand_date');
		$array_stand_eind 			= 	Input::get('stand_eind');
		
		foreach( $machines as $key => $machine ){
			
			$time 				= 	time();
			$bon				= 	new Bon();
            $bon->klant_id 		= 	$klant_id;
            $bon->bon_id 		= 	$time;
			$bon->machine_id 	= 	$machine->id;	
			$bon->nieuw_in 		= 	$array_nieuw_in[$key];
			$bon->stand_date 	= 	$array_stand_date[$key];
			$bon->stand_eind 	= 	$array_stand_eind[$key];
			$bon->nieuw_uit 	= 	$array_nieuw_uit[$key];
			$bon->tikken_uit 	= 	$array_tikken_uit[$key];
			$bon->in1 			= 	$array_tikken_in_result[$key];
			$bon->uit 			= 	$array_tikken_uit_result[$key]; 
			$bon->created_at	= 	date('Y-m-d H:i:s');
			
        	$bon->save();
		}
		

			// Save all totals in another table, so we can easily use this data to sum.
			$latest_bon = Bon::orderBy('bon_id', 'desc')->skip(0)->take(1)->first();
			
			$bonTotal = new BonTotal();
			$bonTotal->klant_id = $klant_id; 
			$bonTotal->bon_id = $latest_bon->bon_id;
			$bonTotal->subtotal = Input::get('subtotal');
			$bonTotal->with_tax = Input::get('tax');
			
			$bonTotal->share = Input::get('share');
			
			$nettowinst_verdeling = Input::get('net_profit');
			$bonTotal->net_profit = $nettowinst_verdeling;
			
			$delen = Input::get('share');
			$bonTotal->operator = ( $delen - $nettowinst_verdeling );
			$bonTotal->save();
			
        	return Redirect::back();    
	
	}
	
	
	
	/* Do functions */
	public function doSaveTemp($klant_id) {
		$machines = Machine::where('klant_id', '=', $klant_id)->get();
		$klant = Klant::find($klant_id);
		
		if(Input::get('calculate'))
		{
			Session::put('calculate', true );
			
			foreach( $machines as $machine ){
				
				$nieuw_in=Input::get('nieuw_in'.$machine->id);
				
				$nieuw_uit=Input::get('nieuw_uit'.$machine->id);
				
				$tikken_uit=Input::get('tikken_uit'.$machine->id);
				
				$stand = Stand::where('m_id', '=', $machine->id)->firstOrFail();
				
				Session::put('nieuw_in'.$machine->id, $nieuw_in );
				Session::put('nieuw_uit'.$machine->id, $nieuw_uit );
				Session::put('tikken_uit'.$machine->id, $tikken_uit );
				
				Session::put('in'.$machine->id, ( ($nieuw_in-$stand->e_stand) * 0.1));
				Session::put('uit'.$machine->id, ( ($nieuw_uit-$tikken_uit) * 0.1));
			}
		}
		
		if(Input::get('save')){
			
			foreach( $machines as $machine ){
				$time = time();
				$bon = new Bon();
	            $bon->klant_id = $klant_id;
	            $bon->bon_id = $time;
				$bon->machine_id = $machine->id;	
				$bon->nieuw_in 		= 	Session::get('nieuw_in'.$machine->id);
				$bon->nieuw_uit 	= 	Session::get('nieuw_uit'.$machine->id );
				$bon->tikken_uit 	= 	Session::get('tikken_uit'.$machine->id);
				$bon->in1 			= 	Session::get('in'.$machine->id);
				// @todo: //Session::get('uit'.$machine->id) produces error
				$bon->uit 		= 	1605; 
				$bon->created_at = date('Y-m-d H:i:s');
            	$bon->save();
				
				$in = Session::get('in'.$machine->id);
				$uit = 1605;
				$subtotals[] = ($in - $uit);
			}
			$totaal_subs = array_sum($subtotals);
			
			// Save all totals in another table, so we can easily use this data to sum.
			$latest_bon = Bon::orderBy('bon_id', 'desc')->skip(0)->take(1)->first();
			
			$bonTotal = new BonTotal();
			$bonTotal->klant_id = $klant_id; 
			$bonTotal->bon_id = $latest_bon->id;
			$bonTotal->subtotal = array_sum($subtotals);
			$bonTotal->with_tax = (array_sum($subtotals) / 100 * 29);
			
			$bonTotal->share = ($totaal_subs - ($totaal_subs / 100 * 29) );
			
			$nettowinst_verdeling = ( ( $totaal_subs - ($totaal_subs / 100 * 29)  ) / 100 * $klant->nettowinst_verdeling );
			$bonTotal->net_profit = $nettowinst_verdeling;
			
			$delen = ($totaal_subs - ($totaal_subs / 100 * 29) );
			$bonTotal->operator = ( $delen - $nettowinst_verdeling );
			$bonTotal->save();
			
        	return Redirect::back();    
		}
		
		return Redirect::back();
	}
	

	public function doUpdate($bon_id = null, $klant_id = null) {
		
		if($bon_id==null&&$klant_id==null){
			return Redirect::back();
		}
		
		

        try{
			$klant = Klant::where('id', '=', $klant_id)->firstOrFail();
			
            /**
             * Update Bon
             */

            $bonnen = Bon::where('bon_id', '=', $bon_id)->get();
			$bon_single = Bon::where('bon_id', '=', $bon_id)->firstOrFail();
			
			foreach($bonnen as $bon){
				$bon = Bon::where('id', '=', $bon->id)->firstOrFail();
				$bon->status = 'approved';
            	$bon->save();
			}


			// create PDF
			
			
			//  send E-mail to Klant
			$addTo = $klant->email;
			$bon_id = $bon_single->bon_id;
			
			$body = 'Beste ' . $klant->naam . "\n";
			$body .= 'Bij deze sturen wij u de afreken bon '. "\n\n";
			$body .= 'Met vriendelijke groet, '. "\n";
			$body .= 'Gokkasten CRM'. "\n";
			
			$attachment = null;
			$data = array();
			/*Mail::send('emails.default', $data, function($message) use ($body, $addTo, $bon_id, $attachment) {
					$message -> data = $body;
					$message -> from('noreply@codekiller.nl', 'Gokkast CRM');
					$message -> subject('Afreken opdracht #' . $bon_id);
					$message -> to($addTo);
			});*/	
       

            return Redirect::to('/admin/bonnen/list')
                ->with('status', 'Bon goedgekeurd, er is een e-mail gestuurd naar ');
        }
        catch(Exception $e){
            $validator = 'Bij het opslaan is er iets misgegaan.';
            return Redirect::back()
                ->withErrors($validator);
        }
    }
}
