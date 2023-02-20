<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        if (!User::where('email', 'hola@gmail.com')->exists()) {
            // Crear el usuario
            User::create([
                'name' => 'superrrhh',
                'email' => 'superrrhh@gmail.com',
                'password' => Hash::make('1234')
            ])->assignRole('SuperAdmin');
        }

    }
    
}
