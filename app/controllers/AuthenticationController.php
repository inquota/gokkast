<?php

class AuthenticationController extends BaseController {

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

    /**
     *
     * Login action
     *
     * @return mixed
     */
    public function doLogin()
    {

        $rules = array(
            'username'    => 'required',
            'password' => 'required|between:3,32',
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
        // Login credentials
        $credentials = array(
            'username'    => Input::get('username'),
            'password' => Input::get('password'),
        );

        // Authenticate the user
        $user = Sentry::authenticate($credentials, false);

        return Redirect::to('/user/dashboard');
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            $validator = 'Login veld is verplicht.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            $validator = 'Wachtwoord veld is verplicht.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
        {
            $validator = 'Het opgegeven wachtwoord is onjuist.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $validator = 'De gebruiker kan niet worden gevonden.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            $validator = 'De gebruiker is niet geactiveerd.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }

        // The following is only required if the throttling is enabled
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
        {
            $validator = 'De gebruiker is opgeheven.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
        {
            $validator = 'De gebruiker is verbannen.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }

    }


    public function getForgotPassword() {
        return ( ! Sentry::check()) ? View::make('home.password-forget') : Redirect::to('/');
    }

    public function doForgotPassword() {

        $username = Input::get('email');

        // check if username is set or else just go back
        if((isset($username) && $username == '') || (!isset($username))){
            return Redirect::back()
                ->with('emptyuser', 'U heeft geen gebruikersnaam ingevuld.');
        }

        try{
            $user = User::where('username', '=', $username)->firstOrFail();

            $auth = Sentry::findUserByLogin($username);
            $resetCode = $auth->getResetPasswordCode();

            $data = array();
            $message = $user;

            Mail::send('emails.auth.forgot-password', $data, function($message) use ($user, $resetCode) {

                if(isset($user->profile->promotor_id) && $user->profile->promotor_id != null && $user->profile->promotor_id != 0 & $user->profile->promotor_id != '0'){
                    $shop = Shop::where('id', '=', Promotor::where('id', '=', $user->profile->promotor_id)->firstOrFail()->shop_id)->firstOrFail();
                    $shopSettings = json_decode($shop->shopsettings);
                    if (isset($shopSettings->useSMTP) && $shopSettings->useSMTP == 1){
                        $emails = json_decode('{"from_email":"noreply@'.$shopSettings->hostname.'","reply_email":"noreply@'.$shopSettings->hostname.'","reply_email_name":"'.$shop->name.'"}' , 1);
                    }else {
                        $emails = json_decode('{"from_email":"noreply@amizisoftware.nl","reply_email":"noreply@amizisoftware.nl","reply_email_name":"Amizisoftware"}' , 1);
                    }
                    $company = $shop->name;
                    $message -> from($emails['from_email'], $shop->name);
                }else{
                    $company = 'Amizisoftware';
                    $message -> from('noreply@amizisoftware.nl', 'Amizisoftware');
                }
                $message -> data = array('resetcode' => $resetCode, 'profile' => $user->profile, 'companyname' => $company);
                $message -> subject('Nieuw wachtwoord aanvragen');
                $message -> to($user->profile->email);
            });

                // send mail

            //TODO logic forgot password with mail stuff
            return ( ! Sentry::check()) ? View::make('home.password-forget')
                ->with('requested', 1) : Redirect::to('/');
        }
        catch(Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ( ! Sentry::check()) ? View::make('home.password-forget')
                ->with('usernotfound', 1) : Redirect::to('/user/forgot-password');
        }

    }

    public function getSetPassword($secret = null) {
        try {
            $user = User::where('reset_password_code', '=', $secret)->firstOrFail();
            return (!Sentry::check()) ? View::make('home.password-set')->with('secret', $secret)->with('user', $user) : Redirect::to('/');
        }        catch(Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ( ! Sentry::check()) ? View::make('home.password-set')
                ->with('usernotfound', 1) : Redirect::to('/user/set-password');
        }
    }

    public function doSetPassword($secret = null) {

        $rules = array(
            'password'  => 'required|between:3,32|confirmed',
            'password_confirmation' => 'required|between:3,32|same:password',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.

        if ($validator->fails()) {
            return Redirect::to('/user/set-password/'.$secret)
                ->withInput()
                ->withErrors($validator);
        }

        try{

            $user = User::where('reset_password_code', '=', $secret)->firstOrFail();
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            return Redirect::to('/user/set-password/'.$secret)
                ->with('confirmed', 1);

        }        catch(Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return ( ! Sentry::check()) ? View::make('home.password-set')
                ->with('usernotfound', 1) : Redirect::to('/user/set-password');
        }

    }



}
