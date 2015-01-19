<?php

use Illuminate\Support\Facades\View;

class UserController extends BaseController {

    public function getLogout() {
        Sentry::logout();
        return Redirect::to('/');
    }

    /**
     *
     * Get dashboard based on group type, admin or client
     *
     * @return mixed
     */
    public function getDashboard()
    {
        $groupid = $this->getCurrentUserGroup();
        $userid = $this->getCurrentUser();

        // check if groupid is 1 = admin
        if(isset($groupid) && $groupid == 1)
        {
        // user is admin
            return Redirect::to('/user/dashboard');

        }
        else if(isset($groupid) && $groupid == 2){

        }else{

            // no group is no access
            return Redirect::to('/forbidden');
        }
    }

}
