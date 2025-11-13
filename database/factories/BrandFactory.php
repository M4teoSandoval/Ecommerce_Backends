<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    protected $model = Brand::class;
    public function definition(): array
    {
        $brands = ['Apple', 'Samsung', 'Sony', 'LG', 'Dell', 'HP', 'Lenovo', 'Asus', 'Acer', 'Microsoft'];
        return [
           'name' => $this->faker->randomElement($brands),
        ];
    }
}
