<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            [
                'name' => '靴',
            ],
            [
                'name' => '衣服',
            ],
            [
                'name' => 'マフラー',
            ],
            [
                'name' => '帽子',
            ],
            [
                'name' => 'ワイン',
            ],
            [
                'name' => 'ビール',
            ],
            [
                'name' => 'スマホ',
            ],
            [
                'name' => 'タブレット',
            ],
            [
                'name' => 'タブレット',
            ],
        ]);
    }
}
