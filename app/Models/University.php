<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class University extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function establishments()
    {
        return $this->hasMany(Establishment::class);
    }
}