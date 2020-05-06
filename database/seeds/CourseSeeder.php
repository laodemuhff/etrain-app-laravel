<?php

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'title'=>'Kursus Dasar Pemrograman Web - Level 1', 
            'description'=>'Dalam paket kursus ini, anda akan mendapatkan 20x pertemuan membahasa dasar-dasar pemrograman Web meliputi pengenalan PHP, CSS, dan JS serta implementasinya untuk membangun Website Portofolio Sederhana', 
            'price'=>250000
        ]);

        Course::create([
            'title'=>'Kursus Pemrograman Web dengan Framework Laravel - Level 1', 
            'description'=>'Dalam paket kursus ini, anda akan mendapatkan 20x pertemuan membahasa dasar-dasar pemrograman Web dengan framework Laravel, plus buil Project Web Sekolah di Akhir Pertemuan. Sebelum memulai course ini, diharapkan anda sudah memahami dengan baik dasar PHP, CSS, dan JS.', 
            'price'=>500000
        ]);

        Course::create([
            'title'=>'Kursus Pemrograman Web dengan Framework Laravel - Level 2', 
            'description'=>'Dalam paket kursus ini, anda akan mendapatkan 15x pertemuan membahas fitur-fitur lanjut dari framework Laravel yang canggih, plus buil Project Toko Online di Akhir Pertemuan. Sebelum memulai course ini, diharapkan anda sudah memahami dengan baik dasar Framework Laravel atau minimal Konsep MVC', 
            'price'=>500000
        ]);


    }
}
