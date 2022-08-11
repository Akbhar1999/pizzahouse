<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class UpdateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->updateColours();
    }

    private function updateColours()
    {
        $colours = ['success', 'warning', 'dark'];
        foreach ($colours as $colour)
        {
            Category::create(['colour' => $colour]);
        }
    }
}
