<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;
use App\Models\Collection;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CollectionImport;
use App\Exports\CollectionExport;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkPermission:view collections')->only(['index']);
        $this->middleware('checkPermission:create collection')->only(['create','store']);
        $this->middleware('checkPermission:edit collection')->only(['edit','update']);
        $this->middleware('checkPermission:delete collection')->only(['destroy']);
        $this->middleware('checkPermission:export collections')->only(['export']);
        $this->middleware('checkPermission:import collections')->only(['import']);
        // $this->middleware('checkPermission:change information user')->only(['index']);
        // $this->middleware('checkPermission:search')->only(['search']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.collection.collections-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.collection.add-collection');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollectionRequest $request)
    {
        $request->rules();

        $collection = new Collection();
        $collection->name = $request->name;
        $collection->color = $request->color;

        $path = $request->file('image_path')->store('Colection Images', 'public');
        $collection->image_path = $path;
        $collection->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        return view('Admin.collection.edit-collection', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollectionRequest $request, Collection $collection)
    {
        $request->rules();

        $collection->name = $request->name;
        $collection->color = $request->color;
        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('Colection Images', 'public');
            $collection->image_path = $path;
        }
        $collection->products()->update(['collection_id' => null]);

        $products = request()->products;

        foreach ($products as $id) {
            $product = Product::find($id);

            // $collection->products()->attach([
            //     $product
            // ]);            // $product->collection()->attach([$collection->id]);

            $product->collection_id = $collection->id;
            $product->update();
        }


        $collection->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();
        return back();
    }
    public function export()
    {
        return Excel::download(new CollectionExport, 'collections.xlsx');
    }
    public function import()
    {
        Excel::import(new CollectionImport, request()->file('file'));

        return back()->with('success', 'All good!');
    }
}
