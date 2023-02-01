<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userCount = User::count();
        $categoryCount = Category::count();
        $title = fake()->sentence(3);
        $slug = (string)str($title)->slug;

        return [
            'slug'=> $slug,
            'title'=> $title,
            'description'=> fake()->sentence(),
            'user_id'=> rand(1,$userCount),
            'category_id'=> rand(1,$categoryCount),
            'content'=>fake()->text(400),
        ];
    }
}
