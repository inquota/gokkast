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

    public function getAdminEdit($machine_id, $stand_id)
    {
        $stand = Stand::find($stand_id);

        return View::make('admin.standen.edit')->with('stand', $stand)->with('machine_id',$machine_id);
    }

    public function getNew($machine_id) {

        return View::make('admin.standen.new')->with('machine_id', $machine_id);
    }

    public function doSave($machine_id, $stand_id = null) {

        if($stand_id==null){
            $stand = new Stand();
        }else{
            $stand = Stand::where('id','=',$stand_id)->firstOrFail();
        }

        $stand->b_stand = Input::get('b_stand');
        $stand->m_id = $machine_id;
        $stand->created_at = date('Y-m-d H:i:s');

        if($stand->save() == true) {
            return Redirect::to('/admin/machines/view/'.$machine_id)
                ->with('status', 'Stand opgeslagen');
        }else{
            return Redirect::back()
                ->withInput()
                ->withErrors($stand->errors());
        }
    }

    public function doRemove($stand_id){
        $stand = Stand::find($stand_id);
        print_r($stand);
        //$stand->delete();
    }
}
