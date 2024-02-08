<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequestCompany;
use App\Http\Requests\RegisterRequest;
use App\Models\Entreprise;
use App\Models\Statut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
      $credentials['password'] = Hash::make($credentials['password']);
      $user = User::create($credentials);
      if(Session::get('type') == 1)
      {
          return redirect()->route('login');
      }
      else
      {
          Session::put('user',$user);
          return  View('auth.createFormEntreprise',[
              "status" => Statut::all()
          ]);
      }
  }


  public function  createCompany(FormRequestCompany $request)
  {
      $data = $request->validated();
      $imagePath = $request->validated('logo')->store("logoEntreprise","public");
      $data['logo'] = $imagePath;
      $entreprise = Entreprise::create($data);
      $user = User::find(Session::get('user')->id);
      $user->entreprise_id = $entreprise->id;
      $user->update();
      return redirect()->route('Auth.login');
  }



}
