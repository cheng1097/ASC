<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $roles = ['admin'=>'admin', 'superviseur'=>'superviseur', 'controleur'=>'controleur'];
        $users = User::all();
        return view('pages.user', compact('roles', 'users'));
    }



    public function store(Request $request)
    {
        $validated =  $request->validate([
            'name' => 'required|string|max:255',
            'login' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        $validated['password'] = Hash::make('0123456789');

        User::create($validated);
        return redirect()->back()->with('success', 'Utilisateur enrégistré');
    }


    public function update(Request $request, $id)
    {
        $validated =  $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        User::where('id', $id)->update($validated);
        return redirect()->back()->with('success', 'Utilisateur modifié !!');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Utilisateur supprimé');
    }

    public function updatePassword(Request $request, $id) {
        if (User::find($id)) {
            $validated =  $request->validate([
                'password' => 'required|string|max:255',
            ]);
            $validated['password'] = Hash::make($validated['password']);
            User::where('id', $id)->update($validated);
            return redirect()->back()->with('success', 'Mot de passe modifié !!');
        }
        return redirect()->back()->with('error', "l'utilisateur n'existe pas");
    }
}
