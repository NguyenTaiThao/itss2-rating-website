<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public static $userIds = [];
    public static $productCategoryIds = [];

    public function definition()
    {
        if (count(PostFactory::$userIds) < 1) {
            PostFactory::$userIds = Brand::all()->pluck('id');
        }

        if (count(PostFactory::$productCategoryIds) < 1) {
            PostFactory::$productCategoryIds = ProductCategory::all()->pluck('id');
        }

        return [
            'user_id' => $this->faker->randomElement(PostFactory::$userIds),
            'title' => $this->faker->sentence(10, true),
            'content' => $this->faker->paragraph(10, true),
            'img_url' =>  $this->faker->image('storage/app/public/post-images',  640,  480),
            'product_category_id' => $this->faker->randomElement(PostFactory::$productCategoryIds),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null)
        ];
    }
}
