<?php

namespace  App\Http\Controllers;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgetController;
use App\Http\Controllers\Admin\RoleController;
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
Route::get('/createCompany',[RegisterController::class,'FormCreateCompany'])->name('FormCreateCompany');
Route::post('/createCompany',[RegisterController::class,'createCompany'])->name('createCompany');
Route::get('/roles',[RoleController::class,'index'])->name('roles.index');
Route::post('/roles/create',[RoleController::class,'store'])->name('roles.store');
Route::get('/roles/edit/{id}',[RoleController::class,'edit'])->name('roles.edit');
Route::patch('/roles/update/{id}',[RoleController::class,'update'])->name('roles.update');
Route::delete('/roles/destroy/{id}',[RoleController::class,'destroy'])->name('roles.destroy');

Route::get('/forgetPassword',[ForgetController::class,'FormForget'])->name('forget');
Route::post('/resetPassword',[ForgetController::class,'Reset'])->name('reset');




