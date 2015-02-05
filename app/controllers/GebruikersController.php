<?php

class GebruikersController extends BaseController {

	public function getList()
	{
		$gebruikers = Medewerker::get();
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
                $useritem = User::find($medewerker->user_id);
            }else {
                $medewerker = new Medewerker();
                $useritem = new User();
            }

            $useritem->first_name          = Input::get('first_name');
            $useritem->last_name           = Input::get('last_name');
            $useritem->activated           = 1;
            $useritem->username            = Input::get('username');
            $password = Input::get('password');
            if(isset($password)) {
                $useritem->password = Hash::make($password);
            }
            $useritem->created_at       = date('Y-m-d H:i:s');
            $useritem->updated_at       = date('Y-m-d H:i:s');

            $result = $useritem->updateUniques();

            if(!isset($useritem->usergroup->group_id)) {
                $usergroup = new UserGroup;
                $usergroup->user_id = $useritem->id;
                $usergroup->group_id = 2;
                $usergroup->save();
            }

            if($result != true) {
                return Redirect::back()
                    ->withInput()
                    ->withErrors($useritem->errors());
            }

            $medewerker->user_id = $useritem->id;
            $medewerker->naam = Input::get('first_name'). ' '. Input::get('last_name');
            $medewerker->nummer = Input::get('username');
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
            die(var_dump($e));
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
