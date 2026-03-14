<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_permissions = [
            'create role',
            'edit role',
            'delete role',
            'revoke role',
            'assign role'
        ];

        $user_permissions = [
            'create user',
            'delete user',
            'edit user',
            'approve user',
            'revoke user'
        ]; 

        $permissions = array_merge($role_permissions, $user_permissions);

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $super_admin_role = Role::create(['name' => 'Super Admin']);
        $super_admin_role->syncPermissions(Permission::all());
        
        User::create([
            'name' => "Tristan Jay Amit",
            'email'=> 'tristanjayamit0813@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
