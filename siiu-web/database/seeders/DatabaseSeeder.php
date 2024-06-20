<?php

namespace Database\Seeders;

use App\Models\InformacionPersonal;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // \App\Models\User::factory(10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('informacion_personal')->truncate();
        DB::statement('ALTER TABLE informacion_personal AUTO_INCREMENT = 1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(RoleSeeder::class);
        
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('1234'), // Recuerda cambiar esto por la contraseña real
        ])->assignRole('Admin');

        

        
        
    }
}
