<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'avatar' => 'users/May2022/dIfYrXBMAimThspcGdF3.png',
                'email_verified_at' => '2022-05-31 14:31:06',
                'password' => '$2y$10$NttKEHADavOhSVhu7PUpIu24H3WJwpchu7dZ/0Vzyuby5IY/mPPvC',
                'remember_token' => '1LfvfR136V32Q5ce0L0PvtrvybzXeFAevpjQNtITLLJHYN0tN2KaWQuyc6L3',
                'settings' => NULL,
                'phone' => '',
                'website' => '',
                'facebook' => '',
                'instagram' => '',
                'role_id' => 1,
                'created_at' => '2022-05-31 14:31:06',
                'updated_at' => '2022-05-31 14:31:06',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Astrid Jerde',
                'email' => 'rath.providenci@example.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => '2022-05-31 14:31:06',
                'password' => '$2y$10$BqW0pum5aLS5k290jTr/l.H9CocHUdR9AfxhQWM7HlM.rgAhLASR2',
                'remember_token' => 'aIpjri44782FMj8HM0BlDzFWArXzNiY86LB8oIk9Eqb4KEvlpf9mmmatQtJE',
                'settings' => NULL,
                'phone' => '',
                'website' => '',
                'facebook' => '',
                'instagram' => '',
                'role_id' => 3,
                'created_at' => '2022-05-31 14:31:06',
                'updated_at' => '2022-05-31 14:31:06',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Henri Williamson',
                'email' => 'idurgan@example.net',
                'avatar' => 'users/default.png',
                'email_verified_at' => '2022-05-31 14:31:06',
                'password' => '$2y$10$VTpd194AhT5JdRBy3awB6u0A8fD37gitc9wKH4uKd891dY/o6iKQS',
                'remember_token' => 'u93EMMlSpPS5btovaE8eC0GUBsdDr7NPIv3U97liW32k4Oqa2bOTbWyotYL7',
                'settings' => NULL,
                'phone' => '',
                'website' => '',
                'facebook' => '',
                'instagram' => '',
                'role_id' => 3,
                'created_at' => '2022-05-31 14:31:06',
                'updated_at' => '2022-05-31 14:31:06',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Erich Yost',
                'email' => 'pwhite@example.org',
                'avatar' => 'users/default.png',
                'email_verified_at' => '2022-05-31 14:31:06',
                'password' => '$2y$10$0HEmnVYSWcFSItSPGfBv6OvQX4Dn9q3eVJMDUMejyW5A6k.Ysk8yG',
                'remember_token' => '9Qtk9SllfrfF2GniB5WZ7651pgbgy9D32Unizzs2JQywVDts6m52WtgkjarS',
                'settings' => NULL,
                'phone' => '',
                'website' => '',
                'facebook' => '',
                'instagram' => '',
                'role_id' => 3,
                'created_at' => '2022-05-31 14:31:06',
                'updated_at' => '2022-05-31 14:31:06',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Maya Pfannerstill',
                'email' => 'white.taryn@example.net',
                'avatar' => 'users/default.png',
                'email_verified_at' => '2022-05-31 14:31:06',
                'password' => '$2y$10$8ccjZ5BjEg5wQp4pVYSxFuv22nCIN.Q3dGn7PlY79wkhrG/fRYK9a',
                'remember_token' => 'qNCpsNYJzblSKPYSU0nRioRhTcykEQJpSnRMcy5Q9852FuDy7os7pYeM9cwb',
                'settings' => NULL,
                'phone' => '',
                'website' => '',
                'facebook' => '',
                'instagram' => '',
                'role_id' => 3,
                'created_at' => '2022-05-31 14:31:06',
                'updated_at' => '2022-05-31 14:31:06',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Ramona Keebler',
                'email' => 'pspencer@example.net',
                'avatar' => 'users/default.png',
                'email_verified_at' => '2022-05-31 14:31:06',
                'password' => '$2y$10$NUJdSVMYZ1jLVbP.S6Nh0.Obv6fvFhUkVl7bduKWec4DYfZyViDne',
                'remember_token' => 'VDwhCS5f17utAjR3a9qlT7JMcJmXOfUxFX79ZJZRjvgnF6gV66kssOtZi1Zp',
                'settings' => NULL,
                'phone' => '',
                'website' => '',
                'facebook' => '',
                'instagram' => '',
                'role_id' => 3,
                'created_at' => '2022-05-31 14:31:06',
                'updated_at' => '2022-05-31 14:31:06',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Horacio Roberts',
                'email' => 'sydni.king@example.net',
                'avatar' => 'users/default.png',
                'email_verified_at' => '2022-05-31 14:31:06',
                'password' => '$2y$10$REt677m3FH6yulDk.x.XPueufMOe4NA0q8vEQ/KBUazXOI5M0F9su',
                'remember_token' => 'ZPCwGygn4x4H3Tm5KsuErJ4tXuNnq21H3E2eijka9Di1Zxit7OyS7DoNAPd7',
                'settings' => NULL,
                'phone' => '',
                'website' => '',
                'facebook' => '',
                'instagram' => '',
                'role_id' => 3,
                'created_at' => '2022-05-31 14:31:06',
                'updated_at' => '2022-05-31 14:31:06',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Kailee Walsh',
                'email' => 'guy13@example.org',
                'avatar' => 'users/default.png',
                'email_verified_at' => '2022-05-31 14:31:07',
                'password' => '$2y$10$rv7mFr.RcXIqp2vyPI2wuunvO.DV2d4iU77/S/YdLrJA1ov3//qqi',
                'remember_token' => 'GZCRQRRI08TkUnJBQrV6TNCy3dgx4dSjCxLlVXjLfWd8pfHsWyxougNBMHnn',
                'settings' => NULL,
                'phone' => '',
                'website' => '',
                'facebook' => '',
                'instagram' => '',
                'role_id' => 3,
                'created_at' => '2022-05-31 14:31:07',
                'updated_at' => '2022-05-31 14:31:07',
            ),
        ));
        
        
    }
}