<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

         // Seed Users
         \App\Models\User::factory(10)->create();

         // Seed Categories
         \App\Models\Category::factory(10)->create();
 
         // Seed Products
         \App\Models\Product::factory(10)->create();

    }
}
