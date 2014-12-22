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


    public static $relationsData = array(
        'medewerker'      => array(self::HAS_ONE, 'Medewerker'),
        'usergroup'      => array(self::HAS_ONE, 'UserGroup'),
    );


}
