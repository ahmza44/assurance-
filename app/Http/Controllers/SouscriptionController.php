<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class SouscriptionController extends Controller
{
    public function index()
    {
        return view('souscription');
    }

    public function store(Request $request)
    {
        $request->validate([
            'etablissement' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'cin' => 'required',
            'email' => 'required|email',
            'annee_scolaire' => 'required',
            'niveau_scolaire' => 'required',
        ]);

        $exist = Student::where('cin', $request->cin)->first();

        if ($exist) {
            return back()->with('error', 'Etudiant déjà inscrit');
        }

        $path = null;

        if ($request->hasFile('cin_recto_verso')) {
            $path = $request->file('cin_recto_verso')
                            ->store('cins', 'public');
        }

        Student::create([
            'universite' => 'ENCG',
            'etablissement' => $request->etablissement,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'cin' => $request->cin,
            'email' => $request->email,
            'annee_scolaire' => $request->annee_scolaire,
            'niveau_scolaire' => $request->niveau_scolaire,
            'cin_recto_verso' => $path,
        ]);

        return back()->with('success', 'Demande envoyée avec succès');
    }
}