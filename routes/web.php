<?php
use App\Http\Controllers\Auth\AuthenticateSessionController;
use App\Http\Controllers\Auth\SwipeRoleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgetController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CompetenceController;
use App\Http\Controllers\Admin\LocaliteController;
use App\Http\Controllers\Admin\NiveauController;
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

// Routes pour le profil candidat
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
Route::post('/roles/create', [RoleController::class, 'store'])->name('roles.store')->middleware('auth');
Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit')->middleware('auth');
Route::patch('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update')->middleware('auth');
Route::delete('/roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware('auth');

//Routes pour les demandes

//Routes pour les competences

Route::get('/competences', [CompetenceController::class, 'index'])->name('competences.index')->middleware('auth');
Route::post('/competences/create', [CompetenceController::class, 'store'])->name('competences.store')->middleware('auth');
Route::get('/competences/edit/{id}', [CompetenceController::class, 'edit'])->name('competences.edit')->middleware('auth');
Route::patch('/competences/update/{id}', [CompetenceController::class, 'update'])->name('competences.update')->middleware('auth');
Route::delete('/competences/destroy/{id}', [CompetenceController::class, 'destroy'])->name('competences.destroy')->middleware('auth');

//Routes pour les niveaux

Route::get('/niveaux', [NiveauController::class, 'index'])->name('niveaux.index')->middleware('auth');
Route::post('/niveaux/create', [NiveauController::class, 'store'])->name('niveaux.store')->middleware('auth');
Route::get('/niveaux/edit/{id}', [NiveauController::class, 'edit'])->name('niveaux.edit')->middleware('auth');
Route::patch('/niveaux/update/{id}', [NiveauController::class, 'update'])->name('niveaux.update')->middleware('auth');
Route::delete('/niveaux/destroy/{id}', [NiveauController::class, 'destroy'])->name('niveaux.destroy')->middleware('auth');


//Routes pour les localites


Route::prefix('localite')
        ->controller(LocaliteController::class)
        ->name('localites.')
        ->middleware('auth')
        ->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/create','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::patch('/update/{id}','update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });