<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{


     
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin' => 1,
        ]);

        \App\Models\User::create([
            'name' => 'Member',
            'email' => 'member@gmail.com',
            'password' => bcrypt('rahasia'),
            'isAdmin' => 0,
        ]);

    }
}
