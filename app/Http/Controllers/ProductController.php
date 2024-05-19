<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.product.products-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.product.add-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $request->rules();


        $product = new Product();
        $product->name = $request->name;
        $product->duration_value = $request->duration_value;
        $product->duration_time_unit = $request->duration_time_unit;
        $product->no_of_devices = $request->no_of_devices;
        $product->cost = $request->cost;
        $product->base_price = $request->base_price;
        $product->end_user_price = $request->end_user_price;
        $product->warranty = $request->warranty;
        $product->description = $request->description;
        $product->default_image = $request->default_image;
        $product->status = $request->status;
        $product->collection_id = $request->collection;
        $product->supplier_id = $request->supplier;



        $uploadedImages = $request->file('images');
        $product->images()->delete();
        foreach ($uploadedImages as $image) {
            $path = $image->store('images', 'public');
            $product->images()->create(['image_path' => $path]);
        }


        // $product->devices()->sync($request->devices);
        $product->save();
        $product->regions()->attach($request->regions);
        $product->devices()->attach($request->devices);
        $product->update();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('Admin.product.edit-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->rules();

        $product->name = $request->name;
        $product->duration_value = $request->duration_value;
        $product->duration_time_unit = $request->duration_time_unit;
        $product->no_of_devices = $request->no_of_devices;
        $product->cost = $request->cost;
        $product->base_price = $request->base_price;
        $product->end_user_price = $request->end_user_price;
        $product->warranty = $request->warranty;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->collection_id = $request->collection;
        $product->supplier_id = $request->supplier;

        if ($request->hasFile('default_image')) {
            $product->default_image = $request->default_image;
        }
        if ($request->hasFile('images')) {
            $uploadedImages = $request->file('images');
            $product->images()->delete();
            foreach ($uploadedImages as $image) {
                $path = $image->store('images', 'public');
                $product->images()->create(['image_path' => $path]);
            }
        }

        $product->regions()->detach();
        $product->devices()->detach();
        $product->regions()->attach($request->regions);
        $product->devices()->attach($request->devices);

        $product->update();
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('deleted', 'The Product has been delete.');
    }
}
