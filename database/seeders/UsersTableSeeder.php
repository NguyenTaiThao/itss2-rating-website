<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Admin',
                'email' => 'admin@argon.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Thao',
                'email' => 'thao@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Mung',
                'email' => 'mung@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Long',
                'email' => 'long@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Quang',
                'email' => 'quang@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Luat',
                'email' => 'luat@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Chien',
                'email' => 'chien@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
