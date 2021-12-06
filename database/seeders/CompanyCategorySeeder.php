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
                'name' => '食べ物と飲み物',
            ],
            [
                'name' => '衣服',
            ],
            [
                'name' => '車',
            ],
            [
                'name' => '自転車',
            ],
            [
                'name' => '電子家具',
            ],
            [
                'name' => '電子デバイス',
            ],
            [
                'name' => '旅行',
            ],
            [
                'name' => '教育',
            ],
            [
                'name' => '不動産',
            ],
            [
                'name' => 'エンターテイメント',
            ],

        ]);
    }
}
