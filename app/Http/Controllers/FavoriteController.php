<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\UpdateFavoriteRequest;
use App\Models\Favorite;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Auth::user()->favorite->products()->paginate(10);
        if (Auth::guard('merchant')->check()) return view('merchant.favorite.index', compact('products'));
        return view('user.favorite.index', compact('products'));
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
    public function store(StoreFavoriteRequest $request)
    {
        //
    }
    public function add(Product $product)
    {

        $user = Auth::guard()->user();
        $favorite = $user->favorite;

        if($favorite->products()->where('products.id', $product->id)->exists())
        {
            session()->flash('favorite', 'The product is already in the favorite.');
            return back();
        }

        if (!$favorite->products->contains($product->id)) {
            $favorite->products()->attach($product->id);
            return back();
        }

        session()->flash('favorite', 'A product has been added to the favorite.');
        return back();
    }
    public function delete(Product $product)
    {

        $user = Auth::guard('merchant')->check() ? Auth::guard('merchant')->user() :  Auth::guard()->user();
        $user = Auth::guard('merchant')->check() ? Merchant::find($user->id) : User::find($user->id);

        if (!$user->favorite) {
            return response()->json(['error' => 'No favorite found for user'], 404);
        }
        $favorite = $user->favorite;

        $favorite->products()->detach($product->id);
        session()->flash('delete', 'A product has been deleted from the favorite.'); 
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavoriteRequest $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}
