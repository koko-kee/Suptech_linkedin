<?php

use App\Http\Controllers\Entreprise\ProfilController;
use App\Http\Controllers\Entreprise\OffreController;
use App\Models\Role;
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
    return view('dashboard');
});

Route::get('/entreprise', function () {
    return view('entreprise.index');
});

Route::get('/entreprise/profil', [ProfilController::class,'index'])->name('entreprise.profil');
Route::get('/entreprise/profil/edit/{id}', [ProfilController::class,'edit'])->name('entreprise.profil.edit/{id}');
Route::get('/entreprise/offre', [OffreController::class,'create'])->name('entreprise.offre');
Route::post('/entreprise/offre', [OffreController::class,'store'])->name('entreprise.offre.store');