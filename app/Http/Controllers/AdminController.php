<?php

namespace App\Http\Controllers;

use App\Models\Student;

class AdminController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.dashboard', compact('students'));
    }

    public function valider($id)
    {
        $student = Student::findOrFail($id);
        $student->status = 'valide';
        $student->save();

        return back()->with('success', 'Dossier validé');
    }

    public function refuser($id)
    {
        $student = Student::findOrFail($id);
        $student->status = 'refuse';
        $student->save();

        return back()->with('success', 'Dossier refusé');
    }
}
