<?php

use Illuminate\Database\Eloquent\Model;
use LaravelBook\Ardent\Ardent;

class Klant extends Ardent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'klant';

    protected $guarded = array('id');

    protected $fillable = array('naam', 'bedrijf', 'adres', 'postcode', 'woonplaats', 'telefoon_vast', 'telefoon_mobiel', 'email', 'website', 'medewerker_id', 'bedrag_lening', 'bedrag_plaatsing_geld', 'geldwisselaar', 'vulling_machines', 'bedrag_vulling_machines', 'vulling_geldwisselaar', 'bedrag_vulling_geldwisselaar', 'vergunning_nummer', 'vergunning_verl_door', 'verg_geldig_vanaf', 'verg_geldig_tot', 'contract', 'contr_geldig_vanaf', 'contr_geldig_tot', 'nettowinst_verdeling', 'afr_freq', 'datum_laatste_verr', 'created_at', 'updated_at');

    public static $rules = array(
        'naam' => 'required',
        'bedrijf' => 'required',
        'adres' => 'required',
        'postcode' => 'required',
        'woonplaats' => 'required',
        'telefoon_vast' => 'sometimes',
        'telefoon_mobiel' => 'sometimes',
        'email' => 'sometimes',
        'website' => 'sometimes',
        'medewerker_id' => 'required',
        'bedrag_lening' => 'sometimes',
        'bedrag_plaatsing_geld' => 'sometimes',
        'geldwisselaar' => 'required',
        'vulling_machines' => 'required',
        'bedrag_vulling_machines' => 'sometimes',
        'vulling_geldwisselaar' => 'sometimes',
        'bedrag_vulling_geldwisselaar' => 'sometimes',
        'vergunning_nummer' => 'required',
        'vergunning_verl_door' => 'required',
        'verg_geldig_vanaf' => 'required',
        'verg_geldig_tot' => 'required',
        'contract' => 'required',
        'contr_geldig_vanaf' => 'sometimes',
        'contr_geldig_tot' => 'sometimes',
        'nettowinst_verdeling' => 'sometimes',
        'afr_freq' => 'required',
        'datum_laatste_verr' => 'sometimes',
        'created_at' => 'required',
        'updated_at' => 'required'
    );

    public static $relationsData = array(
        'medewerker'      => array(self::BELONGS_TO, 'Medewerker'),
        'machine'      => array(self::HASMANY, 'Machine'),
        'bon'           => array(self::HASMANY, 'Bon'),
    );

}
