<?php

namespace Database\Factories;

use App\Models\Permission;
use App\Models\Permission_Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission_Category>
 */
class Permission_CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Produts',
            'Collections',
            'Suppliers',
            'Regions',
            'Purchases',
            'Users',
            'Merchants',
            'Pages',
            'Settings',
        ];

        $productPermissions = [
            'view products',
            'create product',
            'edit product',
            'delete product',
            'export products',
            'import products',
        ];

        $collectionPermissions = [
            'view collections',
            'create collection',
            'edit collection',
            'delete collection',
            'export collections',
            'import collections',
        ];


        $supplierPermissions = [
            'view suppliers',
            'create supplier',
            'edit supplier',
            'delete supplier',
        ];

        $regionPermissions = [
            'view regions',
            'create region',
            'edit region',
            'delete region',
        ];

        $purchasePermissions = [
            'view purchases',
            'download purchas',
        ];

        $userPermissions = [
            'view users',
            'edit user',
            'block user',
            'activate user',
            'change password user',
            'change information user',
        ];


        $merchantPermissions = [
            'view merchants',
            'edit merchant',
            'block merchant',
            'activate merchant',
            'change password merchant',
            'change information merchant',
        ];


        $pagePermissions = [
            'view pages',
            'create page',
            'edit page',
            'delete page',
        ];
        
        $settingsPermissions = [
            'view settings',
            'edit settings',
        ];
        
        foreach ($categories as $category) {
            Permission_Category::create([
                'name' => $category,
            ]);
        }


        foreach ($productPermissions as $productPermission) {
            Permission::create([
                'name' => $productPermission,
                'guard_name' => 'admin',
                'category_id' => 1,
                // Add other default values for all columns here
            ]);
        }
        foreach ($collectionPermissions as $collectionPermission) {
            Permission::create([
                'name' => $collectionPermission,
                'guard_name' => 'admin',
                'category_id' => 2,
                // Add other default values for all columns here
            ]);
        }
        foreach ($supplierPermissions as $supplierPermission) {
            Permission::create([
                'name' => $supplierPermission,
                'guard_name' => 'admin',
                'category_id' => 3,
                // Add other default values for all columns here
            ]);
        }
        foreach ($regionPermissions as $regionPermission) {
            Permission::create([
                'name' => $regionPermission,
                'guard_name' => 'admin',
                'category_id' => 4,
                // Add other default values for all columns here
            ]);
        }
        foreach ($purchasePermissions as $purchasePermission) {
            Permission::create([
                'name' => $purchasePermission,
                'guard_name' => 'admin',
                'category_id' => 5,
                // Add other default values for all columns here
            ]);
        }
        foreach ($userPermissions as $userPermission) {
            Permission::create([
                'name' => $userPermission,
                'guard_name' => 'admin',
                'category_id' => 6,
                // Add other default values for all columns here
            ]);
        }
        foreach ($merchantPermissions as $merchantPermission) {
            Permission::create([
                'name' => $merchantPermission,
                'guard_name' => 'admin',
                'category_id' => 7,
                // Add other default values for all columns here
            ]);
        }
        foreach ($pagePermissions as $pagePermission) {
            Permission::create([
                'name' => $pagePermission,
                'guard_name' => 'admin',
                'category_id' => 8,
                // Add other default values for all columns here
            ]);
        }
        foreach ($settingsPermissions as $settingsPermission) {
            Permission::create([
                'name' => $settingsPermission,
                'guard_name' => 'admin',
                'category_id' => 9,
                // Add other default values for all columns here
            ]);
        }



        return [];
    }
}
