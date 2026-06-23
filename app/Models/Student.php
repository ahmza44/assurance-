<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'universite',
        'etablissement',
        'nom',
        'prenom',
        'telephone',
        'cin',
        'email',
        'annee_scolaire',
        'niveau_scolaire',
        'cin_recto_verso',
        'status'
    ];
}
