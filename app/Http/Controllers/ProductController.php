<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Maatwebsite\Excel\Validators\ValidationException;
use App\Exports\ProductExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkPermission:view products')->only(['index']);
        $this->middleware('checkPermission:create product')->only(['create', 'store']);
        $this->middleware('checkPermission:edit product')->only(['edit', 'update']);
        $this->middleware('checkPermission:delete product')->only(['destroy']);
        $this->middleware('checkPermission:export products')->only(['export']);
        $this->middleware('checkPermission:import products')->only(['import']);
        // $this->middleware('checkPermission:change information user')->only(['index']);
        // $this->middleware('checkPermission:search')->only(['search']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('Admin.product.products-list', compact('products'));
    }
    public function merchantProducts()
    {
        $products = Product::where('status', 'like', '1')->paginate(10);
        return view('Merchant.product.products-list', compact('products'));
    }
    public function productDetails(Product $product)
    {
        return view('Merchant.product.product-details', compact('product'));
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
        $product->min_partner_price = $request->min_partner_price;
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
        $product->min_partner_price = $request->min_partner_price;
        $product->end_user_price = $request->end_user_price;
        $product->warranty = $request->warranty;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->collection_id = $request->collection;
        $product->supplier_id = $request->supplier;

        if ($request->hasFile('default_image')) {
            $product_image = $request->file('default_image');
            $product_image_name = $product_image->getClientOriginalName();
            $product_image->storeAs('public/products/', $product_image_name);
            $product_image_path = '/storage/products/' . $product_image_name;
            $product->default_image = $product_image_path;
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
    public function search(Request $request)
    {
        $searchTerm = $request->search;

        $filteredProducts = Product::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('duration_value', 'like', '%' . $searchTerm . '%')
            ->orWhere('min_partner_price', 'like', '%' . $searchTerm . '%')
            ->orWhere('end_user_price', 'like', '%' . $searchTerm . '%')
            ->orWhere('status', 'like', '%' . $searchTerm . '%')
            ->paginate(10);

        return view('admin.product.products-list')->with(['products' => $filteredProducts]);
    }

    public function merchantSearch(Request $request)
    {
        $searchTerm = $request->search;

        $filteredProducts = Product::where('status', 1)
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('duration_value', 'like', '%' . $searchTerm . '%')
                    ->orWhere('min_partner_price', 'like', '%' . $searchTerm . '%')
                    ->orWhere('end_user_price', 'like', '%' . $searchTerm . '%');
            })
            ->paginate(10);

        return view('merchant.product.products-list')->with(['products' => $filteredProducts]);
    }
    public function sortEndPrice()
    {


        $products = Product::orderBy('end_user_price')->paginate(10);


        // return back()->with(['products'=>$sortedProducts]);
        return view('admin.product.products-list', compact('products'));
    }
    public function sortBasePrice()
    {


        $products = Product::orderBy('min_partner_price')->paginate(10);


        // return back()->with(['products'=>$sortedProducts]);
        return view('admin.product.products-list', compact('products'));
    }
    public function export()
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }
    public function import(Request $request)
    {
        try {
            Excel::import(new ProductsImport, request()->file('file'));
            return redirect()->back()->with('success', 'File imported successfully.');
        } catch (ValidationException $e) {
            $failures = $e->failures();

            return redirect()->back()->with('failures', $failures);
        }
    }
}
