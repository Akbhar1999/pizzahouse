<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Enums\CategoryType;

class ProductCategoriesSeeder extends Seeder
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
        $categories = $this->productCategories();
        foreach ($categories as $item)
        {
            ProductCategory::create(
                [
                    'product_id' => $item['product_id'],
                    'category_id' => $item['category_id'],
                ]
            );
        }
    }


    private function productCategories()
    {

        return [

            [
                'product_id' => 1,
                'category_id' => CategoryType::Pizza(),
            ],
            [
                'product_id' => 2,
                'category_id' => CategoryType::Pizza(),
            ],
            [
                'product_id' => 3,
                'category_id' => CategoryType::Pizza(),
            ],
            [
                'product_id' => 4,
                'category_id' => CategoryType::Pizza(),
            ],
            [
                'product_id' => 5,
                'category_id' => CategoryType::Pizza(),
            ],

            [
                'product_id' => 6,
                'category_id' => CategoryType::Topping(),
            ],
            [
                'product_id' => 7,
                'category_id' => CategoryType::Topping(),
            ],
            [
                'product_id' => 8,
                'category_id' => CategoryType::Topping(),
            ],
            [
                'product_id' => 9,
                'category_id' => CategoryType::Topping(),
            ],
            [
                'product_id' => 10,
                'category_id' => CategoryType::Topping(),
            ],

            [
                'product_id' => 11,
                'category_id' => CategoryType::Crust(),
            ],
            [
                'product_id' => 12,
                'category_id' => CategoryType::Crust(),
            ],
            [
                'product_id' => 13,
                'category_id' => CategoryType::Crust(),
            ],
        ];
    }
}
