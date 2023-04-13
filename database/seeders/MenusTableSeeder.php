<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'photographer',
                'created_at' => '2022-05-23 14:54:21',
                'updated_at' => '2022-05-23 14:54:21',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'category',
                'created_at' => '2022-05-23 14:54:30',
                'updated_at' => '2022-05-23 14:54:30',
            ),
        ));
        
        
    }
}