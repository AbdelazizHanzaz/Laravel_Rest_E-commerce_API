<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
          // Retrieve a random category ID from the categories table
    $categoryIds = Category::pluck('id')->toArray();
    $categoryId = fake()->randomElement($categoryIds);

    // Retrieve a random user ID from the users table
    $userIds = User::pluck('id')->toArray();
    $userId = fake()->randomElement($userIds);

        return [
            'name' => fake()->sentence(3),
            'description' => fake()->paragraph,
            'price' => fake()->randomFloat(2, 10, 1000),
            'barcode' => fake()->unique()->ean13,
            'category_id' => $categoryId,
            'user_id' => $userId, 
            'stock_quantity' => fake()->numberBetween(0, 100),
            'image_url' => fake()->imageUrl(200, 200),
        ];
    }
}
