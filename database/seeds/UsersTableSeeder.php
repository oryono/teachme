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
                'name' => 'Patrick One',
                'email' => 'patricken08@live.com',
                'username' => 'oryonop',
                'password' => bcrypt('password')
            ],

            [
                'name' => 'Patrick Two',
                'email' => 'patricken08@gmail.com',
                'username' => 'oryonopatrick',
                'password' => bcrypt('password')
            ],

            [
                'name' => 'Patrick Three',
                'email' => 'oryonop@gmail.com',
                'username' => 'patrick',
                'password' => bcrypt('password')
            ],

            [
                'name' => 'Patrick Four',
                'email' => 'patricken08+1@live.com',
                'username' => 'patrickoryono',
                'password' => bcrypt('password')
            ]
        ];

        foreach ($users as $user){
            \App\User::create($user);
        }
    }
}
