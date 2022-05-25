<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => '01rahulnathe@gmail.com',
                'username' => 'rnathe',
                'user_type' => 'Administrator',
                'password' => bcrypt('pass@123456')
            ],
            [
                'email' => 'rahul8218@gmail.com',
                'username' => 'rahul8218',
                'user_type' => 'Guest',
                'password' => bcrypt('pass@123456')
            ]
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
