<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@church-platform.local'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $admin->assignRole('super_admin');

        $editor = User::updateOrCreate(
            ['email' => 'editor@church-platform.local'],
            [
                'name' => 'Editeur',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $editor->assignRole('editor');
    }
}
