<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                'name' => 'Argon.com',
                'email' => 'admin@argon.com',
                'password' => Hash::make('secret'),
                'logo_path' => 'https://www.iconspng.com/images/hello-kitty.jpg',
                'company_category_id' => 1,
                'is_active' => true,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Brand::factory()->count(100)->create();
    }
}
