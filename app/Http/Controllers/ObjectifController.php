<?php

namespace App\Http\Controllers;

use App\Models\Enqueteur;
use App\Models\Objectif;
use App\Models\TypeOuvrage;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ObjectifController extends Controller
{
    public function index()
    {
        $date = Carbon::tomorrow()->format('Y-m-d');
        $enqueteurs = self::getEnqueteurWithObjectif($date);
        $ouvrages = TypeOuvrage::all();
        return view('pages.objectif', compact('enqueteurs', 'ouvrages'));
    }

    public static function getEnqueteurWithObjectif($date = null){
       // $date =  $date ?? Carbon::today()->format('Y-m-d');
        $date = request('date') ? request('date') : Carbon::today()->format('Y-m-d');
       return Enqueteur::with(['objectifs' => function ($query) use ($date) {
            $query->whereDate('date', $date);
        }, 'objectifs.ouvrage']) // 'objectifs.ouvrage' charge également l'ouvrage pour chaque objectif
            ->get();
    }



    public function store(Request $request)
    {
       // $date = Carbon::tomorrow()->format('Y-m-d');
        $validated =  $request->validate([
            'objectif' => 'required|integer|min:1',
            'id_enqueteur' => 'required|exists:enqueteurs,id',
            'id_type_ouvrage' => 'required|exists:type_ouvrages,id',
            'date' => 'required|date',
        ]);
        if (Objectif::where([
            'id_enqueteur' => $validated['id_enqueteur'],
            'id_type_ouvrage' => $validated['id_type_ouvrage'],
            'date' => $validated['date'],
        ])->first()) {
            return redirect()->back()->with('error', 'L\'objectif existe déjà pour cette date');
         }
        //$validated['date'] = $date;
        Objectif::create($validated);
        return redirect()->back()->with('success', 'Objectif enrégistré');
    }


    public function update(Request $request, $id)
    {
        $validated =  $request->validate([
            'objectif' => 'required|integer|min:1',
        ]);   

        Objectif::where('id', $id)->update($validated);
        return redirect()->back()->with('success', 'Objectif modifié !!');
    }

    public function destroy($id)
    {
        if (Objectif::find($id) && Objectif::find($id)->date < Carbon::today()->format('Y-m-d') ) {
            return redirect()->back()->with('error', 'Impossible de supprimer un objectif associé');
        }
        Objectif::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Objectif supprimé');
    }
}
