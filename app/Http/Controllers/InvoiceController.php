<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('admin')->check()) return view('Admin.invoice.invoices-list');

        $user = Auth::guard()->user();
        $orders = $user->orders()->paginate(10);
        return view('Merchant.invoice.invoices-list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.invoice.add-invoice');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        return view('Admin.invoice.edit-invoice', compact('invoice'));;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
    public function unpaidInvoices()
    {
        $user = Auth::guard()->user();
        $orders = $user->orders()->where('status', 'Unpaid')->paginate(10);;
        return view('Merchant.invoice.invoices-list')->with(['orders' => $orders]);
    }
    public function pendingInvoices()
    {
        $user = Auth::guard()->user();
        $orders = $user->orders()->where('status', 'Pending')->paginate(10);;
        return view('Merchant.invoice.invoices-list')->with(['orders' => $orders]);
    }
    public function paidInvoices()
    {
        $user = Auth::guard()->user();
        $orders = $user->orders()->where('status', 'Paid')->paginate(10);;
        return view('Merchant.invoice.invoices-list')->with(['orders' => $orders]);
    }
    public function completedInvoices()
    {
        $user = Auth::guard()->user();
        $orders = $user->orders()->where('status', 'Completed')->paginate(10);;
        return view('Merchant.invoice.invoices-list')->with(['orders' => $orders]);
    }
    public function overdueInvoices()
    {
        $user = Auth::guard()->user();
        $orders = $user->orders()->where('status', 'Overdue')->paginate(10);;
        return view('Merchant.invoice.invoices-list')->with(['orders' => $orders]);
    }
}
