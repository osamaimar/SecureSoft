<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMerchantSettingsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantSettings extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Merchant.settings.index');
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
    public function store(UpdateMerchantSettingsRequest $request)
    {
        $request->rules();


        $user = Auth::guard('merchant')->user();
        $user->company_name = $request->company_name;
        $user->address = $request->address;
        $user->first_phone_number = $request->first_phone_number;
        $user->second_phone_number = $request->second_phone_number;

        if ($request->hasFile('image_path')) {
            $image_path = $request->file('image_path');
            $image_path_name = $image_path->getClientOriginalName();
            $image_path->storeAs('public/profile/', $image_path_name);
            $image_path_link = '/storage/profile/' . $image_path_name;
            $user->image_path = $image_path_link;
        }

        $user->update();

        session()->flash('success', 'The settings have been successfully updated.');

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
    public function edit(string $id)
    {
        //
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
}
