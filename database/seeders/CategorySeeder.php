<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(
            [
                'name' => 'Personal',
                'description' => fake()->sentence,
            ]
        );

        Category::create(
            [
                'name' => 'Trabajo',
                'description' => fake()->sentence,
            ]
        );

        Category::create(
            [
                'name' => 'Estudios',
                'description' => fake()->sentence,
            ]
        );

        Category::create(
            [
                'name' => 'Familia',
                'description' => fake()->sentence,
            ]
        );
    }
}
