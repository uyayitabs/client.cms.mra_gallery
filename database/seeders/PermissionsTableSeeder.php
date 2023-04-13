<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            25 => 
            array (
                'id' => 41,
                'key' => 'browse_venues',
                'table_name' => 'venues',
                'created_at' => '2022-05-23 12:32:54',
                'updated_at' => '2022-05-23 12:32:54',
            ),
            26 => 
            array (
                'id' => 42,
                'key' => 'read_venues',
                'table_name' => 'venues',
                'created_at' => '2022-05-23 12:32:54',
                'updated_at' => '2022-05-23 12:32:54',
            ),
            27 => 
            array (
                'id' => 43,
                'key' => 'edit_venues',
                'table_name' => 'venues',
                'created_at' => '2022-05-23 12:32:54',
                'updated_at' => '2022-05-23 12:32:54',
            ),
            28 => 
            array (
                'id' => 44,
                'key' => 'add_venues',
                'table_name' => 'venues',
                'created_at' => '2022-05-23 12:32:54',
                'updated_at' => '2022-05-23 12:32:54',
            ),
            29 => 
            array (
                'id' => 45,
                'key' => 'delete_venues',
                'table_name' => 'venues',
                'created_at' => '2022-05-23 12:32:54',
                'updated_at' => '2022-05-23 12:32:54',
            ),
            30 => 
            array (
                'id' => 46,
                'key' => 'browse_events',
                'table_name' => 'events',
                'created_at' => '2022-05-23 12:48:28',
                'updated_at' => '2022-05-23 12:48:28',
            ),
            31 => 
            array (
                'id' => 47,
                'key' => 'read_events',
                'table_name' => 'events',
                'created_at' => '2022-05-23 12:48:28',
                'updated_at' => '2022-05-23 12:48:28',
            ),
            32 => 
            array (
                'id' => 48,
                'key' => 'edit_events',
                'table_name' => 'events',
                'created_at' => '2022-05-23 12:48:28',
                'updated_at' => '2022-05-23 12:48:28',
            ),
            33 => 
            array (
                'id' => 49,
                'key' => 'add_events',
                'table_name' => 'events',
                'created_at' => '2022-05-23 12:48:28',
                'updated_at' => '2022-05-23 12:48:28',
            ),
            34 => 
            array (
                'id' => 50,
                'key' => 'delete_events',
                'table_name' => 'events',
                'created_at' => '2022-05-23 12:48:28',
                'updated_at' => '2022-05-23 12:48:28',
            ),
            35 => 
            array (
                'id' => 51,
                'key' => 'browse_photos',
                'table_name' => 'photos',
                'created_at' => '2022-05-23 13:16:23',
                'updated_at' => '2022-05-23 13:16:23',
            ),
            36 => 
            array (
                'id' => 52,
                'key' => 'read_photos',
                'table_name' => 'photos',
                'created_at' => '2022-05-23 13:16:23',
                'updated_at' => '2022-05-23 13:16:23',
            ),
            37 => 
            array (
                'id' => 53,
                'key' => 'edit_photos',
                'table_name' => 'photos',
                'created_at' => '2022-05-23 13:16:23',
                'updated_at' => '2022-05-23 13:16:23',
            ),
            38 => 
            array (
                'id' => 54,
                'key' => 'add_photos',
                'table_name' => 'photos',
                'created_at' => '2022-05-23 13:16:23',
                'updated_at' => '2022-05-23 13:16:23',
            ),
            39 => 
            array (
                'id' => 55,
                'key' => 'delete_photos',
                'table_name' => 'photos',
                'created_at' => '2022-05-23 13:16:23',
                'updated_at' => '2022-05-23 13:16:23',
            ),
            40 => 
            array (
                'id' => 56,
                'key' => 'browse_categories',
                'table_name' => 'categories',
                'created_at' => '2022-05-23 13:35:29',
                'updated_at' => '2022-05-23 13:35:29',
            ),
            41 => 
            array (
                'id' => 57,
                'key' => 'read_categories',
                'table_name' => 'categories',
                'created_at' => '2022-05-23 13:35:29',
                'updated_at' => '2022-05-23 13:35:29',
            ),
            42 => 
            array (
                'id' => 58,
                'key' => 'edit_categories',
                'table_name' => 'categories',
                'created_at' => '2022-05-23 13:35:29',
                'updated_at' => '2022-05-23 13:35:29',
            ),
            43 => 
            array (
                'id' => 59,
                'key' => 'add_categories',
                'table_name' => 'categories',
                'created_at' => '2022-05-23 13:35:29',
                'updated_at' => '2022-05-23 13:35:29',
            ),
            44 => 
            array (
                'id' => 60,
                'key' => 'delete_categories',
                'table_name' => 'categories',
                'created_at' => '2022-05-23 13:35:29',
                'updated_at' => '2022-05-23 13:35:29',
            ),
            45 => 
            array (
                'id' => 71,
                'key' => 'browse_audits',
                'table_name' => 'audits',
                'created_at' => '2022-05-29 07:38:35',
                'updated_at' => '2022-05-29 07:38:35',
            ),
            46 => 
            array (
                'id' => 72,
                'key' => 'read_audits',
                'table_name' => 'audits',
                'created_at' => '2022-05-29 07:38:35',
                'updated_at' => '2022-05-29 07:38:35',
            ),
            47 => 
            array (
                'id' => 73,
                'key' => 'edit_audits',
                'table_name' => 'audits',
                'created_at' => '2022-05-29 07:38:35',
                'updated_at' => '2022-05-29 07:38:35',
            ),
            48 => 
            array (
                'id' => 74,
                'key' => 'add_audits',
                'table_name' => 'audits',
                'created_at' => '2022-05-29 07:38:35',
                'updated_at' => '2022-05-29 07:38:35',
            ),
            49 => 
            array (
                'id' => 75,
                'key' => 'delete_audits',
                'table_name' => 'audits',
                'created_at' => '2022-05-29 07:38:35',
                'updated_at' => '2022-05-29 07:38:35',
            ),
            50 => 
            array (
                'id' => 76,
                'key' => 'browse_bulk_photos',
                'table_name' => 'bulk_photos',
                'created_at' => '2022-08-01 12:47:33',
                'updated_at' => '2022-08-01 12:47:33',
            ),
            51 => 
            array (
                'id' => 77,
                'key' => 'read_bulk_photos',
                'table_name' => 'bulk_photos',
                'created_at' => '2022-08-01 12:47:33',
                'updated_at' => '2022-08-01 12:47:33',
            ),
            52 => 
            array (
                'id' => 78,
                'key' => 'edit_bulk_photos',
                'table_name' => 'bulk_photos',
                'created_at' => '2022-08-01 12:47:33',
                'updated_at' => '2022-08-01 12:47:33',
            ),
            53 => 
            array (
                'id' => 79,
                'key' => 'add_bulk_photos',
                'table_name' => 'bulk_photos',
                'created_at' => '2022-08-01 12:47:33',
                'updated_at' => '2022-08-01 12:47:33',
            ),
            54 => 
            array (
                'id' => 80,
                'key' => 'delete_bulk_photos',
                'table_name' => 'bulk_photos',
                'created_at' => '2022-08-01 12:47:33',
                'updated_at' => '2022-08-01 12:47:33',
            ),
        ));
        
        
    }
}