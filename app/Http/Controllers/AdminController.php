<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::paginate(18);
        return view('admin.admins.admins-list', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit-admin', compact('admin'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function block(Admin $admin)
    {
        $admin->is_active = false;
        $admin->update();

        return back();
    }
    public function activate(Admin $admin)
    {
        $admin->is_active = true;
        $admin->update();

        return back();
    }
    public function editRole(Admin $admin){
        return view('Admin.admins.admin-role',compact('admin'));
    }

    public function addRole(Request $request, Admin $admin){
        $validated = $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
        ]);
        $admin->syncRoles([]);
        $admin->syncRoles($request->roles);        
        $admin->update();
        return back();

    }
    public function editPermission(Admin $admin){
        return view('Admin.admins.admin-permission',compact('admin'));
    }

    public function addPermission(Request $request, Admin $admin){
        $validated = $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,name',
        ]);
        $admin->syncPermissions([]);
        $admin->givePermissionTo(request()->input('permissions'));
        $admin->update();
        return back();

    }

    public function adminChangePassword(Request $request, Admin $user)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);


        $user->forceFill([
            'password' => Hash::make($request->password),
        ]);

        $user->update();


        return back()->with('status', 'password-updated');
    }
}
