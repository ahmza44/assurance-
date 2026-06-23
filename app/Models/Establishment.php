<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Establishment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'university_id'];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}