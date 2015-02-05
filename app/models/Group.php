<?php

use Illuminate\Database\Eloquent\Model;
use LaravelBook\Ardent\Ardent;


class Group extends Ardent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';
    protected $fillable = array('name');
    public $timestamps = false;


}
