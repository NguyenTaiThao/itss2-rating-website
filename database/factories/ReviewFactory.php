<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public static $userIds = [];
    public static $postIds = [];

    public function definition()
    {
        if (count(ReviewFactory::$userIds) < 1) {
            ReviewFactory::$userIds = User::all()->pluck('id');
        }
        if (count(ReviewFactory::$postIds) < 1) {
            ReviewFactory::$postIds = Post::all()->pluck('id');
        }
        return [
            'user_id' => $this->faker->randomElement(ReviewFactory::$userIds),
            'post_id' => $this->faker->randomElement(ReviewFactory::$postIds),
            'content' =>  $this->faker->paragraph(5, true),
            'rating' =>  $this->faker->randomElement([0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5]),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null)
        ];
    }
}
