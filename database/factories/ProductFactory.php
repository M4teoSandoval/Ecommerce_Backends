<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{


    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'description'=>fake()->paragraph(),
            'price' =>fake()->randomFloat(2,10000,1000000),
            'url_image' => fake()->imageUrl(640,480,'products',true),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
