<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequestCompany;
use App\Http\Requests\RegisterRequest;
use App\Models\Entreprise;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class RegisterController extends Controller
{

  public function  typeRegister()
  {
     return View('Auth.loginWelcome');
  }

  public  function registerForm(int $id)
  {
      Session::put('type',$id);
      return View('Auth.register');
  }

  public function store(RegisterRequest$request)
  {
      $credentials = $request->validated();
      $password = Hash::make($credentials['password']);
      $credentials['password'] = $password;
      $user = User::create($credentials);
      $typeRegister = Session::get('type');
      if($typeRegister == 1){
          return redirect()->route('login');
      }else{
          Session::put('user',$user);
          return  redirect()->route('');
      }

  }

  public function  FormCompany()
  {
       return View('auth.CreateFormEntreprise');
  }

  public function  createCompany(FormRequestCompany $request)
  {
      $data = $request->validated();
      $entreprise = Entreprise::create($data);
      $user = User::find(Session::get('user')->id);
      $user->entreprise_id = $entreprise->id;
      $user->update;
      return redirect()->route('Auth.login');
  }



}
