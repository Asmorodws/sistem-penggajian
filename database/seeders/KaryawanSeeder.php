<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\Karyawan;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Faker\Factory as Faker;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 8; $i++) {
            Karyawan::create([
                'nama' => $faker->name,
                'alamat' => $faker->address(),
                'tanggal_lahir' => $faker->dateTimeBetween('-40 year', '-20 year'),
                'tempat_lahir' => $faker->state($faker->city),
                'jabatan_id' => $faker->numberBetween(1, Jabatan::count())
            ]);
        }
    }
}