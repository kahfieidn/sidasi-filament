<?php

namespace Database\Seeders;

use App\Models\JenisIzin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User Dummy
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@kepri.pro',
        ]);
        User::factory()->create([
            'name' => 'DPMPTSP',
            'email' => 'kepri@kepri.pro',
        ]);
        User::factory()->create([
            'name' => 'Bintan',
            'email' => 'bintan@kepri.pro',
        ]);

        //Jenis Izin
        JenisIzin::create([
            'nama_izin' => 'Perizinan',
        ]);
        JenisIzin::create([
            'nama_izin' => 'Non Perizinan',
        ]);


        //Sektor

        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Penanaman Modal',
            'nama_instansi' => 'Sektor Penanaman Modal',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Lingkungan Hidup',
            'nama_instansi' => 'Sektor Lingkungan Hidup',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Kesehatan',
            'nama_instansi' => 'Sektor Kesehatan',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Perhubungan',
            'nama_instansi' => 'Sektor Perhubungan',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Tenaga Kerja',
            'nama_instansi' => 'Sektor Tenaga Kerja',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Kelautan dan Perikanan',
            'nama_instansi' => 'Sektor Kelautan dan Perikanan',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor ESDM',
            'nama_instansi' => 'Sektor ESDM',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Perindustrian dan Perdagangan',
            'nama_instansi' => 'Sektor Perindustrian dan Perdagangan',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Pariwisata',
            'nama_instansi' => 'Sektor Pariwisata',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Kebudayaan',
            'nama_instansi' => 'Sektor Kebudayaan',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Pertanian, Pangan dan Hewan',
            'nama_instansi' => 'Sektor Pertanian, Pangan dan Hewan',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Pendidikan',
            'nama_instansi' => 'Sektor Pendidikan',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Sosial',
            'nama_instansi' => 'Sektor Sosial',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor UKM',
            'nama_instansi' => 'Sektor UKM',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Kesatuan Bangsa dan Politik',
            'nama_instansi' => 'Sektor Kesatuan Bangsa dan Politik',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Pekerjaan Umum, Penataan Ruang dan Pertanahan',
            'nama_instansi' => 'Sektor Pekerjaan Umum, Penataan Ruang dan Pertanahan',
        ]);
    }
}
