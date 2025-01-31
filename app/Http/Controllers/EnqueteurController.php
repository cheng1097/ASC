<?php

namespace App\Http\Controllers;

use App\Models\Enqueteur;
use App\Models\User;
use Illuminate\Http\Request;


class EnqueteurController extends Controller
{
    public function index()
    {
        
        if (_user('role') == 'controleur') {
            $enqueteurs = Enqueteur::with('controleur')->where('id_controleur' , _user('id'))->get();
        } else {
            $enqueteurs = Enqueteur::with('controleur')->get();
        }
        
        return view('pages.enqueteur', compact('enqueteurs'));
    }



    public function store(Request $request)
    {
        $validated =  $request->validate([
            'nom' => 'required|string|max:255',
        ]);
       
        $validated['id_controleur'] = _user('id');
        Enqueteur::create($validated);
        return redirect()->back()->with('success', 'Enqueteur enrégistré');
    }


    public function update(Request $request, $id)
    {
        $validated =  $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        Enqueteur::where('id', $id)->update($validated);
        return redirect()->back()->with('success', 'Enqueteur modifié !!');
    }

    public function destroy($id)
    {
        Enqueteur::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Enqueteur supprimé');
    }
}
