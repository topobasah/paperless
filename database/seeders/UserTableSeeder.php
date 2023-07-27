<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin 
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('makan4j4'),
                'phone' => '081122334455',
                'role' => 'admin',
                'status' => 'active'
            ],

            // Staff
            [
                'name' => 'Agung',
                'username' => 'radeck',
                'email' => 'tbasah@gmail.com',
                'password' => Hash::make('1234'),
                'phone' => '08561892608',
                'role' => 'anggota',
                'status' => 'active'
            ]
        ]);
    }
}
