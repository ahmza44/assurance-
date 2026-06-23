<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Establishment;
use App\Models\University;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    // Liste
    public function index()
    {
        $establishments = Establishment::with('university')->latest()->get();

        return view('admin.establishments.index', compact('establishments'));
    }

    // Form create
    public function create()
    {
        $universities = University::all();

        return view('admin.establishments.create', compact('universities'));
    }

    // Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
        ]);

        Establishment::create($validated);

        return redirect()
            ->route('admin.establishments.index')
            ->with('success', 'Establishment created successfully');
    }

    // Delete (important sinon ton system devient sale avec le temps)
    public function destroy($id)
    {
        $establishment = Establishment::findOrFail($id);
        $establishment->delete();

        return back()->with('success', 'Deleted successfully');
    }
}