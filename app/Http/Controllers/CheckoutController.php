<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCartRequest;
use App\Models\Invoice;
use App\Models\License;
use App\Models\Order;
use App\Models\Sold_license;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }
    public function showCheckoutForm()
    {
        $cart = Auth::guard()->user()->cart;
        return view('Merchant.checkout.index', compact('cart'));
    }
    public function processCheckout()
    {
    }
    public function checkoutSuccess(UpdateCartRequest $request)
    {
        $request->rules();
        $request->validated();

        $user = Auth::guard('merchant')->check() ? Auth::guard('merchant')->user() : Auth::guard()->user();

        if ($user->cart->products()->count() <= 0) {
            session()->flash('warning','There is no items in the cart.');
            return back();
        }

        //new Order
        $orderId = DB::table('orders')->insertGetId([
            'user_id' => Auth::guard('web')->user()->id ?? null,
            'merchant_id' => Auth::guard('merchant')->user()->id ?? null,
            'total_amount' => $user->cart->total_amount,
            'subtotal' => $user->cart->total_amount,
            // 'number_of_products' => $user->cart->number_of_products ?? 0,
            'status' => 'Paid',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $order = Order::find($orderId);

        //add products to order
        $syncData = [];
        foreach ($user->cart->products as $product) {
            $syncData[$product->id] = ['quantity' => $product->pivot->quantity];
        }
        $order->products()->sync($syncData);
        $order->update();


        //new Invoice
        $invoice = new Invoice();
        $invoice->order_id = $order->id;
        $invoice->save();

        //add and remove licenses
        foreach ($order->products as $product) {
            $quantity = $product->pivot->quantity;
            $licenses = $product->licenses()->where('product_id', $product->id)->take($quantity)->get();

            foreach ($licenses as $license) {
                $soldLicense = new Sold_license();
                $soldLicense->key = $license->key;
                $soldLicense->product_id = $license->product_id;
                $soldLicense->order_id = $order->id;
                $product->stock--;
                $soldLicense->save();
                $license->delete();
            }
        }

        //remove products from cart
        $user->cart->total_amount = 0;
        $user->cart->number_of_products = 0;
        $user->cart->update();
        $user->cart->save();
        $user->cart->products()->detach();


        $order->status = 'Completed';
        $order->update();
        session()->flash('purchase','The purchase was completed successfully.');
        return to_route('merchant.orders.details',$order);
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
