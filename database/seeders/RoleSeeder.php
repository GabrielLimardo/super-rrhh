<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $SuperAdmin = Role::Create(['name'=>'SuperAdmin']);
        $director = Role::Create(['name'=>'director']);
        $empleador = Role::Create(['name'=>'empleador']);
        $empleado = Role::Create(['name'=>'empleado']);
        $rrhh = Role::Create(['name'=>'rrhh']);

        Permission::create(['name' => 'company settings'])->syncRoles('SuperAdmin');

        Permission::create(['name' => 'company index'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'company edit'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'company destroy'])->syncRoles('SuperAdmin');

        Permission::create(['name' => 'branch index'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'branch edit'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'branch destroy'])->syncRoles('SuperAdmin');

        Permission::create(['name' => 'management index'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'management edit'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'management destroy'])->syncRoles('SuperAdmin');

        
        Permission::create(['name' => 'roles index'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'roles edit'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'roles destroy'])->syncRoles('SuperAdmin');

                
        Permission::create(['name' => 'visual index'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'visual edit'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'visual destroy'])->syncRoles('SuperAdmin');

       Permission::create(['name' => 'document type index'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'document type edit'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'document type destroy'])->syncRoles('SuperAdmin');

        Permission::create(['name' => 'payment index'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'payment edit'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'payment destroy'])->syncRoles('SuperAdmin');

        Permission::create(['name' => 'holidays index'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'holidays edit'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'holidays destroy'])->syncRoles('SuperAdmin');

        Permission::create(['name' => 'users index'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'users edit'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'users destroy'])->syncRoles('SuperAdmin');

        Permission::create(['name' => 'individual upload'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'split upload'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'masive upload'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'signer document'])->syncRoles('SuperAdmin');

        Permission::create(['name' => 'tool salary pay index'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'tool holidays index'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'tool signer index'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'tool staff search index'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'tool staff development index'])->syncRoles('SuperAdmin');
        Permission::create(['name' => 'tool rrhh help index'])->syncRoles('SuperAdmin');

    }
}
