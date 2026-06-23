<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::withCount('establishments')->latest()->get();

        return view('admin.universities.index', compact('universities'));
    }

    public function create()
    {
        return view('admin.universities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:universities,name',
        ]);

        University::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.universities.index')
            ->with('success', 'Université ajoutée avec succès.');
    }

    public function show(University $university)
    {
        return redirect()->route('admin.universities.index');
    }

    public function edit(University $university)
    {
        return view('admin.universities.edit', compact('university'));
    }

    public function update(Request $request, University $university)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:universities,name,' . $university->id,
        ]);

        $university->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.universities.index')
            ->with('success', 'Université modifiée avec succès.');
    }

    public function destroy(University $university)
    {
        if ($university->establishments()->exists()) {
            return redirect()->route('admin.universities.index')
                ->with('error', 'Impossible de supprimer cette université car elle contient des établissements.');
        }

        $university->delete();

        return redirect()->route('admin.universities.index')
            ->with('success', 'Université supprimée avec succès.');
    }
}