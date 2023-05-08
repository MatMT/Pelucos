<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        DB::table('users')->insert([
            [
                'nombre' => 'Admin',
                'email' => 'admin@correo.com',
                'password' => Hash::make('admin123'),
                'confirmado' => true,
                'admin' => true
            ]
        ]);

        $this->call(ServicesSeeder::class);
    }
}
