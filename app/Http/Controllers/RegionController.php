<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Models\Region;

class RegionController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkPermission:view regions')->only(['index']);
        $this->middleware('checkPermission:create region')->only(['create','store']);
        $this->middleware('checkPermission:edit region')->only(['edit','update']);
        $this->middleware('checkPermission:delete region')->only(['destroy']);
        // $this->middleware('checkPermission:change information user')->only(['index']);
        // $this->middleware('checkPermission:search')->only(['search']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.region.add-region');
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
    public function store(StoreRegionRequest $request)
    {
        $request->rules();

        $region = new Region();
        $region->name = $request->name;

        $region->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        return view('Admin.region.edit-region', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegionRequest $request, Region $region)
    {
        $request->rules();
        $region->name = $request->name;
        $region->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return back();
    }
}
