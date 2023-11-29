<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TutorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Bersihkan data existing
        DB::table('tutorials')->truncate();

        // Buat data dummy sebanyak 1000 baris
        $faker = Faker::create();
        for ($i = 0; $i < 1000; $i++) {
            DB::table('tutorials')->insert([
                'user_id' => 1,
                'judul_tutorial' => 'judul'.$i,
                'deskripsi' => 'deskripsi'.$i,
                'bahan' => 'bahan'.$i,
                'alat' => 'alat'.$i,
                'langkah_tutorial' => 'langkah'.$i,
                'foto' => 'LVQR01nvN7RQMbMowGUp.webp',
                // Tambahkan kolom lain sesuai kebutuhan
            ]);
        }
    }
}