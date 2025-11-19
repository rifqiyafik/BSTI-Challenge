<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view products',
            'create products',
            'edit products',
            'delete products',
        ];

        $createdPermissions = collect($permissions)->map(function ($permission) {
            return Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        });

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        $adminRole->syncPermissions($createdPermissions);

        $viewProductsPermission = Permission::firstOrCreate(['name' => 'view products']);
        $userRole->syncPermissions([$viewProductsPermission]);

        $admin = User::firstOrCreate(
            ['email' => 'rifqiyafika50@gmail.com'], // Kriteria unik untuk mencari
            [
                'name' => 'Rifqi Yafik',
                'password' => Hash::make('Yagamie_12'),
            ]
        );
        $admin->assignRole('admin');

        $user = User::firstOrCreate(
            ['email' => 'Yagamiee@gmail.com'], // Kriteria unik untuk mencari
            [
                'name' => 'Yagamiee',
                'password' => Hash::make('Yagamie_12'),
            ]
        );
        $user->assignRole('user');
    }
}
