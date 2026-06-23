<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SouscriptionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\EstablishmentController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [SouscriptionController::class, 'index']);

Route::post('/store', [SouscriptionController::class, 'store']);

Route::post('/souscription', [SouscriptionController::class, 'store'])
    ->name('souscription.store');

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard / list
    Route::get('/', [AdminController::class, 'index'])
        ->name('index');

    // Validation
    Route::post('/valider/{id}', [AdminController::class, 'valider'])
        ->name('valider');

    Route::post('/refuser/{id}', [AdminController::class, 'refuser'])
        ->name('refuser');

    // Universities CRUD
    Route::resource('universities', UniversityController::class);

    // Establishments
    Route::get('/establishments', [EstablishmentController::class, 'index'])
        ->name('establishments.index');

    Route::get('/establishments/create', [EstablishmentController::class, 'create'])
        ->name('establishments.create');

    Route::post('/establishments', [EstablishmentController::class, 'store'])
        ->name('establishments.store');

    Route::delete('/establishments/{id}', [EstablishmentController::class, 'destroy'])
        ->name('establishments.destroy');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';