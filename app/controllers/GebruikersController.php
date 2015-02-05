<?php

class GebruikersController extends BaseController {

	public function getList()
	{
		$gebruikers = User::get();
        $roles = Group::lists('name', 'id');
		
		return View::make('admin.gebruikers.list')
            ->with('gebruikers', $gebruikers)
            ->with('roles', $roles);
	}

	
	public function getSave($medewerker_id = null) {

        if(isset($medewerker_id)) {
            $medewerker = Medewerker::find($medewerker_id);

            return View::make('admin.gebruikers.new')
                ->with('medewerker', $medewerker);
        }

       return View::make('admin.gebruikers.new');
    }
	
	public function doSave($medewerker_id = null) {

        try{

            /**
             * Create new medewerker
             */

            if(isset($medewerker_id)){
                $medewerker = Medewerker::find($medewerker_id)->firstOrFail();
            }else {
                $medewerker = new Medewerker();
            }

            $medewerker->naam = Input::get('naam');
            $medewerker->nummer = Input::get('nummer');
            $medewerker->created_at = date('Y-m-d H:i:s');
            $medewerker->updated_at = date('Y-m-d H:i:s');

            $medewerker->save();

            if($medewerker->save() == true){
                return Redirect::to('/admin/medewerkers/list')
                    ->with('status', 'Medewerker opgeslagen');
            }else{
                return Redirect::back()
                    ->withInput()
                    ->withErrors($medewerker->errors());
            }


       }
        catch(Exception $e){
            $validator = 'Bij het opslaan is er iets misgegaan.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function getDelete($medewerker_id = null) {

        if(!isset($medewerker_id)){
            return Redirect::back()
                ->withInput();
        }

        $medewerker = Medewerker::find($medewerker_id)->firstOrFail();
        $medewerker->delete();

        return Redirect::to('/admin/medewerkers/list')
            ->with('status', 'Medewerker verwijderd');

    }

}
