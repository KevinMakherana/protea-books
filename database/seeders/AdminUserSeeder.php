<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@proteabooks.test'],
            [
                'name' => 'Protea Books Admin',
                'password' => 'password',
                'email_verified_at' => now(),
            ]
        );
    }
}
