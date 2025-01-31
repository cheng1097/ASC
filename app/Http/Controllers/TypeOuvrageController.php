<?php

namespace App\Http\Controllers;

use App\Models\TypeOuvrage;
use App\Models\Categorie;
use Illuminate\Http\Request;

class TypeOuvrageController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        $typeOuvrages = TypeOuvrage::with('categorie')->get();
        return view('pages.type-ouvrage', compact('typeOuvrages', 'categories'));
    }



    public function store(Request $request)
    {
        $validated =  $request->validate([
            'libelle' => 'required|string|max:255',
            'id_categorie' => 'required|exists:categories,id',
        ]);

        TypeOuvrage::create($validated);
        return redirect()->back()->with('success', 'type ouvrage enrégistré');
    }


    public function update(Request $request, $id)
    {
        $validated =  $request->validate([
            'libelle' => 'required|string|max:255',
            'id_categorie' => 'required|exists:categories,id',
        ]);

        TypeOuvrage::where('id', $id)->update($validated);
        return redirect()->back()->with('success', 'type ouvrage modifié !!');
    }

    public function destroy($id)
    {
        TypeOuvrage::where('id', $id)->delete();
        return redirect()->back()->with('success', 'type ouvrage supprimé');
    }
}
