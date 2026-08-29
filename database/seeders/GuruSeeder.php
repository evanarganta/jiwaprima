<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('guru')->insert([
            [
                'nama' => 'Budi Santoso, M.Kom',
                'mapel' => 'Rekayasa Perangkat Lunak',
                'email' => 'budi.santoso@smkprima.sch.id',
                'created_at' => now()->subDays(14),
                'updated_at' => now()->subDays(14),
            ],
            [
                'nama' => 'Ratna Kusuma, M.Pd',
                'mapel' => 'Matematika Terapan',
                'email' => 'ratna.kusuma@smkprima.sch.id',
                'created_at' => now()->subDays(12),
                'updated_at' => now()->subDays(12),
            ],
            [
                'nama' => 'Hendro Wijaya, S.T',
                'mapel' => 'Jaringan Komputer & Cyber Security',
                'email' => 'hendro.wijaya@smkprima.sch.id',
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
            [
                'nama' => 'Siti Nurhaliza, S.Pd',
                'mapel' => 'Bahasa Inggris Bisnis',
                'email' => 'siti.nurhaliza@smkprima.sch.id',
                'created_at' => now()->subDays(8),
                'updated_at' => now()->subDays(8),
            ],
            [
                'nama' => 'Agus Pratama, M.Cs',
                'mapel' => 'Basis Data & SQL Relasional',
                'email' => 'agus.pratama@smkprima.sch.id',
                'created_at' => now()->subDays(6),
                'updated_at' => now()->subDays(6),
            ],
            [
                'nama' => 'Dewi Lestari, S.Sn',
                'mapel' => 'Desain Antarmuka (UI/UX)',
                'email' => 'dewi.lestari@smkprima.sch.id',
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(4),
            ],
            [
                'nama' => 'Fajar Nugraha, S.Kom',
                'mapel' => 'Pemrograman Mobile Android',
                'email' => 'fajar.nugraha@smkprima.sch.id',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'nama' => 'Maya Indriani, S.Pd',
                'mapel' => 'Kewirausahaan & Produk Kreatif',
                'email' => 'maya.indriani@smkprima.sch.id',
                'created_at' => now()->subDay(),
                'updated_at' => now()->subDay(),
            ],
            [
                'nama' => 'Herry Prasetyo Wibowo, S.Kom',
                'mapel' => 'Rekayasa Perangkat Lunak',
                'email' => 'herry.prasetyo@smkprima.sch.id',
                'created_at' => now()->subDay(),
                'updated_at' => now()->subDay(),
            ],
        ]);
    }
}
