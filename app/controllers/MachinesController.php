<?php

class MachinesController extends BaseController {

	/* Get functions */
	public function getAdminList()
	{
		$machines = Machine::all();
		
		return View::make('admin.machines.list')->with('machines', $machines);
	}
	
	public function getSave($klant_id, $machine_id = null)
	{
		$machine_types = MachineType::all();
		
		if(isset($machine_id)){
			$machine = Machine::find($machine_id);
			$current_machinetype = MachineType::find($machine->machine_type);
		
			return View::make('admin.machines.edit')->with('machine', $machine)->with('machine_types', $machine_types)->with('current_machinetype', $current_machinetype);
		}
		return View::make('admin.machines.edit')->with('machine_types', $machine_types);
	}
	
	public function getAdminView($machine_id)
	{
		$machine = Machine::find($machine_id);
		$standen = Stand::where('m_id', '=', $machine->id)->get();
		return View::make('admin.machines.view')->with('machine', $machine)->with('standen', $standen);
	}
	
	public function getNew() {
		$machine_types = MachineType::all();
       return View::make('admin.machines.new')->with('machine_types', $machine_types);
    }
	
	/* Do functions */
	public function doSave($machine_id = null) {
		
		if(isset($machine_id)){
            $machine = Machine::find($machine_id)->firstOrFail();
        }else {
            $machine = new Machine();
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
            return Redirect::to('/admin/klanten/edit/'.$machine->klant_id)
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
