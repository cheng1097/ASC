<?php

namespace App\Http\Controllers;

use App\Models\Objectif;
use App\Models\Realisation;
use Illuminate\Http\Request;

class RealisationController extends Controller
{
    
    public function saveObjectifByEnqueteur(Request $request){   
        foreach (removeEmptyKeys($request->post('quantite_enqueteur')) as $key => $value) {
            Realisation::updateOrCreate(
                ['id_objectif' => $key], 
                ['quantite_enqueteur' => $value] 
            );
        }
        return redirect()->back()->with('success', 'Données collectées sauvegardés');
    }

    public function validation_n1(Request $request){  
        foreach (removeEmptyKeys($request->post('quantite_controleur')) as $key => $value) {
            Realisation::where( ['id_objectif' => $key])->update(['quantite_controleur' => $value]);
        }
        return redirect()->back()->with('success', 'Validations sauvegardés');
    }

    public function validation_n2(Request $request){   
        foreach (removeEmptyKeys($request->post('quantite_superviseur')) as $key => $value) {
            Realisation::where( ['id_objectif' => $key])->update(['quantite_superviseur' => $value]);
        }
        return redirect()->back()->with('success', 'Validations sauvegardés');
    }

    public static function getquantite_enqueteur($id_objectif){
        $objectif = Objectif::find($id_objectif);
        if ($objectif) {
            return Realisation::where('id_objectif', $id_objectif)->first()->quantite_enqueteur ?? null;
        }
        return 0;
    }

    public static function getquantite_controleur($id_objectif){
        $objectif = Objectif::find($id_objectif);
        if ($objectif) {
            return Realisation::where('id_objectif', $id_objectif)->first()->quantite_controleur ?? null;
        }
        return 0;
    }

    public static function getquantite_superviseur($id_objectif){
        $objectif = Objectif::find($id_objectif);
        if ($objectif) {
            return Realisation::where('id_objectif', $id_objectif)->first()->quantite_superviseur ?? null;
        }
        return 0;
    }
}
