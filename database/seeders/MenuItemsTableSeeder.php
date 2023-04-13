<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => 1,
                'title' => 'Dashboard',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 1,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-20 14:15:06',
                'route' => 'voyager.dashboard',
                'parameters' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'menu_id' => 1,
                'title' => 'Media',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-folder',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 8,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-29 07:40:18',
                'route' => 'voyager.media.index',
                'parameters' => 'null',
            ),
            2 => 
            array (
                'id' => 3,
                'menu_id' => 1,
                'title' => 'Users',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-person',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 6,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-23 13:17:13',
                'route' => 'voyager.users.index',
                'parameters' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'menu_id' => 1,
                'title' => 'Roles',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lock',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 7,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-29 07:40:18',
                'route' => 'voyager.roles.index',
                'parameters' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'menu_id' => 1,
                'title' => 'Voyager Tools',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-tools',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 11,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-29 07:00:39',
                'route' => NULL,
                'parameters' => '',
            ),
            5 => 
            array (
                'id' => 6,
                'menu_id' => 1,
                'title' => 'Menu Builder',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 3,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-23 13:09:01',
                'route' => 'voyager.menus.index',
                'parameters' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'menu_id' => 1,
                'title' => 'Database',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-data',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 1,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-23 13:09:00',
                'route' => 'voyager.database.index',
                'parameters' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'menu_id' => 1,
                'title' => 'Compass',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-compass',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 4,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-23 13:08:59',
                'route' => 'voyager.compass.index',
                'parameters' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'menu_id' => 1,
                'title' => 'BREAD',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-bread',
                'color' => NULL,
                'parent_id' => 5,
                'order' => 2,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-23 13:09:01',
                'route' => 'voyager.bread.index',
                'parameters' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'menu_id' => 1,
                'title' => 'Settings',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-settings',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 10,
                'created_at' => '2022-05-20 14:15:06',
                'updated_at' => '2022-05-29 07:40:19',
                'route' => 'voyager.settings.index',
                'parameters' => NULL,
            ),
            10 => 
            array (
                'id' => 15,
                'menu_id' => 1,
                'title' => 'Venues',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-shop',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 2,
                'created_at' => '2022-05-23 12:34:47',
                'updated_at' => '2022-05-23 12:38:52',
                'route' => 'voyager.venues.index',
                'parameters' => 'null',
            ),
            11 => 
            array (
                'id' => 16,
                'menu_id' => 1,
                'title' => 'Events',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-calendar',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 3,
                'created_at' => '2022-05-23 12:48:29',
                'updated_at' => '2022-05-23 12:59:40',
                'route' => 'voyager.events.index',
                'parameters' => 'null',
            ),
            12 => 
            array (
                'id' => 17,
                'menu_id' => 1,
                'title' => 'Photos',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-photos',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 5,
                'created_at' => '2022-05-23 13:16:24',
                'updated_at' => '2022-05-23 13:50:42',
                'route' => 'voyager.photos.index',
                'parameters' => NULL,
            ),
            13 => 
            array (
                'id' => 18,
                'menu_id' => 1,
                'title' => 'Categories',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-categories',
                'color' => NULL,
                'parent_id' => NULL,
                'order' => 4,
                'created_at' => '2022-05-23 13:35:29',
                'updated_at' => '2022-05-23 13:50:42',
                'route' => 'voyager.categories.index',
                'parameters' => NULL,
            ),
            14 => 
            array (
                'id' => 21,
                'menu_id' => 1,
                'title' => 'Data Audits',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-window-list',
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 9,
                'created_at' => '2022-05-29 07:38:35',
                'updated_at' => '2022-06-01 13:14:41',
                'route' => 'voyager.audits.index',
                'parameters' => 'null',
            ),
            15 => 
            array (
                'id' => 22,
                'menu_id' => 2,
                'title' => 'Dashboard',
                'url' => '/photographer',
                'target' => '_self',
                'icon_class' => NULL,
                'color' => '#000000',
                'parent_id' => NULL,
                'order' => 12,
                'created_at' => '2022-06-08 15:58:35',
                'updated_at' => '2022-06-08 15:59:38',
                'route' => NULL,
                'parameters' => '',
            ),
            16 => 
            array (
                'id' => 23,
                'menu_id' => 2,
                'title' => 'Photos',
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-photos',
                'color' => '#4b5462',
                'parent_id' => NULL,
                'order' => 13,
                'created_at' => '2022-06-08 16:00:30',
                'updated_at' => '2022-06-09 12:47:07',
                'route' => 'voyager.photos.index',
                'parameters' => 'null',
            ),
        ));
        
        
    }
}