<?php

class MachinesController extends BaseController {

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
        $machine->updated_at = '0000-00-00 00:00:00';

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
