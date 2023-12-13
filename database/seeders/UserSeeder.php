<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $faker = Faker::create();
        DB::table('users')->insert([
            // Tambahkan kolom lain sesuai kebutuhan
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);
        DB::table('users')->insert([
            // Tambahkan kolom lain sesuai kebutuhan
            'name' => 'User',
            'email' => 'user@email.com',
            'password' => Hash::make('user1234'),
            'role' => 'user'
        ]);
    }
}
