<?php

use App\Http\Controllers\SekolahController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SekolahController::class, 'dashboard'])->name('dashboard');

Route::prefix('guru')->name('guru.')->group(function () {
    Route::get('/', [SekolahController::class, 'guruIndex'])->name('index');
    Route::post('/', [SekolahController::class, 'storeGuru'])->name('store');
    Route::put('/{guru}', [SekolahController::class, 'updateGuru'])->name('update');
    Route::delete('/{guru}', [SekolahController::class, 'destroyGuru'])->name('destroy');
});

Route::prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/', [SekolahController::class, 'siswaIndex'])->name('index');
    Route::post('/', [SekolahController::class, 'storeSiswa'])->name('store');
    Route::put('/{siswa}', [SekolahController::class, 'updateSiswa'])->name('update');
    Route::delete('/{siswa}', [SekolahController::class, 'destroySiswa'])->name('destroy');
});

Route::prefix('mapel')->name('mapel.')->group(function () {
    Route::get('/', [SekolahController::class, 'mapelIndex'])->name('index');
    Route::post('/', [SekolahController::class, 'storeMapel'])->name('store');
    Route::put('/{mapel}', [SekolahController::class, 'updateMapel'])->name('update');
    Route::delete('/{mapel}', [SekolahController::class, 'destroyMapel'])->name('destroy');
});
