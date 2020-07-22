<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PegawaiTableSeeder extends Seeder
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
            DB::table('data_pegawai')->insert([
                'user_id' => 2,
                'nama' => $faker->name,
                'Alamat' => $faker->address,
                'tempat' => $faker->city,
                'tanggal' => date($format = 'Y-m-d'),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki','Perempuan']),
                'agama' => 'Islam',
                'status_menikah' => $faker->randomElement(['Belum Menikah','Menikah']),
                'Jabatan' => $faker->randomElement(['Sekertaris','Kepala Bidang', 'Bendahara', 'Staff']),
                'photo' => 'https://i.ya-webdesign.com/images/avatar-png-1.png'
            ]);
        }

       
    }
}

