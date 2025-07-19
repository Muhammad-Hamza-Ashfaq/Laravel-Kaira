<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
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
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'image' => 'default-product.jpg',
            'price' => $this->faker->randomFloat(2, 10, 200),
            'discounted_price' => $this->faker->optional()->randomFloat(2, 5, 150),
            'stock_quantity' => $this->faker->numberBetween(0, 100),
            'is_active' => true,
            'is_featured' => $this->faker->boolean(25),
            'is_new_arrival' => $this->faker->boolean(30),
            'is_best_selling' => $this->faker->boolean(20),
            'is_recommended' => $this->faker->boolean(15),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
        ];
    }
}
