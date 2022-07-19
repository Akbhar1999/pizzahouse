<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            
            CategorySeeder::class,
            ProductSeeder::class,
            UsersSeeder::class,
            ProductCategoriesSeeder::class
        ]);
    }
}
// php artisan db:seed --class CategorySeeder

