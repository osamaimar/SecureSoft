<?php

namespace App\Http\Controllers;

use App\Exports\LicenseExport;
use App\Http\Requests\StoreLicenseRequest;
use App\Http\Requests\UpdateLicenseRequest;
use App\Imports\LicenseImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\License;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Validators\ValidationException;


class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licenses = License::paginate(10);
        return view('Admin.license.licenses-list', compact('licenses'));
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
    public function store(StoreLicenseRequest $request)
    {
        $request->rules();

        $license = new License();
        $license->key = str_replace(' ', '', $request->license);
        $license->product_id = $request->product;

        $license->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(License $product_key)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(License $product_key)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLicenseRequest $request, License $product_key)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(License $license)
    {
        $license->delete();
        return back();
    }
    public function export()
    {
        return Excel::download(new LicenseExport, 'licenses.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new LicenseImport, $request->file('licenses'));
        return back();
    }
}
