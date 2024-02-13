<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequestCompany;
use App\Http\Requests\RegisterRequest;
use App\Models\Entreprise;
use App\Models\Role;
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

  public function store(RegisterRequest $request)
  {
      $credentials = $request->validated();
      $credentials['password'] = Hash::make($credentials['password']);
      $user = User::create($credentials);

      if(Session::get('type') == 1)
      {
          $user->roles()->attach([
              Role::select('id')->where('name','candidat')->value('id')
          ]);
          return redirect()->route('login')->with('success','votre compte a ete creer');
      }
      else
      {
          Session::put('user',$user);
          return redirect()->route('FormCreateCompany');
      }

  }

  public function FormCreateCompany()
  {
      return  View('auth.createFormEntreprise',[
          "status" => Statut::all()
      ]);
  }

    public function createCompany(FormRequestCompany $request)
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store("logoEntreprise", "public");
        }
        $entreprise = Entreprise::create($data);
        $user = User::find(Session::get('user')->id);

        $user->roles()->attach([
            Role::select('id')->where('name','candidat')->value('id'),
            Role::select('id')->where('name','AdminEntreprise')->value('id'),
        ]);
        $user->entreprise_id = $entreprise->id;
        $user->save();
        session()->forget(['type', 'user']);
        return redirect()->route('login')->with('success','votre compte a ete creer');
    }

}
