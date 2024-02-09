<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;


class ForgetController extends Controller{

    public function FormForget(){
        return view('Auth.resetPassword');
    }
}