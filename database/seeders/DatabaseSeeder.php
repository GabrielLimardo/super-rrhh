<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $SuperAdmin = Role::Create(['name'=>'SuperAdmin']);
        $director = Role::Create(['name'=>'director']);
        $empleador = Role::Create(['name'=>'empleador']);
        $empleado = Role::Create(['name'=>'empleado']);
        $rrhh = Role::Create(['name'=>'rrhh']);

        Permission::create(['name' => 'users.index'])->syncRoles($SuperAdmin,$director,$empleador,$empleado, $rrhh );
        // Permission::create(['name' => 'users.edit'])->syncRoles($role1);
        // Permission::create(['name' => 'users.destroy'])->syncRoles($role1);
        // Permission::create(['name' => 'product.index'])->syncRoles($role1,$role2);
        // Permission::create(['name' => 'list.index'])->syncRoles($role1,$role2);
        // Permission::create(['name' => 'list.edit'])->syncRoles($role1,$role2);
        // Permission::create(['name' => 'list.destroy'])->syncRoles($role1,$role2);
        // Permission::create(['name' => 'add'])->syncRoles($role1,$role2);
        // Permission::create(['name' => 'filterProduct'])->syncRoles($role1,$role2);
    }
    
}
