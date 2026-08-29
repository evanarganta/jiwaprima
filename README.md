<br><p align="center"><img src="public/images/logo.png" alt="jiwaprima" width="90%"></p>

<br>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.3%2B-777BB4?style=flat&logo=php&logoColor=white" alt="PHP 8.3+">
  <img src="https://img.shields.io/badge/Composer-2.2%2B-885630?style=flat&logo=composer&logoColor=white" alt="Composer 2.2+">
  <img src="https://img.shields.io/badge/MySQL-8.0%2B-4479A1?style=flat&logo=mysql&logoColor=white" alt="MySQL 8.0+">
  <img src="https://img.shields.io/badge/MariaDB-10.3%2B-003545?style=flat&logo=mariadb&logoColor=white" alt="MariaDB 10.3+">
  <img src="https://img.shields.io/badge/Node.js-%26_NPM-339933?style=flat&logo=node.js&logoColor=white" alt="Node.js & NPM">
  <img src="https://img.shields.io/badge/License-MIT-blue?style=flat" alt="MIT License">
</p>

<br>

<p align="center">Sebuah mini project sistem informasi manajemen data sekolah berbasis web yang dibangun dengan Laravel 13, dirancang untuk mengelola data akademik sekolah dengan antarmuka bertema retro arcade industrial yang terinspirasi dari tampilan antarmuka game ULTRAKILL.</p><br>

<table align="center">
  <tr>
    <th>Fitur</th>
    <th>Detail</th>
  </tr>
  <tr>
    <td><strong>Dashboard</strong></td>
    <td>Statistik siswa, guru, mata pelajaran, dan jam mengajar.</td>
  </tr>
  <tr>
    <td><strong>Data Guru</strong></td>
    <td>CRUD, mata pelajaran dinamis, pencarian, dan paginasi.</td>
  </tr>
  <tr>
    <td><strong>Data Siswa</strong></td>
    <td>CRUD, pilihan kelas RPL/TKJ/MM, alamat, pencarian, dan paginasi.</td>
  </tr>
  <tr>
    <td><strong>Mata Pelajaran</strong></td>
    <td>CRUD, alokasi jam per minggu, pencarian, dan paginasi.</td>
  </tr>
  <tr>
    <td><strong>Notifikasi</strong></td>
    <td>Toast popup dengan auto-dismiss dan manual close.</td>
  </tr>
  <tr>
    <td><strong>Navigasi</strong></td>
    <td>Transisi halaman tanpa reload.</td>
  </tr>
  <tr>
    <td><strong>UI</strong></td>
    <td>Desain octagon simetris dan font VT323.</td>
  </tr>
</table>

<br><br><img width="100%" alt="gambar" src="https://github.com/user-attachments/assets/475dbd8e-0408-4eb5-94fc-d6e79adc8154" /><br><br>

<h3 align="center">1. Tabel <code>guru</code>.</h3>

<table align="center">
  <tr>
    <th>Kolom</th>
    <th>Tipe Data</th>
    <th>Keterangan</th>
  </tr>
  <tr>
    <td><code>id</code></td>
    <td>BigInteger (PK)</td>
    <td>Auto Increment</td>
  </tr>
  <tr>
    <td><code>nama</code></td>
    <td>String</td>
    <td>Nama lengkap dan gelar guru</td>
  </tr>
  <tr>
    <td><code>mapel</code></td>
    <td>String</td>
    <td>Mata pelajaran yang diampu</td>
  </tr>
  <tr>
    <td><code>email</code></td>
    <td>String (Unique)</td>
    <td>Email resmi guru</td>
  </tr>
  <tr>
    <td><code>created_at</code> / <code>updated_at</code></td>
    <td>Timestamps</td>
    <td>Waktu pencatatan data</td>
  </tr>
</table>

<br>

<h3 align="center">2. Tabel <code>siswa</code>.</h3>

<table align="center">
  <tr>
    <th>Kolom</th>
    <th>Tipe Data</th>
    <th>Keterangan</th>
  </tr>
  <tr>
    <td><code>id</code></td>
    <td>BigInteger (PK)</td>
    <td>Auto Increment</td>
  </tr>
  <tr>
    <td><code>nama</code></td>
    <td>String</td>
    <td>Nama lengkap siswa</td>
  </tr>
  <tr>
    <td><code>kelas</code></td>
    <td>String</td>
    <td>Kelas / jurusan siswa</td>
  </tr>
  <tr>
    <td><code>email</code></td>
    <td>String (Nullable)</td>
    <td>Email siswa</td>
  </tr>
  <tr>
    <td><code>alamat</code></td>
    <td>String (Nullable)</td>
    <td>Alamat tempat tinggal (<i>Migration Modifikasi</i>)</td>
  </tr>
  <tr>
    <td><code>created_at</code> / <code>updated_at</code></td>
    <td>Timestamps</td>
    <td>Waktu pencatatan data</td>
  </tr>
</table>

<br>

<h3 align="center">3. Tabel <code>mapel</code>.</h3>

<table align="center">
  <tr>
    <th>Kolom</th>
    <th>Tipe Data</th>
    <th>Keterangan</th>
  </tr>
  <tr>
    <td><code>id</code></td>
    <td>BigInteger (PK)</td>
    <td>Auto Increment</td>
  </tr>
  <tr>
    <td><code>nama_mapel</code></td>
    <td>String (Unique)</td>
    <td>Nama mata pelajaran</td>
  </tr>
  <tr>
    <td><code>jam</code></td>
    <td>Integer</td>
    <td>Alokasi jam belajar per minggu</td>
  </tr>
  <tr>
    <td><code>created_at</code> / <code>updated_at</code></td>
    <td>Timestamps</td>
    <td>Waktu pencatatan data</td>
  </tr>
</table>

<br><br><img width="100%" alt="gambar" src="https://github.com/user-attachments/assets/19178d53-fc7e-4962-960c-51fcc9d704be" /><br><br><p align="center">Berikut adalah langkah-langkah untuk menmasang dan menjalankan proyek ini.</p>

<h3>1. Clone.</h3>
<pre><code>git clone https://github.com/evanarganta/jiwaprima.git
cd jiwaprima
</code></pre>

<h3>2. Install dependensi.</h3>
   <pre><code>composer install</code></pre>

<h3>3. Konfigurasi environment.</h3>
<pre><code>cp .env.example .env</code></pre>

   <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jiwaprima
DB_USERNAME=root
DB_PASSWORD=</code></pre>

<h3>4. Generate key.</h3>
<pre><code>php artisan key:generate</code></pre>

<h3>5. Migrasi database.</h3>
<pre><code>php artisan migrate --seed</code></pre>
<pre><code>php artisan migrate:refresh --seed</code></pre>

<h3>6. Jalankan server.</h3>
<pre><code>php artisan serve</code></pre>

   <br><p align="center">Aplikasi dapat diakses melalui peramban web di `http://localhost:8000`.</p>

<br><br><p align="center"><img width="50%" alt="gambar" src="https://github.com/user-attachments/assets/e6d36eac-3144-41b9-b463-794daa5f7c7f" /><br><br><strong>feed us, we will grow.</strong></p><br>
