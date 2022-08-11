<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductSeeder extends Seeder
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

    public function insert()
    {
        $pizzas = $this->pizzas();
        $toppings = $this->toppings();
        $crusts = $this->crusts();

        $this
        ->addData($pizzas)
        ->addData($toppings)
        ->addData($crusts);

    }
    private function addData(array $items)
    {
        foreach ($items as $item)
        {
            Product::create(
                [
                    'type' => $item['type'],
                    'description' => $item['description'],
                    'cost' => $item['cost'],

                ]
            );
        }
        return $this;
    }

    private function pizzas()
    {

        return [

            [
                'type' => 'margherita',
                'description' => 'A classic - tomato, mozzarella & basil',
                'cost' => 6
            ],

            [
                'type' => 'napoletana',
                'description' => 'Gourmet pizza - San Marzano tomatoes, buffalo mozzarella, basil & oregano',
                'cost' => 7,
            ],
            [
                'type' => 'marinara',
                'description' => 'Gourmet classic - tomatoes, mozzarella, anchovies, olive oil & garlic',
                'cost' => 7.5,

            ],
            [
                'type' => 'calzone',
                'description' => 'A year-round favourite - oven-baked, folded pizza, stuffed with ham, mozzarella and an egg"',
                'cost' => 8.5,
            ],

            [
                'type' => 'veg supreme',
                'description' => 'vegetarian food',
                'cost' => 10,
            ],
        ];
    }
    private function crusts()
    {
        return [

            [
                "type" => "garlic crust",
                "description" => "crust garlic",
                "cost" => 0.50,
            ],

            [
                "type" => "thin and crispy",
                "description" => "thin....",
                "cost" => 0.50,
            ],


            [
                "type" => "thick",
                "description" => "thick crust",
                "cost" => 0.50,
            ],


        ];
    }
    private function toppings()
    {
        return [

            [
                "type" => "mushrooms",
                "description" => "sliced and lightly fried",
                "cost" => 0.50,
            ],


            [
                "type" => "cheese",
                "description" => "grated cheese melted into your pizza",
                "cost" => 1.00,
            ],


            [
                "type" => "anchovies",
                "description" => "add intense bursts of flavour",
                "cost" => 1.50,
            ],


            [
                "type" => "sausage",
                "description" => "slices of smoked, spiced sausage",
                "cost" => 1.80,
            ],

            [
                "type" => "capers",
                "description" => "add a bit of zing to your pizza",
                "cost" => 0.75,
            ],


        ];
    }

}
