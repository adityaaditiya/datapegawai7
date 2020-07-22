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
        DB::table('users')->insert([
            'role' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123456789)
        ]);

        DB::table('users')->insert([
            'role' => 'pegawai',
            'name' => 'Pegawai',
            'email' => 'pegawai@gmail.com',
            'password' => bcrypt(123456789)
        ]);
    }
}
