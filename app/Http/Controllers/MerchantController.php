<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMerchantRequest;
use App\Http\Requests\UpdateMerchantRequest;
use Illuminate\Http\Request;
use App\Models\Merchant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class MerchantController extends Controller
{
    public function __construct(){
        $this->middleware('checkPermission:view merchants')->only(['index']);
        $this->middleware('checkPermission:edit merchant')->only(['edit']);
        $this->middleware('checkPermission:block merchant')->only(['block']);
        $this->middleware('checkPermission:activate merchant')->only(['activate']);
        $this->middleware('checkPermission:change password merchant')->only(['merchantChangePassword']);
        // $this->middleware('checkPermission:change information merchant')->only(['index']);
        // $this->middleware('checkPermission:search')->only(['search']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchants = Merchant::paginate(18);
        return view('admin.merchants.merchants-list', compact('merchants'));
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
    public function store(StoreMerchantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merchant $merchant)
    {
        return view('admin.merchants.edit-merchant', compact('merchant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMerchantRequest $request, Merchant $merchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchant $merchant)
    {
        //
    }
    public function block(Merchant $merchant)
    {
        $merchant->is_active = false;
        $merchant->update();

        return back();
    }
    public function activate(Merchant $merchant)
    {
        $merchant->is_active = true;
        $merchant->update();

        return back();
    }
    public function search(Request $request)
    {
        $searchTerm = $request->search;

        $filteredMerchants = Merchant::where('first_name', 'like', '%' . $searchTerm . '%')
            ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
            ->orWhere('email', 'like', '%' . $searchTerm . '%')
            ->orWhere('company_name', 'like', '%' . $searchTerm . '%')
            ->orWhere('address', 'like', '%' . $searchTerm . '%')
            ->orWhere('first_phone_number', 'like', '%' . $searchTerm . '%')
            ->orWhere('second_phone_number', 'like', '%' . $searchTerm . '%')
            ->paginate(10);

        return view('admin.merchants.merchants-list')->with(['merchants'=>$filteredMerchants]);
    }
    public function merchantChangePassword(Request $request, Merchant $user)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);


        $user->forceFill([
            'password' => Hash::make($request->password),
        ]);

        $user->update();


        return back()->with('status', 'password-updated');
    }

}
