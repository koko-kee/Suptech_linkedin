<?php

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


Route::get("candidat/profil",[userController::class,"showProfil"])->name("candidats.profil");
Route::post("candidat/demande",[userController::class,"storeCV"])->name("candidats.demande.store");