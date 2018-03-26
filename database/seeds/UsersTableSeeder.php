<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'firstname' => 'Patrick',
                'lastname' => 'Oryono',
                'email' => 'patricken08@gmail.com',
                'password' => bcrypt('password')
            ],

            [
                'firstname' => 'Patrick',
                'lastname' => 'Oryono',
                'email' => 'patricken08@live.com',
                'password' => bcrypt('password')
            ],

            [
                'firstname' => 'Patrick',
                'lastname' => 'Oryono',
                'email' => 'patricken08+1@gmail.com',
                'password' => bcrypt('password')
            ],

            [
                'firstname' => 'Patrick',
                'lastname' => 'Oryono',
                'email' => 'oryonop@gmail.com',
                'password' => bcrypt('password')
            ]
        ];

        foreach ($users as $user){
            \App\User::create($user);
        }
    }
}
