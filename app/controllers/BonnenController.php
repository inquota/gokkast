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
	
	/**
	 * Get PDF file for Customer
	 * 
	 * @param String $secret|null
	 * @param Integer $bon_id|null
	 * @param Integer $klant_id|null
	 */
	public function getPDF($secret = null, $bon_id=null, $klant_id=null)
    {
    	try
    	{
    		$bon = Bon::where('bon_id','=',$bon_id)->get();
        	$klant = Klant::where('id','=',$klant_id)->firstOrFail();
			$bonTotal = BonTotal::where('bon_id', '=', $bon_id)->where('secret', '=', $secret)->where('klant_id', '=', $klant_id)->firstOrFail();	
    	}catch(Exception $e){
    		exit('Invalid data');
    	}
        
        return View::make('admin.bonnen.pdf')
            ->with('klant', $klant)
            ->with('bon', $bon)
            ->with('bon_id', $bon_id);
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

    public function getAdminPDFgen($bon_id = null, $klant_id = null){
        PDF::url('http://'.$_SERVER['HTTP_HOST'].'/admin/bonnen/pdf/'.$bon_id.'/'.$klant_id); // Pdf from url
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
		
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    		$secret = substr(str_shuffle($chars),0,32);

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
			$bonTotal->secret = $secret;
			$bonTotal->save();
			
        	return Redirect::back();    
	
	}
	
	/* Do functions */
	public function doUpdate($bon_id = null, $klant_id = null)
	{
		$message_extra = '';
			
		if($bon_id==null&&$klant_id==null){
			return Redirect::back();
		}
		
        try{
			$klant = Klant::where('id', '=', $klant_id)->firstOrFail();
			
			$status = Input::get('status');
					
            /**
             * Update Bon
             */

            $bonnen = Bon::where('bon_id', '=', $bon_id)->get();
			$bon_single = Bon::where('bon_id', '=', $bon_id)->firstOrFail();
			$bonTotal = BonTotal::where('bon_id', '=', $bon_id)->firstOrFail();
			$bonTotal->status =  $status;
			$bonTotal->save();
			
			foreach($bonnen as $bon){
				$bon = Bon::where('id', '=', $bon->id)->firstOrFail();
				$bon->status = $status;
            	$bon->save();
			}
			
			if($status == 'approved'){
				//  when status approved, send E-mail to Klant
				$addTo = $klant->email;
				$bon_id = $bon_single->bon_id;
				
				$body = 'Beste ' . $klant->naam . "\n";
				$body .= 'Bij deze sturen wij u de afreken bon '. "\n\n";
				$body .= 'http://'.$_SERVER['HTTP_HOST']. '/bon/pdf/'.$bonTotal->secret.'/'.$bon_id.'/'.$klant_id. "\n\n";
				$body .= 'Met vriendelijke groet, '. "\n";
				$body .= 'Gokkasten CRM'. "\n";
				
				$data = array();
				Mail::send('emails.default', $data, function($message) use ($body, $addTo, $bon_id) {
						$message -> data = $body;
						$message -> from('noreply@codekiller.nl', 'Gokkast CRM');
						$message -> subject('Afreken opdracht #' . $bon_id);
						$message -> to($addTo);
				});	
				$message_extra .= 'Er is een e-mail gestuurd naar de klant.';
			}

            return Redirect::to('/admin/bonnen/list')
                ->with('status', 'Bon opgeslagen.'.$message_extra);
        }
        catch(Exception $e){
            $validator = 'Bij het opslaan is er iets misgegaan.';
            return Redirect::back()
                ->withErrors($validator);
        }
    }

}
