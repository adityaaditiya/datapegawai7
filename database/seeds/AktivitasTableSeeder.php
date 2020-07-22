<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class AktivitasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create('id_ID');

        for ($i=1; $i<=100 ; $i++) { 
            DB::table('data_aktivitas')->insert([
                'kode_id' => 3,
                'nama' => $faker->name,
                'photo' => 'https://i.ya-webdesign.com/images/avatar-png-1.png'
            ]);
        }
    }
}
