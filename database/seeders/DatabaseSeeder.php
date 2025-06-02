<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Quote;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $Products = Product::factory(50)->create();

        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
