<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Customer1',
            'email' => 'customer1@customer.com',
            'password' => 'customer1',
        ]);
        User::create([
            'name' => 'Customer2',
            'email' => 'customer2@customer.com',
            'password' => 'customer2',
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin',
        ]);
    }
}
