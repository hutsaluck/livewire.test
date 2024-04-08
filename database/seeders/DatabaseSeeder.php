<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Country;
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

        $country = Country::create(['name' => 'United Kingdom']);
        $country->cities()->create(['name' => 'London']);
        $country->cities()->create(['name' => 'Manchester']);
        $country->cities()->create(['name' => 'Liverpool']);

        $country = Country::create(['name' => 'United States']);
        $country->cities()->create(['name' => 'Washington']);
        $country->cities()->create(['name' => 'New York City']);
        $country->cities()->create(['name' => 'Denver']);

        /*$this->call([
            UserSeeder::class,
        ]);*/
    }
}
