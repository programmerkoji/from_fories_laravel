<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostCategory>
 */
class PostCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $post_count = Post::count();
        $category_count = Category::count();

        return [
            'post_id' => $this->faker->numberBetween(1, $post_count),
            'category_id' => $this->faker->numberBetween(1, $category_count),
        ];
    }
}
