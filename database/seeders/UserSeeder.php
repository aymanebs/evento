<?php

namespace Database\Seeders;

use App\Models\Organiser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('12345678')
            ],

            [
                'name' => 'user',
                'email' => 'user@mail.com',
                'password' => bcrypt('12345678')
            ],

            [
                'name' => 'organiser',
                'email' => 'organiser@mail.com',
                'password' => bcrypt('12345678')
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);

            if ($userData['name'] === 'organiser') {

                Organiser::create([
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
