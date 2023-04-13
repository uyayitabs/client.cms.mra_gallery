<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {        
        $this->call([
            VenuesTableSeeder::class,
            CategoriesTableSeeder::class,
            EventsTableSeeder::class,
            PhotosTableSeeder::class,
            UsersTableSeeder::class,
            PhotographerUsersTableSeeder::class,
            MenusTableSeeder::class,
            MenuItemsTableSeeder::class,
            DataRowsTableSeeder::class,
            DataTypesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            SettingsTableSeeder::class
        ]);
    }
}
