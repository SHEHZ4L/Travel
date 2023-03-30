<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('akun', App\Http\Controllers\AkunController::class)->middleware(['auth']);
Route::get('/akun/destroy/{id}', [App\Http\Controllers\AkunController::class,'destroy'])->middleware(['auth']);

Route::resource('paketwisata', App\Http\Controllers\PaketwisataController::class)->middleware(['auth']);
Route::get('/paketwisata/destroy/{id}', [App\Http\Controllers\PaketwisataController::class,'destroy'])->middleware(['auth']);

Route::resource('paket', App\Http\Controllers\PaketController::class)->middleware(['auth']);
Route::get('/paket/destroy/{id}', [App\Http\Controllers\PaketController::class,'destroy'])->middleware(['auth']);

Route::resource('mitra', App\Http\Controllers\MitraController::class)->middleware(['auth']);
Route::get('/mitra/destroy/{id}', [App\Http\Controllers\MitraController::class,'destroy'])->middleware(['auth']);

Route::resource('daerah', App\Http\Controllers\DaerahController::class)->middleware(['auth']);
Route::get('/daerah/destroy/{id}', [App\Http\Controllers\DaerahController::class,'destroy'])->middleware(['auth']);

Route::resource('pelanggan', App\Http\Controllers\PelangganController::class)->middleware(['auth']);
Route::get('/pelanggan/destroy/{id}', [App\Http\Controllers\PelangganController::class,'destroy'])->middleware(['auth']);

require __DIR__.'/auth.php';