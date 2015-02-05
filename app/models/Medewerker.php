<?php

use Illuminate\Database\Eloquent\Model;
use LaravelBook\Ardent\Ardent;

class Medewerker extends Ardent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medewerker';

    protected $guarded = array('id');

    protected $fillable = array('user_id', 'naam', 'nummer', 'created_at', 'updated_at');

    public static $rules = array(
        'user_id'              => 'required',
        'naam'                 => 'required',
        'nummer'               => 'required',
        'created_at'           => 'required',
        'updated_at'           => 'required'
    );

    public static $relationsData = array(
        'klant'      => array(self::HAS_MANY, 'Klant'),
        'user'       => array(self::BELONGS_TO, 'User', 'user_id'),
    );

}
