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
                'name' => 'Patrick Oryono',
                'email' => 'patricken08@live.com',
                'password' => bcrypt('password')
            ]
        ];

        foreach ($users as $user){
            \App\User::create($user);
        }
    }
}
