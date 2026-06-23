<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Establishment;
use App\Models\University;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function index()
    {
        $establishments = Establishment::with('university')->latest()->get();

        return view('admin.establishments.index', compact('establishments'));
    }

    public function create()
    {
        $universities = University::orderBy('name')->get();

        return view('admin.establishments.create', compact('universities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
        ]);

        Establishment::create($validated);

        return redirect()->route('admin.establishments.index')
            ->with('success', 'Établissement ajouté avec succès.');
    }

    public function edit($id)
    {
        $establishment = Establishment::findOrFail($id);
        $universities = University::orderBy('name')->get();

        return view('admin.establishments.edit', compact('establishment', 'universities'));
    }

    public function update(Request $request, $id)
    {
        $establishment = Establishment::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
        ]);

        $establishment->update($validated);

        return redirect()->route('admin.establishments.index')
            ->with('success', 'Établissement modifié avec succès.');
    }

    public function destroy(Establishment $establishment)
    {
        $establishment->delete();

        return back()->with('success', 'Établissement supprimé avec succès.');
    }
}