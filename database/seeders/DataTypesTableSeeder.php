<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'App\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 1,
                'details' => '{"order_column":"name","order_display_column":"name","order_direction":"asc","default_search_key":"name","scope":null}',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-06-26 06:47:49',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'App\\Models\\Role',
                'policy_name' => NULL,
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 1,
                'details' => '{"order_column":"name","order_display_column":"name","order_direction":"asc","default_search_key":"name","scope":null}',
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-06-09 13:47:49',
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'venues',
                'slug' => 'venues',
                'display_name_singular' => 'Venue',
                'display_name_plural' => 'Venues',
                'icon' => 'voyager-shop',
                'model_name' => 'App\\Models\\Venue',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 1,
                'details' => '{"order_column":"created_at","order_display_column":"name","order_direction":"desc","default_search_key":"name","scope":null}',
                'created_at' => '2022-05-23 12:32:53',
                'updated_at' => '2022-05-27 14:51:38',
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'events',
                'slug' => 'events',
                'display_name_singular' => 'Event',
                'display_name_plural' => 'Events',
                'icon' => 'voyager-calendar',
                'model_name' => 'App\\Models\\Event',
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Gallery\\EventsController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 1,
                'details' => '{"order_column":"date","order_display_column":"date","order_direction":"asc","default_search_key":"date","scope":null}',
                'created_at' => '2022-05-23 12:48:28',
                'updated_at' => '2022-07-04 14:27:48',
            ),
            5 => 
            array (
                'id' => 10,
                'name' => 'photos',
                'slug' => 'photos',
                'display_name_singular' => 'Photo',
                'display_name_plural' => 'Photos',
                'icon' => 'voyager-photos',
                'model_name' => 'App\\Models\\Photo',
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Gallery\\PhotosController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 1,
                'details' => '{"order_column":"id","order_display_column":"id","order_direction":"asc","default_search_key":"event_id","scope":null}',
                'created_at' => '2022-05-23 13:16:22',
                'updated_at' => '2022-07-06 11:51:31',
            ),
            6 => 
            array (
                'id' => 12,
                'name' => 'categories',
                'slug' => 'categories',
                'display_name_singular' => 'Category',
                'display_name_plural' => 'Categories',
                'icon' => 'voyager-categories',
                'model_name' => 'App\\Models\\Category',
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Gallery\\CategoriesController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 1,
                'details' => '{"order_column":"name","order_display_column":"name","order_direction":"asc","default_search_key":"name","scope":null}',
                'created_at' => '2022-05-23 13:35:28',
                'updated_at' => '2022-06-26 05:54:56',
            ),
            7 => 
            array (
                'id' => 17,
                'name' => 'audits',
                'slug' => 'audits',
                'display_name_singular' => 'Data Audit',
                'display_name_plural' => 'Data Audits',
                'icon' => 'voyager-window-list',
                'model_name' => 'App\\Models\\Audit',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 0,
                'server_side' => 1,
                'details' => '{"order_column":"updated_at","order_display_column":"updated_at","order_direction":"desc","default_search_key":"auditable_type","scope":null}',
                'created_at' => '2022-05-29 07:38:35',
                'updated_at' => '2022-06-01 13:15:22',
            ),
            8 => 
            array (
                'id' => 19,
                'name' => 'bulk_photos',
                'slug' => 'bulk-photos',
                'display_name_singular' => 'Bulk Photo',
                'display_name_plural' => 'Bulk Photos',
                'icon' => NULL,
                'model_name' => 'App\\Models\\BulkPhoto',
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Gallery\\BulkPhotosController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2022-08-01 12:47:33',
                'updated_at' => '2022-08-01 14:00:14',
            ),
        ));
        
        
    }
}