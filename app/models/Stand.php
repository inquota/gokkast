<?php

use Illuminate\Database\Eloquent\Model;
use LaravelBook\Ardent\Ardent;

class Stand extends Ardent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stand';

    protected $guarded = array('id');

    protected $fillable = array('m_id', 'b_stand', 'e_stand', 'created_at', 'updated_at');

    public static $rules = array(
        'm_id'                 => 'required',
        'b_stand'              => 'required',
        'e_stand'              => 'sometimes',
        'created_at'           => 'required',
        'updated_at'           => 'sometimes'
    );

    public static $relationsData = array(
        'Machine'      => array(self::BELONGS_TO, 'Machine'),
    );

}
