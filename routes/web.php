<?php
use App\Http\Controllers\Auth\AuthenticateSessionController;
use App\Http\Controllers\Auth\SwipeRoleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgetController;
use App\Http\Controllers\Admin\RoleController;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
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


Route::get('/',function (){
    return redirect()->route('login');
});


Route::get('/switch-role/{roleId}', [SwipeRoleController::class,'SwipeRole'])->name('switchRole');

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
Route::post('/createCompany',[RegisterController::class,'createCompany'])->name('createCompany');
Route::get('/createCompany', [RegisterController::class, 'FormCreateCompany'])->name('FormCreateCompany');

// Routes pour la récupération de mot de passe
Route::get('/forgetPassword', [ForgetController::class, 'FormForget'])->name('forget');
Route::post('/resetPassword', [ForgetController::class, 'Reset'])->name('reset');

// Routes pour les rôles d'administration
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index')->middleware('auth');
Route::post('/roles/create', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
Route::patch('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
