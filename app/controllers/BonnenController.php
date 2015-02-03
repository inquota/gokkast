<?php

class BonnenController extends BaseController {

	/* Get functions */
	public function getAdminList()
	{
		$machines = Machine::all();
		
		return View::make('admin.machines.list')->with('machines', $machines);
	}
	
	public function getAdminEdit($machine_id)
	{
		$machine = Machine::find($machine_id);
		
		return View::make('admin.machines.edit')->with('machine', $machine);
	}
	
	public function getAdminView($machine_id)
	{
		$machine = Machine::find($machine_id);
		$standen = Stand::where('m_id', '=', $machine->id)->get();
		return View::make('admin.machines.view')->with('machine', $machine)->with('standen', $standen);
	}
	
	public function getNew($klant_id) {
			
		$klant = Klant::find($klant_id);
		$machines = Machine::where('klant_id', '=', $klant->id)->get();
		
       return View::make('admin.bonnen.new')
       		->with('klant', $klant)
			->with('machines', $machines);
    }
	
	
	
	
	
	
	
	
	
	
	/* Do functions */
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
