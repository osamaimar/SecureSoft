<?php

namespace App\Http\Controllers\MerchantAuth;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Cart;
use App\Models\Favorite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('merchant.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(LoginRequest $request): RedirectResponse
    {


        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'first_phone_number' => ['required', 'numeric', 'digits_between:10,15'],
            'second_phone_number' => ['required', 'numeric', 'digits_between:10,15'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Merchant::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // dd($request);

        $merchant = Merchant::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->email,
            'company_name' => $request->company_name,
            'address' => $request->address,
            'first_phone_number' => $request->first_phone_number,
            'second_phone_number' => $request->second_phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $cart = Cart::create();
        $merchant->cart()->associate($cart);
        $favorite = Favorite::create();
        $merchant->save();
        $merchant->favorite()->save($favorite);

        // $merchant->attach($cart);

        event(new Registered($merchant));

        $request->authenticate('merchant');

        $request->session()->regenerate();

        return redirect(RouteServiceProvider::MERCHANTHOME);
    }
}
