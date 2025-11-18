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
        // Reset cached roles and permissions
        // app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view products',
            'create products',
            'edit products',
            'delete products',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Assign permissions to admin
        $adminRole->givePermissionTo(Permission::all());

        // Assign permissions to user
        $userRole->givePermissionTo('view products');

        // Create admin user
        $admin = User::create([
            'name' => 'Rifqi Yafik',
            'email' => 'rifqiyafika50@gmail.com',
            'password' => Hash::make('Yagamie_12'),
        ]);
        $admin->assignRole('admin');

        // Create regular user
        $user = User::create([
            'name' => 'Yagamiee',
            'email' => 'Yagamiee@gmail.com',
            'password' => Hash::make('Yagamie_12'),
        ]);
        $user->assignRole('user');
    }
}
