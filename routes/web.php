<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| AUTH (LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard (Bisa diakses Admin & User)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |------------------------------------------------------------------------
    | PENDAFTARAN USER (Bisa diakses Admin & User)
    |--------------------------------------------------------------------------
    */
    Route::get('/pendaftaran', [PendaftaranController::class, 'create'])
        ->name('pendaftaran.create');

    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])
        ->name('pendaftaran.store');

    /*
    |--------------------------------------------------------------------------
    | AJAX WILAYAH
    |--------------------------------------------------------------------------
    */
    Route::get('/kabupaten/{id}', [PendaftaranController::class, 'getKabupaten']);
    Route::get('/kecamatan/{id}', [PendaftaranController::class, 'getKecamatan']);

    /*
    |--------------------------------------------------------------------------
    | ADMIN AREA (HANYA ROLE ADMIN)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['admin'])->prefix('admin')->group(function () {

        Route::get('/pendaftaran', [PendaftaranController::class, 'index'])
            ->name('admin.pendaftaran');


        // EDIT
        Route::get('/pendaftaran/{id}/edit', [PendaftaranController::class, 'edit'])
            ->name('admin.pendaftaran.edit');

        Route::put('/pendaftaran/{id}', [PendaftaranController::class, 'update'])
            ->name('admin.pendaftaran.update');

        // DELETE
        Route::delete('/pendaftaran/{id}', [PendaftaranController::class, 'destroy'])
            ->name('admin.pendaftaran.delete');
    });

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
