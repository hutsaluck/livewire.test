<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
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
    public function definition(): array
    {
        $categories = collect(Category::pluck('id'));
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(50),
            'color' => collect(Product::COLOR_LIST)->random(),
        ];
    }
}
