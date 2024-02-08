<?php

namespace  App\Http\Controllers;
use App\Http\Controllers\Auth\RegisterController;
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
});

Route::group(function (){

    Route::get('/welcomeRegister','typeRegister')->name('type');
    Route::get('/register','typeRegister')->name('store');

})->controller(RegisterController::class)->name('register.');








