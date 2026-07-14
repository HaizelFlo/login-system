<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'Ver usuarios',
                'description' => 'Permite consultar el listado de usuarios.',
            ],
            [
                'name' => 'Crear usuarios',
                'description' => 'Permite registrar nuevos usuarios.',
            ],
            [
                'name' => 'Editar usuarios',
                'description' => 'Permite modificar usuarios existentes.',
            ],
            [
                'name' => 'Eliminar usuarios',
                'description' => 'Permite eliminar usuarios.',
            ],
            [
                'name' => 'Ver roles',
                'description' => 'Permite consultar el listado de roles.',
            ],
            [
                'name' => 'Crear roles',
                'description' => 'Permite registrar nuevos roles.',
            ],
            [
                'name' => 'Editar roles',
                'description' => 'Permite modificar roles existentes.',
            ],
            [
                'name' => 'Eliminar roles',
                'description' => 'Permite eliminar roles.',
            ],
            [
                'name' => 'Ver permisos',
                'description' => 'Permite consultar el listado de permisos.',
            ],
            [
                'name' => 'Crear permisos',
                'description' => 'Permite registrar nuevos permisos.',
            ],
            [
                'name' => 'Editar permisos',
                'description' => 'Permite modificar permisos existentes.',
            ],
            [
                'name' => 'Eliminar permisos',
                'description' => 'Permite eliminar permisos.',
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                ['description' => $permission['description']]
            );
        }

        $administrator = Role::updateOrCreate(
            ['name' => 'Administrador'],
            ['description' => 'Acceso total al sistema.']
        );

        $userRole = Role::updateOrCreate(
            ['name' => 'Usuario'],
            ['description' => 'Acceso limitado al sistema.']
        );

        $administrator->permissions()->sync(
            Permission::pluck('id')->toArray()
        );

        $viewUsersPermission = Permission::where(
            'name',
            'Ver usuarios'
        )->first();

        $userRole->permissions()->sync(
            $viewUsersPermission ? [$viewUsersPermission->id] : []
        );
    }
}