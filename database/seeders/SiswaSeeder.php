<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            [
                'nama' => 'Andi',
                'kelas' => 'XI RPL',
                'email' => 'andi@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti',
                'kelas' => 'XI RPL',
                'email' => 'siti@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
