
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SouscriptionController;
use App\Http\Controllers\AdminController;

Route::get('/', [SouscriptionController::class, 'index']);
Route::post('/store', [SouscriptionController::class, 'store']);
Route::post('/souscription', [SouscriptionController::class, 'store'])
    ->name('souscription.store');

Route::middleware(['auth'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');

    Route::post('/admin/valider/{id}', [AdminController::class, 'valider'])
        ->name('admin.valider');

    Route::post('/admin/refuser/{id}', [AdminController::class, 'refuser'])
        ->name('admin.refuser');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('universities', \App\Http\Controllers\Admin\UniversityController::class);
});
use App\Http\Controllers\Admin\EstablishmentController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/establishments', [EstablishmentController::class, 'index'])
        ->name('establishments.index');

    Route::get('/establishments/create', [EstablishmentController::class, 'create'])
        ->name('establishments.create');

    Route::post('/establishments', [EstablishmentController::class, 'store'])
        ->name('establishments.store');

    Route::delete('/establishments/{id}', [EstablishmentController::class, 'destroy'])
        ->name('establishments.destroy');
});

require __DIR__.'/auth.php';

