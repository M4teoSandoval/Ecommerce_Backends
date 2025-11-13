<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
 
    public function run(): void
    {
        $this -> call([
            CategorySeeder::class,
            BrandSeeder::class,
        ]);
        Product::factory(1000)->create();
    }
}
