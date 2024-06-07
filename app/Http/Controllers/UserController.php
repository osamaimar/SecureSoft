<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkPermission:view users')->only(['index']);
        $this->middleware('checkPermission:edit user')->only(['edit']);
        $this->middleware('checkPermission:block user')->only(['block']);
        $this->middleware('checkPermission:activate user')->only(['activate']);
        $this->middleware('checkPermission:change password user')->only(['userChangePassword']);
        // $this->middleware('checkPermission:change information user')->only(['index']);
        // $this->middleware('checkPermission:search')->only(['search']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(18);
        return view('admin.users.users-list', compact('users'));
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
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        return view('admin.users.edit-user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function block(User $user)
    {
        $user->is_active = false;
        $user->update();

        return back();
    }
    public function activate(User $user)
    {
        $user->is_active = true;
        $user->update();

        return back();
    }

    public function search(Request $request)
    {
        $searchTerm = $request->search;

        $filteredUsers = User::where('first_name', 'like', '%' . $searchTerm . '%')
            ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
            ->orWhere('email', 'like', '%' . $searchTerm . '%')
            ->orWhere('phone_number', 'like', '%' . $searchTerm . '%')
            ->paginate(10);

        return view('admin.users.users-list')->with(['users' => $filteredUsers]);
    }
    public function userChangePassword(Request $request, User $user)
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
