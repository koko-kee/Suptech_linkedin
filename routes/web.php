<?php

namespace  App\Http\Controllers;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgetController;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
})->name('login');

Route::get('/welcomeRegister',[RegisterController::class,'typeRegister'])->name('welcome');
Route::get('/register/{id}',[RegisterController::class,'registerForm'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name('register.store');
Route::get('/registerEntreprise',[RegisterController::class,'FormCompany'])->name('register.formcompany');

Route::get('/resetPassword',[ForgetController::class,'FormForget'])->name('forget');





