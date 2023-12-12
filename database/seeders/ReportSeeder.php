<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     public function run()
     {
        $faker = Faker::create();
        for ($i = 1; $i < 100; $i++) {
            DB::table('report')->insert([
                'tutorial_id' => '1',
                'judul_tutorial' => 'judul'.$i,
                'deskripsi' => 'deskripsi'.$i,
            ]);
        }
     }

}