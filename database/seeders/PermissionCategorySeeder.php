<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission_Category;

class PermissionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission_Category::factory()->create();
    }
}
