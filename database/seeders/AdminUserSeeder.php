<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('admin20#25'), // Contraseña por defecto
            ]
        );

        if ($user->wasRecentlyCreated) {
            $this->command->info('Usuario administrador creado: admin@example.com / admin20#25');
        } else {
            $this->command->info('El usuario administrador ya existía: admin@example.com');
        }
    }
}
