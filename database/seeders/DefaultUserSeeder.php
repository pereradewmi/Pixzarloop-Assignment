<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@backend.com'],
            [
                'name' => 'Admin',
                'email' => 'admin@backend.com',
                'password' => Hash::make('admin@123'),
            ]
        );
    }
}
