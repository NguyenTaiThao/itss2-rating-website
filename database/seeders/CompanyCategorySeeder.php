<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_categories')->insert([
            [
                'name' => 'Shoes',
            ],
            [
                'name' => 'Food & Drink',
            ],
            [
                'name' => 'Clothings',
            ],
            [
                'name' => 'Glasses',
            ],
        ]);
    }
}
