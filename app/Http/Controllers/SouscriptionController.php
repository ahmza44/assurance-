<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Establishment;

class SouscriptionController extends Controller
{
    public function index()
    {
        $universities = University::all();

        return view('souscription', compact('universities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'cin' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|email',

            'university_id' => 'required|exists:universities,id',
            'establishment_id' => 'required|exists:establishments,id',

            'annee_scolaire' => 'required|string',
            'niveau_scolaire' => 'required|string',
        ]);

        // ici tu sauvegardes student/souscription (pas montré)
        return back()->with('success', 'Demande envoyée');
    }

    // API cascade
    public function getEstablishments($id)
    {
        return Establishment::where('university_id', $id)->get();
    }
}