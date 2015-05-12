<?php

class MachinesController extends BaseController {

	/* Get functions */
	public function getAdminList()
	{
		$machines = Machine::all();
        $machinetypes = MachineType::lists('type','id');
		$klanten = Klant::lists('bedrijf', 'id');
        $klantenid = Klant::lists('id', 'id');
		return View::make('admin.machines.list')
            ->with('machines', $machines)
            ->with('klanten', $klanten)
            ->with('klantenid', $klantenid)
            ->with('machinetypes', $machinetypes);
	}
	
	public function getSave($machine_id = null)
	{
		$machine_types = MachineType::all();
        $klanten = Klant::get();
        $klantenlijst = Klant::lists('bedrijf', 'id');

		if(isset($machine_id)){
			$machine = Machine::find($machine_id);
			$current_machinetype = MachineType::find($machine->machine_type);
		
			return View::make('admin.machines.edit')->with('machine', $machine)->with('machine_types', $machine_types)->with('current_machinetype', $current_machinetype)->with('klanten', $klanten)->with('klantenlijst', $klantenlijst);
		}

	}
	
	public function getAdminView($machine_id)
	{
		$machine = Machine::find($machine_id);
		$standen = Stand::where('m_id', '=', $machine->id)->get();
		return View::make('admin.machines.view')->with('machine', $machine)->with('standen', $standen);
	}
	
	public function getNew($klant_id = null) {

		$machine_types = MachineType::all();
        $klanten = Klant::get();
        if(isset($klant_id)){
            return View::make('admin.machines.new')
                ->with('machine_types', $machine_types)
                ->with('klanten', $klanten)
                ->with('klant_id', $klant_id);
        }
       return View::make('admin.machines.new')->with('machine_types', $machine_types)->with('klanten', $klanten);
    }
	
	/* Do functions */
	public function doSave($machine_id = null, $klant_id = null) {

		if(isset($machine_id)){
            $machine = Machine::find($machine_id);
        }else {
            $machine = new Machine();
        }
        $klant_id = Input::get('klant_id');
        if(isset($klant_id)){
            $machine->klant_id = $klant_id;
        }

        $machine->machine_type = Input::get('machine_type');
        $machine->machinenr = Input::get('machinenr');
        $machine->type_nummer = Input::get('type_nummer');
		$machine->locatie = Input::get('locatie');
        $machine->created_at = date('Y-m-d H:i:s');
		
		if(isset($machine_id)){
        	$machine->updated_at = date('Y-m-d H:i:s');
		}

        if($machine->save() == true) {
            return Redirect::to('/admin/machines/list')
                ->with('status', 'Machine opgeslagen');
        }else{
            return Redirect::back()
                ->withInput()
                ->withErrors($machine->errors());
		}
    }
	
	public function doEdit($machine_id) {
        $rules = array(
            'machine_type'   => 'required',
            'machinenr'   => 'required',
            'type_nummer'   => 'required',
            'nummer'   => 'required',
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
            $machine->type_nummer = Input::get('type_nummer');
			$machine->locatie = Input::get('locatie');
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
