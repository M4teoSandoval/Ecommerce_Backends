<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $category = [
            'Phones',
            'Computers',
            'Tablets',
            'Accessories',
            'Wearables',
            'Audio',
            'Cameras',
            'Gaming',
            'Smart Home',
            'Networking'
        ];
        return [
            'name' => $this->faker->randomElement($category),
        ];
    }
}
