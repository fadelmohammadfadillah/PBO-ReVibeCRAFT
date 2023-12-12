<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tutorial;
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
         // Seed the first tutorial
         Tutorial::create([
            'user_id' => 1,
            'judul_tutorial' => 'Vas Dari Botol Bekas',
            'deskripsi' => 'Vas bunga dari botol bekas. Mengurangi limbah botol menjadi hiasan rumah yang indah serta murah.',
            'bahan' => json_encode(['Botol Bekas', 'Cat Semprot']),
            'alat' => json_encode(['Cutter', 'Gunting', 'Kertas Amplas']),
            'langkah_tutorial' => json_encode([
                'Persiapkan botol: Bersihkan dan keringkan botol bekas secara menyeluruh.',
                'Gunakan cutter atau gunting kuat untuk memotong bagian atas botol di bagian yang diinginkan.',
                'Gunakan kertas amplas untuk menghaluskan tepi potongan botol.',
                'Gunakan cat semprot untuk melukis botol sesuai selera Anda.',
            ]),
            'foto' => 'Vas Botol.jpeg',
        ]);
        
        Tutorial::create([
            'user_id' => 1,
            'judul_tutorial' => 'Tempat Pensil Dari Botol Bekas',
            'deskripsi' => 'Tempat Pensil yang terbuat dari botol bekas. kemudian di hias sehingga membentuk karakter kartun kesukaan anak-anak',
            'bahan' => json_encode(['Bahan = 1. 2 Buah Botol Bekas', '2, Kertas Asturo']),
            'alat' => json_encode(['Alat = 1. Cutter', '2. Gunting', 'Lem Lilin']),
            'langkah_tutorial' => json_encode([
               'Langkah - Langkah = 1. Bersihkan dan keringkan botol bekas secara menyeluruh.',
               '2. Gunakan cutter atau gunting kuat untuk memotong bagian samping botol .',
               '3. Gunakan cutter untuk emotong botol menjadi 4 bagian',
               '4. Lapisi bagian bagian botol dengan kertas asturo dan bentuk sesuai karakter yang di inginkan.',
           ]),
            'foto' => 'Tempat Pensil.jpeg', 
        ]);

        Tutorial::create([
            'user_id' => 1,
            'judul_tutorial' => 'Celengan Dari Kardus Bekas',
            'deskripsi' => 'Celengan yang terbuat dari kardus bekas yang mudah di buat di rumah maupun di sekolah. Selain mengajarkan untuk mendaur ulang sampah ini juga membantu anak agar rajin menabung.',
            'bahan' => json_encode(['Bahan = 1. Kardus Bekas', '2. Kertas Gambar Karakter']),
            'alat' => json_encode(['Alat = 1. Cutter', '2. Gunting', '3. Pensil']),
            'langkah_tutorial' => json_encode([
                'Langkah - Langkah = 1.Gunakan kardus bekas yang cukup besar dan dalam kondisi baik.',
               '2. Gambar desain celengan yang diinginkan pada kardus menggunakan pensil..',
               '3. Potong kardus sesuai dengan desain dan lipat sesuai bentuk celengan. Pastikan sambungan kardus dihubungkan dengan perekat kuat.',
               '4. Buat lubang di bagian atas untuk memasukkan uang. Pastikan lubang tersebut cukup besar.',
               '5. Dekorasi tambahan denganmenggunakan kertas gambar karakter sesuai selera.'
           ]),
            'foto' => 'Celengan.jpeg',
        ]);

        $faker = Faker::create();
        for ($i = 3; $i < 997; $i++) {
            DB::table('tutorials')->insert([
                'user_id' => 1,
                'judul_tutorial' => 'judul'.$i,
                'deskripsi' => 'deskripsi'.$i,
                'bahan' => 'bahan'.$i,
                'alat' => 'alat'.$i,
                'langkah_tutorial' => 'langkah'.$i,
                'foto' => 'LVQR01nvN7RQMbMowGUp.webp',
            ]);
        }
     }

}