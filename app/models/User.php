<?php

use LaravelBook\Ardent\Ardent;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Ardent {

	use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $guarded = array('id');

    protected $fillable = array('email','password', 'first_name', 'last_name', 'created_at', 'updated_at');

    public static $rules = array(
        'username'                  => 'required|unique:users',
        'password'                  => 'sometimes',
        'password_confirmation'     => 'same:password',
        'first_name'                => 'required',
        'last_name'                 => 'required',
        'created_at'                => 'required',
        'updated_at'                => 'required'
    );

    public static $updaterules = array(
        'username'                  => 'required|unique:users',
        'first_name'                => 'required',
        'last_name'                 => 'required',
        'created_at'                => 'required',
        'updated_at'                => 'required'
    );


    public static $relationsData = array(
        'usergroup'      => array(self::HAS_ONE, 'UserGroup'),
    );


}
