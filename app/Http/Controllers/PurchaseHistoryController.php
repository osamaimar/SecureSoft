<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePurchase_HistoryRequest;
use App\Http\Requests\UpdatePurchase_HistoryRequest;
use App\Models\Purchase_History;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PurchaseExport;


class PurchaseHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkPermission:view purchases')->only(['index']);
        $this->middleware('checkPermission:download purchas')->only(['export']);
        // $this->middleware('checkPermission:change information user')->only(['index']);
        // $this->middleware('checkPermission:search')->only(['search']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.purchase history.index');
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
    public function store(StorePurchase_HistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase_History $purchase_History)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase_History $purchase_History)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchase_HistoryRequest $request, Purchase_History $purchase_History)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase_History $purchase_History)
    {
        //
    }
    public function export() 
    {
        return Excel::download(new PurchaseExport, 'purchases.xlsx');
    }
}
