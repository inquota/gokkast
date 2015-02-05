<?php

class MachineTypesController extends BaseController {

	/* Get functions */
	public function getList()
	{
		$machinetypes = MachineType::all();
		
		return View::make('admin.machinetypes.list')->with('machinetypes', $machinetypes);
	}
	
	public function getSave($machine_id = null)
	{

		if(isset($machine_id)){
			$machine = MachineType::find($machine_id);

			return View::make('admin.machinetypes.edit')
                ->with('machine', $machine);
		}
		return View::make('admin.machinetypes.edit');
	}
	
	/* Do functions */
	public function doSave($machine_id = null) {
		
		if(isset($machine_id)){
            $machine = MachineType::find($machine_id);
        }else {
            $machine = new MachineType();
        }

        $machine->type = Input::get('mtype');

        if($machine->updateUniques() == true) {
            return Redirect::to('/admin/machinetypes/list/')
                ->with('status', 'Machinetype opgeslagen');
        }else{
            return Redirect::back()
                ->withInput()
                ->withErrors($machine->errors());
		}
    }

    public function getDelete($machineid = null) {

        if(!isset($machineid)){
            return Redirect::back()
                ->withInput();
        }

        $machinetype = MachineType::find($machineid);
        $machinetype->delete();

        return Redirect::to('/admin/machinetypes/list')
            ->with('status', 'Machinetype verwijderd');

    }
}
