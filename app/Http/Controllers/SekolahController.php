<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SekolahController extends Controller
{
    public function dashboard(): View
    {
        $stats = [
            'total_guru' => Guru::count(),
            'total_siswa' => Siswa::count(),
            'total_mapel' => Mapel::count(),
            'total_jam' => (int) Mapel::sum('jam'),
            'total_kelas' => Siswa::distinct('kelas')->count('kelas'),
        ];

        $recentGurus = Guru::latest()->take(5)->get();
        $recentSiswas = Siswa::latest()->take(7)->get();
        $recentMapels = Mapel::latest()->take(5)->get();

        return view('sekolah.dashboard', compact('stats', 'recentGurus', 'recentSiswas', 'recentMapels'));
    }

    public function guruIndex(Request $request): View
    {
        $search = $request->query('q');
        $query = Guru::query();

        if ($search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('mapel', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        $gurus = $query->latest()->paginate(8)->withQueryString();
        $mapelList = Mapel::orderBy('nama_mapel')->pluck('nama_mapel')->toArray();

        return view('sekolah.guru', compact('gurus', 'search', 'mapelList'));
    }

    public function storeGuru(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|exists:mapel,nama_mapel|max:255',
            'email' => 'required|email|max:255|unique:guru,email',
        ]);

        Guru::create($validated);

        return redirect()->route('guru.index')->with('success', 'Data Guru [ '.$validated['nama'].' ] berhasil ditambahkan.');
    }

    public function updateGuru(Request $request, Guru $guru): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|exists:mapel,nama_mapel|max:255',
            'email' => 'required|email|max:255|unique:guru,email,'.$guru->id,
        ]);

        $guru->update($validated);

        return redirect()->route('guru.index')->with('success', 'Data Guru [ '.$guru->nama.' ] berhasil diperbarui.');
    }

    public function destroyGuru(Guru $guru): RedirectResponse
    {
        $nama = $guru->nama;
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data Guru [ '.$nama.' ] berhasil dihapus.');
    }

    public function siswaIndex(Request $request): View
    {
        $search = $request->query('q');
        $query = Siswa::query();

        if ($search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('kelas', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('alamat', 'like', "%{$search}%");
        }

        $siswas = $query->latest()->paginate(8)->withQueryString();
        $kelasList = [
            'X RPL 1', 'X RPL 2', 'X TKJ 1', 'X TKJ 2', 'X MM 1', 'X MM 2',
            'XI RPL 1', 'XI RPL 2', 'XI TKJ 1', 'XI TKJ 2', 'XI MM 1', 'XI MM 2',
            'XII RPL 1', 'XII RPL 2', 'XII TKJ 1', 'XII TKJ 2', 'XII MM 1', 'XII MM 2',
        ];

        return view('sekolah.siswa', compact('siswas', 'search', 'kelasList'));
    }

    public function storeSiswa(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string|max:500',
        ]);

        Siswa::create($validated);

        return redirect()->route('siswa.index')->with('success', 'Data Siswa [ '.$validated['nama'].' ] berhasil didaftarkan.');
    }

    public function updateSiswa(Request $request, Siswa $siswa): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:100',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string|max:500',
        ]);

        $siswa->update($validated);

        return redirect()->route('siswa.index')->with('success', 'Data Siswa [ '.$siswa->nama.' ] berhasil diperbarui.');
    }

    public function destroySiswa(Siswa $siswa): RedirectResponse
    {
        $nama = $siswa->nama;
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data Siswa [ '.$nama.' ] berhasil dihapus.');
    }

    public function mapelIndex(Request $request): View
    {
        $search = $request->query('q');
        $query = Mapel::query();

        if ($search) {
            $query->where('nama_mapel', 'like', "%{$search}%")
                ->orWhere('jam', 'like', "%{$search}%");
        }

        $mapels = $query->latest()->paginate(8)->withQueryString();

        return view('sekolah.mapel', compact('mapels', 'search'));
    }

    public function storeMapel(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_mapel' => 'required|string|max:255',
            'jam' => 'required|integer|min:1|max:40',
        ]);

        Mapel::create($validated);

        return redirect()->route('mapel.index')->with('success', 'Data Mapel [ '.$validated['nama_mapel'].' ] berhasil ditambahkan.');
    }

    public function updateMapel(Request $request, Mapel $mapel): RedirectResponse
    {
        $validated = $request->validate([
            'nama_mapel' => 'required|string|max:255',
            'jam' => 'required|integer|min:1|max:40',
        ]);

        $mapel->update($validated);

        return redirect()->route('mapel.index')->with('success', 'Data Mapel [ '.$mapel->nama_mapel.' ] berhasil diperbarui.');
    }

    public function destroyMapel(Mapel $mapel): RedirectResponse
    {
        $nama = $mapel->nama_mapel;
        $mapel->delete();

        return redirect()->route('mapel.index')->with('success', 'Data Mapel [ '.$nama.' ] berhasil dihapus.');
    }
}
