<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'Stealth',
            'last_name' => 'Solutions',
            'email' => 'stealth@email.com',
            'role' => 'Admin',
            'password' => Hash::make('1234admin'),
            'product_management' => 1,
            'category_management' => 1,
        ]);
    }
}
