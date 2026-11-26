<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@kursusku.test'],
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => 'Admin12345!',
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'user@kursusku.test'],
            [
                'name' => 'Pengguna KursusKu',
                'username' => 'user',
                'password' => 'User12345!',
                'role' => 'user',
            ]
        );
    }
}
