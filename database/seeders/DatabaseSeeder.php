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
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'role' => 'admin',  
            'address' => 'Admin Address',
            'city' => 'Admin City',
            'cp' => '12345',
            'password' => bcrypt('password'), 
        ]);

        User::factory()->create([
            'name' => 'Farma1 User',
            'email' => 'farma1@gmail.com',
            'role' => 'pharmacy',  
            'address' => 'Farma1 Address',
            'city' => 'Farma1 City',
            'cp' => '03300',
            'password' => bcrypt('password'), 
        ]);

        User::factory()->create([
            'name' => 'Farma2 User',
            'email' => 'farma2@gmail.com',
            'role' => 'pharmacy',  
            'address' => 'Farma2 Address',
            'city' => 'Farma2 City',
            'cp' => '03310',
            'password' => bcrypt('password'), 
        ]);
    }
}
