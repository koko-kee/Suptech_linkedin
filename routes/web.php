<?php
use App\Http\Controllers\Auth\AuthenticateSessionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgetController;
use App\Http\Controllers\Admin\RoleController;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Routes pour l'authentification
Route::get('/login', [AuthenticateSessionController::class, 'create'])->name('login');

Route::post('/login', [AuthenticateSessionController::class, 'store'])->name('login.store');

Route::post('/logout', [AuthenticateSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Routes pour l'inscription
Route::get('/welcomeRegister', [RegisterController::class, 'typeRegister'])->name('welcome');
Route::get('/register/{id}', [RegisterController::class, 'registerForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/registerEntreprise', [RegisterController::class, 'FormCompany'])->name('register.formcompany');

// Routes pour la récupération de mot de passe
Route::get('/forgetPassword', [ForgetController::class, 'FormForget'])->name('forget');
Route::post('/resetPassword', [ForgetController::class, 'Reset'])->name('reset');

// Routes pour les rôles d'administration
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::post('/roles/create', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
Route::patch('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
