<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('siswa')->insert([
            [
                'nama' => 'Andi Pratama',
                'kelas' => 'XII RPL 1',
                'email' => 'andi.pratama@siswa.smkprima.sch.id',
                'alamat' => 'Jl. Anggrek No. 12, Bandung',
                'created_at' => now()->subDays(20),
                'updated_at' => now()->subDays(20),
            ],
            [
                'nama' => 'Siti Nur Aini',
                'kelas' => 'XII RPL 1',
                'email' => 'siti.aini@siswa.smkprima.sch.id',
                'alamat' => 'Jl. Merdeka No. 45, Bandung',
                'created_at' => now()->subDays(19),
                'updated_at' => now()->subDays(19),
            ],
            [
                'nama' => 'Rian Hidayat',
                'kelas' => 'XII TKJ 2',
                'email' => 'rian.hidayat@siswa.smkprima.sch.id',
                'alamat' => 'Jl. Diponegoro No. 88, Cimahi',
                'created_at' => now()->subDays(18),
                'updated_at' => now()->subDays(18),
            ],
            [
                'nama' => 'Clarissa Putri',
                'kelas' => 'XI RPL 2',
                'email' => 'clarissa.putri@siswa.smkprima.sch.id',
                'alamat' => 'Komplek Permata Hijau Blok C-4, Bandung',
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(15),
            ],
            [
                'nama' => 'Dimas Arya Wijaya',
                'kelas' => 'XI TKJ 1',
                'email' => 'dimas.arya@siswa.smkprima.sch.id',
                'alamat' => 'Jl. Cihampelas No. 101, Bandung',
                'created_at' => now()->subDays(14),
                'updated_at' => now()->subDays(14),
            ],
            [
                'nama' => 'Zahra Amelia',
                'kelas' => 'XII MM 1',
                'email' => 'zahra.amelia@siswa.smkprima.sch.id',
                'alamat' => 'Jl. Dago Asri No. 25, Bandung',
                'created_at' => now()->subDays(12),
                'updated_at' => now()->subDays(12),
            ],
            [
                'nama' => 'Muhammad Farhan',
                'kelas' => 'X RPL 1',
                'email' => 'farhan.m@siswa.smkprima.sch.id',
                'alamat' => 'Jl. Buah Batu No. 17A, Bandung',
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
            [
                'nama' => 'Nabila Syakira',
                'kelas' => 'XI MM 2',
                'email' => 'nabila.syakira@siswa.smkprima.sch.id',
                'alamat' => 'Jl. Sukajadi No. 54, Bandung',
                'created_at' => now()->subDays(8),
                'updated_at' => now()->subDays(8),
            ],
            [
                'nama' => 'Reza Pahlevi',
                'kelas' => 'XII RPL 2',
                'email' => 'reza.pahlevi@siswa.smkprima.sch.id',
                'alamat' => 'Jl. Setiabudi No. 112, Bandung',
                'created_at' => now()->subDays(6),
                'updated_at' => now()->subDays(6),
            ],
            [
                'nama' => 'Anisa Rahmawati',
                'kelas' => 'X TKJ 1',
                'email' => 'anisa.rahma@siswa.smkprima.sch.id',
                'alamat' => 'Jl. Gatot Subroto No. 200, Bandung',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'nama' => 'Bintang Alamsyah',
                'kelas' => 'XI RPL 1',
                'email' => 'bintang.a@siswa.smkprima.sch.id',
                'alamat' => 'Jl. Pasir Kaliki No. 78, Bandung',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'nama' => 'Dinda Kirana',
                'kelas' => 'XII TKJ 1',
                'email' => 'dinda.kirana@siswa.smkprima.sch.id',
                'alamat' => 'Jl. Riau No. 42, Bandung',
                'created_at' => now()->subDay(),
                'updated_at' => now()->subDay(),
            ],
        ]);
    }
}
