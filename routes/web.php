<?php
use App\Http\Controllers\Auth\AuthenticateSessionController;
use App\Http\Controllers\Auth\SwipeRoleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgetController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CompetenceController;
use App\Http\Controllers\Admin\LocaliteController;
use App\Http\Controllers\Admin\NiveauController;
use App\Http\Controllers\PostulerController;
use App\Http\Controllers\GestCvController;

use App\Http\Controllers\Entreprise\ProfilController as EntrepriseProfil;
use App\Http\Controllers\Entreprise\OffreController;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Admin\EntrepriseController as EntrepriseAdminController;



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
    if(Auth::check()){
        return redirect()->back();
    }
    return redirect()->route('login');
});

Route::get('/Dashbord',function (){
    return View('dashboard');
})
->name('dash')
;


Route::get('/switch-role/{roleId}', [SwipeRoleController::class,'SwipeRole'])->name('switchRole');

// Routes pour l'authentification
Route::get('/login', [AuthenticateSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticateSessionController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthenticateSessionController::class, 'destroy'])

    ->name('logout');

// Routes pour l'inscription
Route::get('/welcomeRegister', [RegisterController::class, 'typeRegister'])->name('welcome');
Route::get('/register/{id}', [RegisterController::class, 'registerForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/createCompany',[RegisterController::class,'createCompany'])->name('createCompany');
Route::get('/createCompany', [RegisterController::class, 'FormCreateCompany'])->name('FormCreateCompany');

// Routes pour la récupération de mot de passe
Route::get('/forgetPassword', [ForgetController::class, 'FormForget'])->name('forget');
Route::post('/SendToken', [ForgetController::class, 'SendToken'])->name('send');
Route::get('/checkToken/{token}', [ForgetController::class, 'CheckToken'])->name('checkToken');
Route::get('/reset', [ForgetController::class, 'FormReset'])->name('reset');
Route::post('/newPassword', [ForgetController::class, 'newPassword'])->name('resetCompleted');

// Routes pour les rôles d'administration
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::post('/roles/create', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
Route::patch('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

//Routes pour les demandes

//Routes pour les competences

Route::middleware('role:admin')->group(function (){

    Route::get('/competences', [CompetenceController::class, 'index'])->name('competences.index');
    Route::post('/competences/create', [CompetenceController::class, 'store'])->name('competences.store');
    Route::get('/competences/edit/{id}', [CompetenceController::class, 'edit'])->name('competences.edit');
    Route::patch('/competences/update/{id}', [CompetenceController::class, 'update'])->name('competences.update');
    Route::delete('/competences/destroy/{id}', [CompetenceController::class, 'destroy'])->name('competences.destroy');

});

//Routes pour les niveaux

Route::get('/niveaux', [NiveauController::class, 'index'])->name('niveaux.index');
Route::post('/niveaux/create', [NiveauController::class, 'store'])->name('niveaux.store');
Route::get('/niveaux/edit/{id}', [NiveauController::class, 'edit'])->name('niveaux.edit');
Route::patch('/niveaux/update/{id}', [NiveauController::class, 'update'])->name('niveaux.update');
Route::delete('/niveaux/destroy/{id}', [NiveauController::class, 'destroy'])->name('niveaux.destroy');


//Routes pour les localites


Route::prefix('localite')
        ->controller(LocaliteController::class)
        ->name('localites.')

        ->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/create','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::patch('/update/{id}','update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });
Route::get('/entreprise', function () {
    return view('entreprise.index');
});

// Route pour l'entreprise offre

Route::get('/entreprise/Nosoffre', [OffreController::class,'MyOffre'])->name('entreprise.offre.Myoffre');
Route::get('/entreprise/profil', [EntrepriseProfil::class,'index'])->name('entreprise.profil');
Route::get('/entreprise/profil/edit/{id}', [EntrepriseProfil::class,'edit'])->name('entreprise.profil.edit');
Route::get('/entreprise/offre', [OffreController::class,'create'])->name('entreprise.offre');
Route::post('/entreprise/offre', [OffreController::class,'store'])->name('entreprise.offre.store');
Route::get('/entreprise/offre/{offre}', [OffreController::class,'show'])->name('entreprise.offre.show');
Route::get('/entreprise/offre/edit/{offre}', [OffreController::class,'edit'])->name('entreprise.offre.edit');
Route::post('/entreprise/offre/edit/{offre}', [OffreController::class,'update'])->name('entreprise.offre.update');

Route::post('/entreprise/profil/update/{id}', [EntrepriseProfil::class,'update'])->name('entreprise.profil.update');

// Route pour postuler a une offre
Route::get('/postuler/{id}', [PostulerController::class,'showForm'])->name('candidats.postule');
Route::post('/postuler/{id}', [PostulerController::class,'store'])->name('candidats.postule.store');


Route::get('/user/cv',[GestCvController::class, 'index'])->name('user.cv');
Route::get('/user/cv/edit/{id}',[GestCvController::class, 'edit'])->name('user.cv.edit');
Route::post('/user/cv/create',[GestCvController::class, 'store'])->name('user.cv.store');
Route::patch('/user/cv/update/{id}',[GestCvController::class, 'update'])->name('user.cv.update');
Route::delete('/user/cv/destroy/{id}',[GestCvController::class, 'destroy'])->name('user.cv.destroy');
Route::get('/download/{id}', [GestCvController::class, 'dowmload'])->name('user.cv.download');
//Gestion des Entreprises

Route::get('Admin/entreprise/',[EntrepriseAdminController::class,'index'])->name('Admin.entreprise.index');

Route::get('Admin/entreprise/',[EntrepriseAdminController::class,'index'])->name('Admin.entreprise.index')->middleware('auth');
Route::get('Admin/entreprise/enableAccount/{entreprise}',[EntrepriseAdminController::class,'EnableAccount'])->name('Admin.entreprise.enableAccount')->middleware('auth');
Route::get('Admin/entreprise/diseableAccount/{entreprise}',[EntrepriseAdminController::class,'DiseableAccount'])->name('Admin.entreprise.DiseableAccount')->middleware('auth');

