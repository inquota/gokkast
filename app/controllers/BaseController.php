<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

        // send variables to master layout
        if (Sentry::check()){
            View::share([
                'groupid'       => $this->getCurrentUserGroup(),
                'currentuser'   => $this->getCurrentUser()
            ]);
        }
	}

    protected function headerVariables() {

        $sitename = 'Amizi';
        $sitedexcription = 'WOM Marketing Vriendencheque software';
        $sitekeywords = 'Amizi, WOM Marketing';

        $sitearray = array('sitename' => $sitename, 'sitedescription' => $sitedexcription, 'sitekeywords' => $sitekeywords);

        return $sitearray;

    }

    protected function getCurrentUserGroup() {
        $user = Sentry::getUser();

        $currentuser = User::find($user->id);

        $groupid = $currentuser->usergroup->group_id;

        return $groupid;
    }

    protected function getCurrentUser() {
        $user = Sentry::getUser();

        $currentuser = User::find($user->id);

        return $currentuser;
    }

}
