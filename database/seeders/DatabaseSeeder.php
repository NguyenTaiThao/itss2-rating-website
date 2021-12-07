<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Support\Facades\DB;
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
        $this->call([AdminSeeder::class]);
        $this->call([CompanyCategorySeeder::class]);
        $this->call([ProductCategorySeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([BrandSeeder::class]);
        $this->call([PostSeeder::class]);
        $this->call([ReviewSeeder::class]);
    }
}
