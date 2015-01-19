<?php

class KlantenController extends BaseController {

	public function getAdminList()
	{
		$machines = Klant::all();
		
		return View::make('admin.klanten.list')->with('machines', $machines);
	}
	
	public function getAdminEdit($klant_id)
	{
		$machine = Klant::find($klant_id);
		
		return View::make('admin.klanten.edit')->with('machine', $machine);
	}
	
	public function getNew() {
		$klanten = Klant::all();
       return View::make('admin.klanten.new')->with('medewerkers', $klanten);
    }
	
	public function doNew() {

        try{

            /**
             * Create new shop
             */

            $info = array(
                'bedrijf'      => Input::get('bedrijf'),
                'naam'      => Input::get('naam'),
                'adres'      => Input::get('adres'),
                'postcode'      => Input::get('postcode'),
                'woonplaats'      => Input::get('woonplaats'),
                'telefoon_vast'      => Input::get('telefoon_vast'),
                'telefoon_mobiel'      => Input::get('telefoon_mobiel'),
                'email'      => Input::get('email'),
                'website'      => Input::get('website'),
                'medewerker_id'      => Input::get('medewerker_id'),
                'bedrag_lening'      => Input::get('bedrag_lening'),
                'bedrag_plaatsing_geld'      => Input::get('bedrag_plaatsing_geld'),
                'geldwisselaar'      => Input::get('geldwisselaar'),
                'vulling_machines'      => Input::get('vulling_machines'),
                'bedrag_vulling_machines'      => Input::get('bedrag_vulling_machines'),
                'vulling_geldwisselaar'      => Input::get('vulling_geldwisselaar'),
                'bedrag_vulling_geldwisselaar'      => Input::get('bedrag_vulling_geldwisselaar'),
                'vergunning_nummer'      => Input::get('vergunning_nummer'),
                'vergunning_verl_door'      => Input::get('vergunning_verl_door'),
                'verg_geldig_vanaf'      => Input::get('verg_geldig_vanaf'),
                'verg_geldig_tot'      => Input::get('verg_geldig_tot'),
                'contract'      => Input::get('contract'),
                'contr_geldig_vanaf'      => Input::get('contr_geldig_vanaf'),
                'contr_geldig_tot'      => Input::get('contr_geldig_tot'),
                'nettowinst_verdeling'      => Input::get('nettowinst_verdeling'),
                'afr_freq'      => Input::get('afr_freq'),
                'datum_laatste_verr'      => Input::get('datum_laatste_verr'),
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => '0000-00-00 00:00:00',
            );

            Klant::create($info);

            return Redirect::to('/admin/klanten/list')
                ->with('status', 'Klant opgeslagen');
        }
        catch(Exception $e){
            $validator = 'Bij het opslaan is er iets misgegaan.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
    }
	
	public function doEdit($klant_id) {
        $rules = array(
            'machine_type'   => 'required',
            'machinenr'   => 'required',
            'th_nr'   => 'required',
            'tb_nr'   => 'required',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }

        try{

            /**
             * Update Klant
             */

            $machine = Klant::where('id', '=', $machine_id)->firstOrFail();
			
            $machine->machinenr = Input::get('machinenr');
            $machine->th_nr = Input::get('th_nr');
			$machine->tb_nr = Input::get('tb_nr');
            $machine->save();

            return Redirect::to('/admin/machines/list')
                ->with('status', 'Machine opgeslagen');
        }
        catch(Exception $e){
            $validator = 'Bij het opslaan is er iets misgegaan.';
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
    }

}
