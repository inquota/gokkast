<?php

class StandenController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getAdminList()
	{
		$standen = Stand::all();
		
		return View::make('admin.standen.list')->with('standen', $standen);
	}
	
	public function getAdminEdit($stand_id)
	{
		$stand = Stand::find($stand_id);
		
		return View::make('admin.standen.edit')->with('stand', $stand);
	}
	
	public function getNew() {

       return View::make('admin.standen.new');
    }
	
	public function doNew() {
        $rules = array(
            'b_stand'   => 'required'
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
                'm_id'      => 1,
                'b_stand'      => Input::get('b_stand'),
                'created_at'  => date('Y-m-d H:i:s'),
            );

            Stand::create($info);

            return Redirect::to('/admin/standen/list')
                ->with('status', 'Stand opgeslagen');
        }
        catch(Exception $e){
            $validator = 'Bij het opslaan is er iets misgegaan.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
    }
	
	public function doEdit($stand_id) {
        $rules = array(
            'b_stand'  => 'required',
            'e_stand'   => 'required',
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
             * Update shop
             */

            $stand = Stand::where('id', '=', $stand_id)->firstOrFail();
			
            $stand->b_stand = Input::get('b_stand');
            $stand->e_stand = Input::get('e_stand');
            $stand->save();


            return Redirect::to('/admin/standen/list')
                ->with('status', 'Shop opgeslagen');
        }
        catch(Exception $e){
            $validator = 'Bij het opslaan is er iets misgegaan.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
    }
	
	public function doRemove($stand_id){
		$stand = Stand::find($stand_id);
		print_r($stand);
		//$stand->delete();
	}
}
