<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $role = new Role;
        $role->nombre = 'Admin';
        $role->descripcion = 'Ese usuario tiene todo los permisos disponibles';

        $role->save();

        $user = new User;
        $user->role_id = '1';
        $user->name = 'Admin';
        $user->email = 'admin@trufi.com';
        $user->password = bcrypt('password');

        $user->save();
    }
}
