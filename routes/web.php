<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KlonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\PetaniController;
use App\Http\Controllers\KebunController;
use App\Http\Controllers\BlokJalurController;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\TaksasiController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('klon', KlonController::class)->except(['show']);
    Route::resource('status', StatusController::class)->except(['show']);
    Route::resource('petani', PetaniController::class);
    Route::resource('kebun', KebunController::class);
    Route::resource('blok-jalur', BlokJalurController::class);
    Route::resource('tanaman', TanamanController::class);
    Route::resource('taksasi', TaksasiController::class);
    Route::get('tanaman/qr/{id}', [TanamanController::class, 'qr'])->name('tanaman.qr');
    Route::get('/get-blok-jalur/{kebunId}', [TanamanController::class, 'getBlokJalur']);
    Route::get('/get-next-code/{kebunId}', [TanamanController::class, 'getNextCode']);
    Route::get('/tanaman-qr', [TanamanController::class, 'selectKebunForQr'])->name('tanaman.qr.select');
    Route::get('/kebun/{id}/tanaman/qr', [TanamanController::class, 'printAllQr'])->name('tanaman.qr.print');

});

Route::get('/cek-nik', [PetaniController::class, 'cekNIK'])->name('cek.nik');
Route::get('/tanaman/{id}/lihat', [TanamanController::class, 'publicShow'])->name('tanaman.view');

require __DIR__.'/auth.php';
