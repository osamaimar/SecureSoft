<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Activity_log;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\Collection;
use App\Models\Contact;
use App\Models\Device;
use App\Models\Discount;
use App\Models\Favorite;
use App\Models\Merchant;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Product_key;
use App\Models\Purchase_History;
use App\Models\Region;
use App\Models\Settings;
use App\Models\Slider;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $products = Product::factory()
            ->has(Region::factory()->count(3))
            ->has(Device::factory()->count(4))
            ->has(Collection::factory()->count(4))
            ->has(Supplier::factory()->count(4))
            ->has(Order::factory()->count(5))
            ->has(Cart::factory()->count(6))
            ->has(Favorite::factory()->count(7))
            ->create();




        // $regions = Region::factory(1)->create();
        // $devices = Device::factory(4)->create();
        // $orders = Order::factory(5)->create();
        // $carts = Cart::factory(6)->create();
        // $favorites = Favorite::factory(7)->create();
        $keys = Product_key::factory(20)->create();
        $images = Product_image::factory(10)->create();
        // $histories = Purchase_History::factory(10)->create();
        // $merchants = Merchant::factory(10)->create();
        // $users = User::factory(10)->create();
        // $admins = Admin::factory(10)->create();
        // $logs = Activity_log::factory(10)->create();
        $discounts = Discount::factory(10)->create();
        $settings = Settings::factory(10)->create();
        $contact = Contact::factory(10)->create();
        $pages = Page::factory(10)->create();
        $sliders = Slider::factory(10)->create();



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
