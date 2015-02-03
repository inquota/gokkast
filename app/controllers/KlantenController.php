<?php

class KlantenController extends BaseController {

	public function getList()
	{
		$klanten = Klant::all();
		
		return View::make('admin.klanten.list')
            ->with('klanten', $klanten);
	}

	public function getSave($klant_id = null) {

        $medewerkers = Medewerker::get();

        if(isset($klant_id)){

            $klant = Klant::find($klant_id)->firstOrFail();

            return View::make('admin.klanten.new')
                ->with('klant', $klant)
                ->with('medewerkers', $medewerkers);
        }

       return View::make('admin.klanten.new')->with('medewerkers', $medewerkers);
    }
	
	public function doSave($klant_id = null) {

            /**
             * Create new shop
             */

        if(isset($klant_id)){
            $klant = Klant::find($klant_id)->firstOrFail();
        }else {
            $klant = new Klant();
        }

        $klant->bedrijf = Input::get('bedrijf');
        $klant->naam = Input::get('naam');
        $klant->adres = Input::get('adres');
        $klant->postcode = Input::get('postcode');
        $klant->woonplaats = Input::get('woonplaats');
        $klant->telefoon_vast = Input::get('telefoon_vast');
        $klant->telefoon_mobiel = Input::get('telefoon_mobiel');
        $klant->email = Input::get('email');
        $klant->website = Input::get('website');
        $klant->medewerker_id = Input::get('medewerker_id');
        $klant->bedrag_lening = Input::get('bedrag_lening');
        $klant->bedrag_plaatsing_geld = Input::get('bedrag_plaatsing_geld');
        $klant->geldwisselaar = Input::get('geldwisselaar');
        $klant->vulling_machines = Input::get('vulling_machines');
        $klant->bedrag_vulling_machines = Input::get('bedrag_vulling_machines');
        $klant->vulling_geldwisselaar = Input::get('vulling_geldwisselaar');
        $klant->bedrag_vulling_geldwisselaar = Input::get('bedrag_vulling_geldwisselaar');
        $klant->vergunning_nummer = Input::get('vergunning_nummer');
        $klant->vergunning_verl_door = Input::get('vergunning_verl_door');
        $klant->verg_geldig_vanaf = Input::get('verg_geldig_vanaf');
        $klant->verg_geldig_tot = Input::get('verg_geldig_tot');
        $klant->contract = Input::get('contract');
        $klant->contr_geldig_vanaf = Input::get('contr_geldig_vanaf');
        $klant->contr_geldig_tot = Input::get('contr_geldig_tot');
        $klant->nettowinst_verdeling = Input::get('nettowinst_verdeling');
        $klant->afr_freq = Input::get('afr_freq');
        $klant->datum_laatste_verr = Input::get('datum_laatste_verr');
        $klant->created_at = date('Y-m-d H:i:s');
        $klant->updated_at = '0000-00-00 00:00:00';

            if($klant->save() == true) {
                return Redirect::to('/admin/klanten/list')
                    ->with('status', 'Klant opgeslagen');
            }else{
                return Redirect::back()
                    ->withInput()
                    ->withErrors($klant->errors());
            }
    }

    public function getDelete($klanten_id = null) {

        if(!isset($klanten_id)){
            return Redirect::back()
                ->withInput();
        }

        $klant = Klant::find($klanten_id)->firstOrFail();
        $klant->delete();

        return Redirect::to('/admin/klanten/list')
            ->with('status', 'Medewerker verwijderd');

    }

}
