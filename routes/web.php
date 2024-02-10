<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;


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

Route::get('/index', 'App\Http\Controllers\UserController@index')->name('offres');
Route::get('/user/profil',[ProfilController::class,'showProfil'])->name('user.profil.index');
Route::get('/user/profil/edit',[ProfilController::class,'editProfil'])->name('user.profil.edit');
Route::post('/user/profil/update',[ProfilController::class,'updateProfil'])->name('user.profil.update');