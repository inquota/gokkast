<?php

class BeheerdersController extends BaseController {

	public function getList()
	{
		$gebruikers = User::get();
        $roles = Group::lists('name', 'id');

		return View::make('admin.gebruikers.listadmin')
            ->with('gebruikers', $gebruikers)
            ->with('roles', $roles);
	}

	
	public function getSave($userid = null) {

        if(isset($userid)) {
            $beheerder = User::find($userid)->firstOrFail();
            return View::make('admin.gebruikers.newadmin')
                ->with('beheerder', $beheerder);
        }

       return View::make('admin.gebruikers.newadmin');
    }
	
	public function doSave($userid = null) {

        try{

            /**
             * Create new medewerker
             */

            if(isset($userid)){
                $useritem = User::find($userid);
            }else {
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
                $usergroup->group_id = 1;
                $usergroup->save();
            }

            if($result != true) {
                return Redirect::back()
                    ->withInput()
                    ->withErrors($useritem->errors());
            }
            return Redirect::to('/admin/beheerders/list')
                ->with('status', 'Beheerder opgeslagen');
       }
        catch(Exception $e){
            die(var_dump($e));
            $validator = 'Bij het opslaan is er iets misgegaan.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function getDelete($userid = null) {

        if(!isset($userid)){
            return Redirect::back()
                ->withInput();
        }

        $beheerder = User::find($userid)->firstOrFail();
        $beheerder->delete();

        return Redirect::to('/admin/beheerders/list')
            ->with('status', 'Beheerder verwijderd');

    }

}
