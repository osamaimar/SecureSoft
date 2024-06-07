<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkPermission:view suppliers')->only(['index']);
        $this->middleware('checkPermission:create supplier')->only(['create','store']);
        $this->middleware('checkPermission:edit supplier')->only(['edit','update']);
        $this->middleware('checkPermission:delete supplier')->only(['destroy']);
        // $this->middleware('checkPermission:change information user')->only(['index']);
        // $this->middleware('checkPermission:search')->only(['search']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.supplier.add-supplier');
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
    public function store(StoreSupplierRequest $request)
    {
        $request->rules();

        $supplier = new Supplier();
        $supplier->name = $request->name;

        $supplier->save();

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('Admin.supplier.edit-supplier', compact('supplier'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $request->rules();
        $supplier->name = $request->name;
        $supplier->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return back();
    }
}
