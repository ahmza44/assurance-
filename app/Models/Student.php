<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'establishment_id',
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

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }
}
