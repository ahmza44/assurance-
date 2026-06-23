<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SouscriptionController;
use App\Http\Controllers\AdminController;

Route::get('/', [SouscriptionController::class, 'index']);
Route::post('/store', [SouscriptionController::class, 'store']);
Route::post('/souscription', [SouscriptionController::class, 'store'])->name('souscription.store');
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/valider/{id}', [AdminController::class, 'valider']);
Route::post('/admin/refuser/{id}', [AdminController::class, 'refuser']);
