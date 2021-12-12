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
                'name' => '靴',
            ],
            [
                'name' => '衣服',
            ],
            [
                'name' => 'マフラー'
            ],
            [
                'name' => '帽子'
            ],
            [
                'name' => '眼鏡'
            ],
            [
                'name' => 'ネクタイ'
            ],
        ]);
    }
}