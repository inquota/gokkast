<?php

use Illuminate\Database\Eloquent\Model;
use LaravelBook\Ardent\Ardent;

class MachineType extends Ardent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'machine_type';

    protected $guarded = array('id');

    protected $fillable = array('type');

    public $timestamps = false;

    public static $rules = array(
        'type'                     => 'required'
    );

    public static $relationsData = array(
        'machine'      => array(self::BELONGS_TO, 'Machine'),
    );

}
