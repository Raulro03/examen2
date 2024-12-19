<?php

namespace Database\Factories;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SubcategoryFactory extends Factory{
    protected $model = Subcategory::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),//
'description' => $this->faker->text(),
'category_id' => $this->faker->randomNumber(),
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),
        ];
    }
}
