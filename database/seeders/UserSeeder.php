<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Test User A',
            'email'    => 'user_a@gmail.com',
            'password' => Hash::make('qwerty12'),
        ]);

        User::create([
            'name'     => 'Test User B',
            'email'    => 'user_b@gmail.com',
            'password' => Hash::make('qwerty12'),
        ]);

        User::create([
            'name'     => 'Test User C',
            'email'    => 'user_c@gmail.com',
            'password' => Hash::make('qwerty12'),
        ]);
    }
}
