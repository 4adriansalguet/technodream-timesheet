<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        \App\Models\User::create([
            'name' => 'TD Admin',
            'firstname' => 'first',
            'middlename' => 'middle',
            'lastname' => 'last',
            'gender' => 'Male',
            'position' => 'Programmer',
            'email' => 'admin.technodream@gmail.com',
            'password' => Hash::make('admin.technodream@gmail.com'),
            'role' => 'Admin'
        ]);

        \App\Models\User::create([
            'name' => 'TD User',
            'firstname' => 'first',
            'middlename' => 'middle',
            'lastname' => 'last',
            'gender' => 'Male',
            'position' => 'Programmer',
            'email' => 'user.technodream@gmail.com',
            'password' => Hash::make('user.technodream@gmail.com'),
            'role' => 'Employee'
        ]);
    }
}
