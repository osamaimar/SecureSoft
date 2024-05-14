<x-guest-layout>
    <h2>Merchant Register</h2>

    <form method="POST" action="{{ route('merchant.register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="first_name" :value="__('first_name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="last_name" :value="__('last_name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="company_name" :value="__('company_name')" />
            <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required autofocus autocomplete="company_name" />
            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="address" :value="__('address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="category" :value="__('category')" />
            <select name="category" class="block mt-1 w-full" id="category">
                @foreach (App\Models\Category::all() as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />

        </div>


        <div>
            <x-input-label for="first_phone_number" :value="__('first_phone_number')" />
            <x-text-input id="first_phone_number" class="block mt-1 w-full" type="number" name="first_phone_number" :value="old('first_phone_number')" required autofocus autocomplete="first_phone_number" />
            <x-input-error :messages="$errors->get('first_phone_number')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="second_phone_number" :value="__('second_phone_number')" />
            <x-text-input id="second_phone_number" class="block mt-1 w-full" type="number" name="second_phone_number" :value="old('second_phone_number')" required autofocus autocomplete="second_phone_number" />
            <x-input-error :messages="$errors->get('second_phone_number')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>