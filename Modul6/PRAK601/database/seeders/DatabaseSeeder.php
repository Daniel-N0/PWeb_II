<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Experience;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'full_name'  => 'Daniel Noprianto',
            'student_id' => '2410817110010',
            'major'      => 'Teknologi Informasi',
            'hobbies'    => 'Main Game',
            'skills'     => 'Python, HTML, CSS, MySQL',
            'image'      => 'profil.jpeg'
        ]);

        Experience::create([
            'title'       => 'PKKMB Universitas',
            'description' => 'Mengikuti rangkaian kegiatan Pengenalan Kehidupan Kampus bagi Mahasiswa Baru (PKKMB) tingkat universitas untuk mengenal budaya, sistem akademik kampus, dan beradaptasi dengan lingkungan perkuliahan.',
            'period'      => 'Agustus 2024',
            'impression'  => 'Sangat seru dan berkesan karena bisa mengenal banyak teman baru dari berbagai fakultas serta melatih kedisiplinan diri.',
            'image'       => 'pkkmb.jpeg'
        ]);

        Experience::create([
            'title'       => 'LKMM',
            'description' => 'Berpartisipasi aktif dalam Latihan Keterampilan Manajemen Mahasiswa (LKMM) tingkat Pra Dasar dan Tingkat Dasar yang bertujuan untuk melatih jiwa kepemimpinan dan manajemen organisasi mahasiswa.',
            'period'      => '2024 & 2025',
            'impression'  => 'Mendapatkan banyak ilmu baru tentang cara berkomunikasi yang efektif, memimpin rapat, dan memecahkan masalah dalam kerja tim.',
            'image'       => 'lkmm.jpeg'
        ]);

        Experience::create([
            'title'       => 'Himpunan Mahasiswa Teknologi Informasi (HMTI)',
            'description' => 'Bergabung dan aktif menjadi pengurus di Himpunan Mahasiswa Teknologi Informasi (HMTI).',
            'period'      => '2024 - 2025',
            'impression'  => 'Belajar berorganisasi secara profesional, mengadakan berbagai event kampus, dan memperluas relasi dengan Kakak tingkat maupun alumni.',
            'image'       => 'hmti.jpeg'
        ]);

        Experience::create([
            'title'       => 'Membeli Laptop Baru (Upgrade Device)',
            'description' => 'Pengalaman berkesan akhirnya bisa membeli perangkat laptop baru untuk mendukung kegiatan perkuliahan, mengerjakan tugas pemrograman, dan praktikum yang spesifikasinya semakin berat di jurusan Teknologi Informasi.',
            'period'      => '2026',
            'impression'  => 'Sangat sangat bersyukur dan lega. Memiliki perangkat yang lebih mumpuni membuat proses ngoding dan menyelesaikan proyek akhir menjadi jauh lebih lancar tanpa hambatan.',
            'image'       => 'laptop.jpeg'
        ]);
    }
}