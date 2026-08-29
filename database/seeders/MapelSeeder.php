<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mapel')->insert([
            [
                'nama_mapel' => 'Rekayasa Perangkat Lunak',
                'jam' => 5,
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(15),
            ],
            [
                'nama_mapel' => 'Basis Data & SQL Relasional',
                'jam' => 4,
                'created_at' => now()->subDays(14),
                'updated_at' => now()->subDays(14),
            ],
            [
                'nama_mapel' => 'Jaringan Komputer & Cyber Security',
                'jam' => 5,
                'created_at' => now()->subDays(12),
                'updated_at' => now()->subDays(12),
            ],
            [
                'nama_mapel' => 'Matematika Terapan',
                'jam' => 4,
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
            [
                'nama_mapel' => 'Bahasa Inggris Bisnis',
                'jam' => 3,
                'created_at' => now()->subDays(8),
                'updated_at' => now()->subDays(8),
            ],
            [
                'nama_mapel' => 'Desain Antarmuka (UI/UX)',
                'jam' => 4,
                'created_at' => now()->subDays(6),
                'updated_at' => now()->subDays(6),
            ],
            [
                'nama_mapel' => 'Pemrograman Mobile Android',
                'jam' => 5,
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(4),
            ],
            [
                'nama_mapel' => 'Kewirausahaan & Produk Kreatif',
                'jam' => 4,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
        ]);
    }
}
