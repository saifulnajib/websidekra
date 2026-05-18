<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Membuat akun admin untuk aplikasi SIDEKRA.
     */
    public function run(): void
    {
        $users = [
            [
                'name'              => 'Super Admin SIDEKRA',
                'email'             => 'admin@sidekra.id',
                'password'          => Hash::make('Admin@Sidekra2025'),
                'email_verified_at' => now(),
            ],
            [
                'name'              => 'Administrator',
                'email'             => 'administrator@sidekra.id',
                'password'          => Hash::make('Administrator@2025'),
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }

        $this->command->info('✅ User seeder berhasil dijalankan!');
        $this->command->table(
            ['Nama', 'Email', 'Password'],
            [
                ['Super Admin SIDEKRA', 'admin@sidekra.id',         'Admin@Sidekra2025'],
                ['Administrator',       'administrator@sidekra.id', 'Administrator@2025'],
            ]
        );
        $this->command->warn('⚠️  Segera ganti password setelah login pertama!');
    }
}
