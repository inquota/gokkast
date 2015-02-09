<?php

class BonnenController extends BaseController {

	/* Get functions */
	public function getAdminList()
	{
		$bonnen = Bon::groupBy('bon_id')->get();
		
		return View::make('admin.bonnen.list')->with('bonnen', $bonnen);
	}
	
	public function getAdminEdit($machine_id)
	{
		$machine = Machine::find($machine_id);
		
		return View::make('admin.machines.edit')->with('machine', $machine);
	}
	
	public function getAdminView($bon_id=null,$klant_id=null)
	{
		$bon = Bon::where('bon_id','=',$bon_id)->get();
		$klant = Klant::where('id','=',$klant_id)->firstOrFail();
		
       return View::make('admin.bonnen.view')
       		->with('klant', $klant)
			->with('bon', $bon);
	}
	
	public function getNew($klant_id) {
			
		$klant = Klant::find($klant_id);
		$machines = Machine::where('klant_id', '=', $klant->id)->get();
		
       return View::make('admin.bonnen.new')
       		->with('klant', $klant)
			->with('machines', $machines);
    }
	
	
	
	/* Do functions */
	public function doSaveTemp($klant_id) {
		$machines = Machine::where('klant_id', '=', $klant_id)->get();
		
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
				
				$bon = new Bon();
	            $bon->klant_id = $klant_id;
	            $bon->bon_id = 2;
				$bon->machine_id = $machine->id;	
				$bon->nieuw_in 		= 	Session::get('nieuw_in'.$machine->id);
				$bon->nieuw_uit 	= 	Session::get('nieuw_uit'.$machine->id );
				$bon->tikken_uit 	= 	Session::get('tikken_uit'.$machine->id);
				$bon->in1 			= 	Session::get('in'.$machine->id);
				$bon->uit 		= 	1605; //Session::get('uit'.$machine->id) produces error
				$bon->created_at = date('Y-m-d H:i:s');
            	$bon->save();
			}
        	return Redirect::back();    
		}
		
		return Redirect::back();
	}
	
	
	
	
	public function doNew() {
        $rules = array(
            'machine_type'   => 'required',
            'machinenr'   => 'required',
            'th_nr'   => 'required',
            'tb_nr'   => 'required',
            'locatie'   => 'required',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }

        try{

            /**
             * Create new shop
             */

            $info = array(
                'machine_type'      => Input::get('machine_type'),
                'machinenr'      => Input::get('machinenr'),
                'th_nr'      => Input::get('th_nr'),
                'tb_nr'      => Input::get('tb_nr'),
                'b_stand'      => Input::get('b_stand'),
                'created_at'  => date('Y-m-d H:i:s'),
            );

            Machine::create($info);

            return Redirect::to('/admin/machines/list')
                ->with('status', 'Machine opgeslagen');
        }
        catch(Exception $e){
            $validator = 'Bij het opslaan is er iets misgegaan.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
    }
	
	public function doEdit($machine_id) {
        $rules = array(
            'machine_type'   => 'required',
            'machinenr'   => 'required',
            'th_nr'   => 'required',
            'tb_nr'   => 'required',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }

        try{

            /**
             * Update Machine
             */

            $machine = Machine::where('id', '=', $machine_id)->firstOrFail();
			
            $machine->machinenr = Input::get('machinenr');
            $machine->th_nr = Input::get('th_nr');
			$machine->tb_nr = Input::get('tb_nr');
            $machine->save();

            return Redirect::to('/admin/machines/list')
                ->with('status', 'Machine opgeslagen');
        }
        catch(Exception $e){
            $validator = 'Bij het opslaan is er iets misgegaan.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
    }
}
