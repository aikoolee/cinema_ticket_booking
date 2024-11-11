<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'name' => 'Admin 1',
                'email' => 'admin1@admin.com',
                'password' => Hash::make('admin'),
            ],
            [
                'name' => 'Admin 2',
                'email' => 'admin2@admin.com',
                'password' => Hash::make('admin'),
            ],
        ]);
    }   
}
