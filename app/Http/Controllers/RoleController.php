<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.role.roles-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.add-role');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|string|max:100|unique:roles,name',
            
        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->givePermissionTo(request()->input('permissions'));
        $role->save();
        return back();



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit-role',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        if($role->name == $request->name){

        }else{
            $validated = $request->validate([
                'name' => 'required|string|max:100|unique:roles,name',
            ]);
        }
        $role->name = $request->name;
        $role->syncPermissions([]);
        $role->givePermissionTo(request()->input('permissions'));
        $role->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }
}
