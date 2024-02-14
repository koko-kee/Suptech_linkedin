<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth as Aut;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Role;

use Illuminate\Support\Facades\Session;

class SwipeRoleController extends Controller
{

    public function SwipeRole(int $roleId)
    {
        $user = Aut::user();
        $role = Role::find($roleId);

        if ($user && $role) {
            
            session::put('current_role',$role->name);

            if($role->name == 'candidat'){
                return redirect()->route('offres');
            }else{
                return redirect()->route('dash');
            }
        
        }
    }
}
