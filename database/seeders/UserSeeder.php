<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@gmail.com',
            'name' => 'admin',
            'address' => 'syria',
            'phone' => '0987456321',
            'password' => Hash::make('11111111'),
            'role'=>'admin'
        ]);

        User::create([
            'email' => 'shahd@gmail.com',
            'name' => 'shahd',
            'address' => 'syria',
            'phone' => '0987456355',
            'password' => Hash::make('22222222'),
            'role'=>'customer'
        ]);
    }
}
