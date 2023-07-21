<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');
        $jabatan = ['manager', 'supervisor', 'staff'];
        $bonus = [50, 40, 30];
        $gaji = [8000000, 6500000, 4500000];
        for ($i = 0; $i < count($jabatan); $i++) {
            Jabatan::create([
                'nama_jabatan' => $jabatan[$i],
                'gaji_pokok' => $gaji[$i],
                'pph' => 5,
                'bonus' => $bonus[$i]
            ]);
        }
    }
}