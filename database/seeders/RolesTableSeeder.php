<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Administrator',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-29 05:44:51',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'category',
                'display_name' => 'Category',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-30 14:33:02',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'photographer',
                'display_name' => 'Photographer',
                'created_at' => '2022-05-23 11:56:58',
                'updated_at' => '2022-05-30 14:33:22',
            ),
        ));
        
        
    }
}