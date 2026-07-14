<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $administratorRole = Role::where(
            'name',
            'Administrador'
        )->firstOrFail();

        $administrator = User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('Admin1234*'),
                'role' => $administratorRole->name,
            ]
        );

        $administrator->roles()->sync([
            $administratorRole->id,
        ]);
    }
}