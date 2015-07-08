<?php

use Illuminate\Database\Eloquent\Model;
use LaravelBook\Ardent\Ardent;

class Bon extends Ardent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bonnen';

    protected $guarded = array('id');

    protected $fillable = array('klant_id', 'bon_id', 'machine_id', 'nieuw_in', 'stand_date', 'stand_eind', 'nieuw_uit', 'tikken_uit', 'in', 'uit', 'status', 'created_at', 'updated_at');
	
    public static $relationsData = array(
        'klant'      => array(self::BELONGS_TO, 'Klant'),
        'machine'      => array(self::BELONGS_TO, 'Machine'),
    );

}
