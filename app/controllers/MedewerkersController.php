<?php

class MedewerkersController extends BaseController {

	public function getAdminList()
	{
		$machines = Medewerker::all();
		
		return View::make('admin.medewerkers.list')->with('machines', $machines);
	}
	
	public function getAdminEdit($medeweker_id)
	{
		$machine = Medewerker::find($medeweker_id);
		
		return View::make('admin.medewerkers.edit')->with('machine', $machine);
	}
	
	public function getNew() {

       return View::make('admin.medewerkers.new');
    }
	
	public function doNew() {

        try{

            /**
             * Create new shop
             */

            $info = array(
                'naam'      => Input::get('naam'),
                'nummer'      => Input::get('nummer'),
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            );

            Medewerker::create($info);

            return Redirect::to('/admin/medewerkers/list')
                ->with('status', 'Medewerker opgeslagen');
       }
        catch(Exception $e){
            $validator = 'Bij het opslaan is er iets misgegaan.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
    }
	
	public function doEdit($medeweker_id) {
        $rules = array(
            'naam'   => 'required',
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
             * Update Medewerker
             */

            $medewerker = Medewerker::where('id', '=', $medeweker_id)->firstOrFail();
			
            $medewerker->naam = Input::get('naam');
            $medewerker->nummer = Input::get('nummer');
            $medewerker->save();

            return Redirect::to('/admin/medewerkers/list')
                ->with('status', 'Medewerker opgeslagen');
        }
        catch(Exception $e){
            $validator = 'Bij het opslaan is er iets misgegaan.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
    }

}
