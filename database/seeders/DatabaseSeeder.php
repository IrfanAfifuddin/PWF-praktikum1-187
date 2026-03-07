<?php

namespace Database\Seeders;

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
        // Create 1 User
        $user = User::factory()->create([
            'name' => 'First User',
            'email' => 'user1@example.com',
        ]);

        // Create 20 Products for that user
        $products = \App\Models\Product::factory(20)->create([
            'user_id' => $user->id
        ]);

        // Create 10 Kategoris (we assign them randomly to the created products)
        \App\Models\Kategori::factory(10)->create(function () use ($products) {
            return ['product_id' => $products->random()->id];
        });
    }
}
