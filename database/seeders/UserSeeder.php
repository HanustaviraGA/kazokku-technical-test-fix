<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'id' => md5(rand(0, 100).date('Y-m-d H:i:s')),
            'name' => 'Admin',
            'email' => 'admin@kazokku.com',
            'role_id' => 'ADM001',
            'password' => Hash::make('kazokku_admin123'),
        ]);

        User::factory()->create([
            'id' => md5(rand(0, 100).date('Y-m-d H:i:s')),
            'name' => 'User',
            'email' => 'user@kazokku.com',
            'role_id' => 'USR001',
            'password' => Hash::make('kazokku_user123'),
        ]);
    }
}
