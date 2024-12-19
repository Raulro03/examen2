<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory(15)->create();

        $categories->each(function ($category) {
            $subcategories = $category->subcategories()->saveMany(
                Subcategory::factory(5)->make()
            );


            $subcategories->each(function ($subcategory) {
                $products = $subcategory->products()->saveMany(
                    Product::factory(20)->make()
                );

                $products->each(function ($product) use ($subcategory) {
                    $product->subcategories()->attach($subcategory->id);
                });
            });
        });
    }
}
