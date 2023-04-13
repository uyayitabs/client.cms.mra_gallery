<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        // Category::factory()
        //     ->count(300)
        //     ->create();
        Category::insert([
            ['name' => 'Excels'],
            ['name' => 'SuperTT'],
        ]);
       
    }

   
}
