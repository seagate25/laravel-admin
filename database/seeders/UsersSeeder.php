<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $users = [
            [ 
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin',
                'level' => 1,
                'status' => 1
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => '12345',
                'level' => 0,
                'status' => 1
            ],
            [
                'name' => 'Client',
                'username' => 'client',
                'email' => 'client@gmail.com',
                'password' => '12345',
                'level' => 0,
                'status' => 0
            ] 
        ];

        foreach($users as $user) {
            User::create([
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'level' => $user['level'],
                'status' => $user['status']
            ]);
        }
    }
}
