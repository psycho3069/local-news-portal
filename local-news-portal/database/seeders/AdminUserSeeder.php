<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@newsnarayanganj.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        // Create editor user
        User::create([
            'name' => 'Editor',
            'email' => 'editor@newsnarayanganj.com',
            'password' => Hash::make('editor123'),
            'email_verified_at' => now(),
        ]);

        echo "Admin users created:\n";
        echo "1. Email: admin@newsnarayanganj.com, Password: admin123\n";
        echo "2. Email: editor@newsnarayanganj.com, Password: editor123\n";
    }
}
