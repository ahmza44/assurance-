<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('universite')->default('ENCG');
            $table->string('etablissement');
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('cin')->unique();
            $table->string('email')->unique();
            $table->string('annee_scolaire');
            $table->string('niveau_scolaire');
            $table->string('cin_recto_verso')->nullable();
            $table->enum('status', ['en_attente', 'valide', 'refuse'])
                  ->default('en_attente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
