<?php

use Illuminate\Database\Eloquent\Model;
use LaravelBook\Ardent\Ardent;

class BonTotal extends Ardent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bonnen_total';

    protected $guarded = array('id');

    protected $fillable = array('bon_id', 'subtotal', 'with_tax', 'share', 'net_profit', 'operator', 'created_at', 'updated_at');
	
    public static $relationsData = array(
        'bon_id'      => array(self::BELONGS_TO, 'Bon')
    );

}
