<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCartRequest $request)
    {
    }
    public function add(StoreCartRequest $request, Product $product)
    {
        $request->validated();

        $user = Auth::guard('merchant')->check() ? Auth::guard('merchant')->user() :  Auth::guard()->user();
        $user = Auth::guard('merchant')->check() ? Merchant::find($user->id) : User::find($user->id);
        if (!$user->cart) {
            $cart = Cart::create();
            $user->cart()->associate($cart);
            $user->save();
        } else {
            $cart = $user->cart;
        }

        // Check if the product is already in the cart
        $existingProduct = $cart->products()->where('product_id', $product->id)->first();

        if ($existingProduct) {
            // Update the quantity
            $cart->products()->updateExistingPivot($product->id, [
                'quantity' => $existingProduct->pivot->quantity + $request->quantity
            ]);
        } else {
            // Attach the product with the specified quantity
            $cart->products()->attach(['product_id' => $product->id], ['quantity' => $request->quantity]);
        }
        $cart->recalculateCart();

        Session::flash('success', 'A product has been added to the cart.'); 
        return back();
    }
    public function delete(Product $product)
    {

        $user = Auth::guard('merchant')->check() ? Auth::guard('merchant')->user() :  Auth::guard()->user();
        $user = Auth::guard('merchant')->check() ? Merchant::find($user->id) : User::find($user->id);

        if (!$user->cart) {
            return response()->json(['error' => 'No cart found for user'], 404);
        }
        $cart = $user->cart;

        $cart->products()->detach($product->id);
        $cart->recalculateCart();

        Session::flash('delete', 'A product has been deleted from the cart.'); 
        return back();
    }
    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
