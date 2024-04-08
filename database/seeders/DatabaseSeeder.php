<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();
        $categories = collect(Category::pluck('id'));
        Product::factory(50)
            ->create()
            ->each(function (Product $product) use ($categories) {
                $product->categories()->sync($categories->random(2));
            });

        /*$this->call([
            UserSeeder::class,
        ]);*/
    }
}
