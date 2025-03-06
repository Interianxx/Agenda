<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use Illuminate\Validation\Rules\Unique;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            Contact::create(
                [
                    'user_id' => User::inRandomOrder()->first()->id,
                    'category_id' => Category::inRandomOrder()->first()->id,
                    'name' => fake()->name,
                    'email' => fake()->unique()->safeEmail,
                    'phone' => fake()->unique()->phoneNumber,
                    'address' => fake()->address,
                ]
            );
        }
    }
}
