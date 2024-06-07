<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettingsRequest;
use App\Http\Requests\UpdateSettingsRequest;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function __construct()
    {

        $this->middleware('checkPermission:view settings')->only(['index']);

        $this->middleware('checkPermission:edit settings')->only(['store']);
        // $this->middleware('checkPermission:change information user')->only(['index']);
        // $this->middleware('checkPermission:search')->only(['search']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.settings.index');
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
    public function store(StoreSettingsRequest $request)
    {
        $request->rules();
        $settings = Settings::first();

        if ($request->hasFile('light_logo')) {
            $light_logo = $request->file('light_logo');
            $light_logo_name = $light_logo->getClientOriginalName();
            $light_logo->storeAs('public/settings/', $light_logo_name);
            $light_logo_path = '/storage/settings/' . $light_logo_name;
            $settings->light_logo = $light_logo_path;
        }
        if ($request->hasFile('dark_logo')) {
            $dark_logo = $request->file('dark_logo');
            $dark_logo_name = $dark_logo->getClientOriginalName();
            $dark_logo->storeAs('public/settings/', $dark_logo_name);
            $dark_logo_path = '/storage/settings/' . $dark_logo_name;
            $settings->dark_logo = $dark_logo_path;
        }
        if ($request->hasFile('light_icon')) {
            $light_icon = $request->file('light_icon');
            $light_icon_name = $light_icon->getClientOriginalName();
            $light_icon->storeAs('public/settings/', $light_icon_name);
            $light_icon_path = '/storage/settings/' . $light_icon_name;
            $settings->light_icon = $light_icon_path;
        }
        if ($request->hasFile('dark_icon')) {
            $dark_icon = $request->file('dark_icon');
            $dark_icon_name = $dark_icon->getClientOriginalName();
            $dark_icon->storeAs('public/settings/', $dark_icon_name);
            $dark_icon_path = '/storage/settings/' . $dark_icon_name;
            $settings->dark_icon = $dark_icon_path;
        }

        $settings->update();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingsRequest $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
