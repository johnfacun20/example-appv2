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
            'name' => "John Facun",
            'email' => 'john@gmail.com',
            'age' => 33,
            'account_type' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
    }
}
