<?php

use Illuminate\Database\Seeder;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'faggs241w@mail.ru',
            'password' => bcrypt('qwerty777'),
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@mail.ru',
            'password' => bcrypt('qwerty777'),
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@mail.ru',
            'password' => bcrypt('qwerty777'),
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user3',
            'email' => 'user3@mail.ru',
            'password' => bcrypt('qwerty777'),
            'created_at' => now(),
        ]);
    }
}
