<?php

use Illuminate\Database\Eloquent\Model;
use LaravelBook\Ardent\Ardent;


class UserGroup extends Ardent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_groups';
    protected $fillable = array('user_id','group_id');
    public $timestamps = false;

    public static $relationsData = array(
        'user'      => array(self::BELONGS_TO, 'User'),
    );

}
