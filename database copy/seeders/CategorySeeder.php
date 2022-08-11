<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insert();
    }

    private function insert()
    {
        $categories = ['pizza', 'crusts', 'toppings'];
        foreach ($categories as $category)
        {
            Category::create(['name' => $category]);
        }
    }
}


//php artisan make:seeder UpdateCategorySeeder