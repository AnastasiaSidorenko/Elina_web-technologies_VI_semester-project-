<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'ssnasty@mail.ru',
            'role' => 'admin',
            'password'=> bcrypt('Esoteric4u'),
            'created_at' => date('Y-m-d H-i-s'),
            'updated_at' => date('Y-m-d H-i-s'),
        ]);
        DB::table('admins')->insert([
            'name'=> 'admin',
            'email'=> 'admin@mail.ru',
            'role'=> 'admin',
            'password'=> bcrypt('admin'),
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
    }
}
