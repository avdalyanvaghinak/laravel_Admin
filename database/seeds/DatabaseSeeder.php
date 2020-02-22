<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@mail.ru',
            'name' => 'Admin',
            'user_type' => 'admin',
            'password' => Hash::make('admin123') // <---- check this
        ]);

        $this->call(UsersTableSeeder::class);
        $this->call(PostTableSeeder::class);
    }
}
