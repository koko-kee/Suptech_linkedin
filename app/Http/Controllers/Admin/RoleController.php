<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            "name"=>[
                "required",
                
            ],
            "description"=>["nullable"]
        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        return redirect()->route('roles.index');

    }
    public function edit(Request $request,$id)
    {
        $role = Role::find($id);
        return view('roles.edit',compact('role'));
    }
    public function update(Request $request,$id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->update();
        return redirect()->route('roles.index');
    }
    public function destroy(Request $request,$id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles.index');

    }
   
}
