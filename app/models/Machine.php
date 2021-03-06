<?php

use Illuminate\Database\Eloquent\Model;
use LaravelBook\Ardent\Ardent;

class Machine extends Ardent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'machine';

    protected $guarded = array('id');

    protected $fillable = array('machinenr', 'klant_id', 'machine_type', 'type_nummer', 'locatie', 'created_at', 'updated_at');

    public static $rules = array(
        'machinenr'                 => 'required',
        'machine_type'              => 'required',
        'type_nummer'                     => 'required',
        'locatie'                     => 'required'
    );

    public static $relationsData = array(
        'user'      => array(self::BELONGS_TO, 'User'),
        'machinetype'      => array(self::HAS_ONE, 'MachineType'),
    );

}
