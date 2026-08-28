# JIWAPRIMA - Sistem Informasi Sekolah

Sistem Informasi Manajemen Data Sekolah (Guru, Siswa, dan Mata Pelajaran) berbasis web yang dibangun dengan Laravel 12. Sistem ini dirancang untuk mengelola data akademik sekolah secara efisien, responsif, dan interaktif dengan antarmuka bertema retro arcade industrial.

---

## 🚀 Fitur Utama

- **Dashboard Ringkasan**:
  - Statistik total siswa, guru, mata pelajaran, dan akumulasi jam mengajar.
  - Tabel preview siswa terbaru dan direktori guru.
- **Manajemen Data Guru (CRUD)**:
  - Tambah, edit, dan hapus data guru.
  - Pilihan mata pelajaran yang diampu terintegrasi dinamis dengan database mata pelajaran.
  - Pencarian berdasarkan nama, mata pelajaran, dan email.
  - Paginasi data (8 baris per halaman).
- **Manajemen Data Siswa (CRUD)**:
  - Tambah, edit, dan hapus data siswa.
  - Standarisasi pilihan kelas kejuruan (RPL, TKJ, MM).
  - Kolom alamat tempat tinggal (melalui skema migrasi modifikasi).
  - Pencarian berdasarkan nama, kelas, email, dan alamat.
  - Paginasi data (8 baris per halaman).
- **Manajemen Mata Pelajaran (CRUD)**:
  - Tambah, edit, dan hapus mata pelajaran.
  - Pengaturan alokasi jam tatap muka per minggu.
  - Pencarian mata pelajaran berdasarkan nama dan alokasi jam.
  - Paginasi data (8 baris per halaman).
- **Interaksi & UI**:
  - Notifikasi floating toast popup (auto-dismiss & manual close).
  - Transisi halaman instan tanpa jeda muat ulang.
  - Desain geometris octagon simetris dan tipografi retro VT323.

---

## 🗄️ Struktur Database

### 1. Tabel `guru`
| Kolom | Tipe Data | Keterangan |
|---|---|---|
| `id` | BigInteger (PK) | Auto Increment |
| `nama` | String | Nama lengkap dan gelar guru |
| `mapel` | String | Mata pelajaran yang diampu |
| `email` | String (Unique) | Email resmi guru |
| `created_at` / `updated_at` | Timestamps | Waktu pencatatan data |

### 2. Tabel `siswa`
| Kolom | Tipe Data | Keterangan |
|---|---|---|
| `id` | BigInteger (PK) | Auto Increment |
| `nama` | String | Nama lengkap siswa |
| `kelas` | String | Kelas / jurusan siswa |
| `email` | String (Nullable) | Email siswa |
| `alamat` | String (Nullable) | Alamat tempat tinggal (*Migration Modifikasi*) |
| `created_at` / `updated_at` | Timestamps | Waktu pencatatan data |

### 3. Tabel `mapel`
| Kolom | Tipe Data | Keterangan |
|---|---|---|
| `id` | BigInteger (PK) | Auto Increment |
| `nama_mapel` | String | Nama mata pelajaran |
| `jam` | Integer | Alokasi jam belajar per minggu |
| `created_at` / `updated_at` | Timestamps | Waktu pencatatan data |

---

## 🛠️ Persyaratan Sistem

- PHP >= 8.2
- Composer >= 2.0
- MySQL / MariaDB >= 8.0
- Node.js & NPM (opsional untuk bundling asset)

---

## ⚙️ Panduan Instalasi

1. **Clone Repositori**:
   ```bash
   git clone https://github.com/username/jiwaprima.git
   cd jiwaprima
   ```

2. **Install Dependensi PHP**:
   ```bash
   composer install
   ```

3. **Konfigurasi Environment**:
   Salin file konfigurasi environment:
   ```bash
   cp .env.example .env
   ```
   Sesuaikan konfigurasi database pada file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=jiwaprima
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Jalankan Migrasi & Seeder Database**:
   ```bash
   php artisan migrate:refresh --seed
   ```

6. **Jalankan Server Lokal**:
   ```bash
   php artisan serve
   ```
   Aplikasi dapat diakses melalui peramban web di `http://localhost:8000`.

---

## 🧪 Menjalankan Pengujian (Testing)

Untuk memvalidasi integritas sistem dan memastikan seluruh fitur berjalan dengan baik:

```bash
php artisan test
```

---

## 📄 Lisensi

Aplikasi ini bersifat sumber terbuka (open-source) di bawah lisensi [MIT License](LICENSE).
