<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RatingSeeder extends Seeder
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
            DB::table('ratings')->insert([
                'rating_id' => '1',
                'rating' => '7',
                'deskripsi' => 'deskripsi'.$i,
            ]);
        }
     }

}