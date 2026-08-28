@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
    <div class="uk-page-header">
        <div class="uk-section-divider" style="margin-bottom: 0;">-- DATA SISWA --</div>
        <button class="uk-btn uk-btn-orange" onclick="openModal('modalAddSiswa')">
            + TAMBAH SISWA
        </button>
    </div>

    <div class="uk-panel">
        <div class="uk-panel-inner">
            <div class="uk-panel-header">
                <div class="uk-total-badge">
                    <div class="uk-total-badge-inner">
                        TOTAL: {{ $siswas->total() }} SISWA
                    </div>
                </div>
                <form method="GET" action="{{ route('siswa.index') }}">
                    <div class="uk-search-box">
                        <div class="uk-search-box-inner">
                            <input type="text" name="q" value="{{ $search }}" placeholder="CARI SISWA / KELAS / ALAMAT...">
                            @if($search)
                                <a href="{{ route('siswa.index') }}" style="color: var(--uk-gray); text-decoration: none; margin-right: 6px;">[X]</a>
                            @endif
                            <button type="submit">[ENTER]</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="uk-table-wrapper">
                <table class="uk-table">
                    <thead>
                        <tr>
                            <th style="width: 50px;">NO</th>
                            <th>NAMA SISWA</th>
                            <th>KELAS</th>
                            <th>EMAIL</th>
                            <th>ALAMAT</th>
                            <th style="text-align: right;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($siswas as $index => $siswa)
                            <tr>
                                <td style="color: var(--uk-gray);">{{ $siswas->firstItem() + $index }}</td>
                                <td style="font-weight: bold; color: var(--uk-white);">{{ $siswa->nama }}</td>
                                <td><span style="color: var(--uk-orange);">{{ $siswa->kelas }}</span></td>
                                <td style="color: var(--uk-gray);">{{ $siswa->email ?? '-' }}</td>
                                <td style="color: var(--uk-white);">{{ $siswa->alamat ?? '-' }}</td>
                                <td style="text-align: right;">
                                    <div style="display: inline-flex; gap: 8px;">
                                        <button class="uk-btn uk-btn-sm" onclick="openEditSiswa({{ json_encode($siswa) }})">
                                            EDIT
                                        </button>
                                        <form method="POST" action="{{ route('siswa.destroy', $siswa) }}" onsubmit="return confirm('Hapus data siswa {{ $siswa->nama }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="uk-btn uk-btn-sm uk-btn-delete">
                                                DELETE
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center; color: var(--uk-gray); padding: 30px;">
                                    TIDAK ADA DATA SISWA
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($siswas->hasPages())
                <div style="padding: 14px 20px; border-top: 1px solid var(--uk-dark-gray);">
                    {{ $siswas->links('vendor.pagination.ultrakill') }}
                </div>
            @endif
        </div>
    </div>

    <div class="uk-modal-overlay" id="modalAddSiswa">
        <div class="uk-modal">
            <div class="uk-modal-inner">
                <div class="uk-modal-header">
                    <span class="uk-modal-title">-- TAMBAH DATA SISWA --</span>
                    <button class="uk-alert-close" onclick="closeModal('modalAddSiswa')">[X]</button>
                </div>
                <form method="POST" action="{{ route('siswa.store') }}">
                    @csrf
                    <div class="uk-modal-body">
                        <div class="uk-form-group">
                            <label class="uk-form-label">NAMA LENGKAP</label>
                            <input type="text" name="nama" class="uk-input" placeholder="contoh: Clarissa Aurelia" required>
                        </div>
                        <div class="uk-form-group">
                            <label class="uk-form-label">KELAS</label>
                            <select name="kelas" class="uk-input" required>
                                <option value="" disabled selected>-- PILIH KELAS --</option>
                                @foreach($kelasList as $kls)
                                    <option value="{{ $kls }}">{{ $kls }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="uk-form-group">
                            <label class="uk-form-label">EMAIL SISWA (OPSIONAL)</label>
                            <input type="email" name="email" class="uk-input" placeholder="contoh: clarissa@siswa.smkprima.sch.id">
                        </div>
                        <div class="uk-form-group">
                            <label class="uk-form-label">ALAMAT TEMPAT TINGGAL</label>
                            <textarea name="alamat" rows="2" class="uk-input" placeholder="contoh: Jl. Merdeka No. 45, Bandung"></textarea>
                        </div>
                    </div>
                    <div class="uk-modal-footer">
                        <button type="button" class="uk-btn uk-btn-sm" onclick="closeModal('modalAddSiswa')">BATAL</button>
                        <button type="submit" class="uk-btn uk-btn-sm uk-btn-orange">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="uk-modal-overlay" id="modalEditSiswa">
        <div class="uk-modal">
            <div class="uk-modal-inner">
                <div class="uk-modal-header">
                    <span class="uk-modal-title">-- EDIT DATA SISWA --</span>
                    <button class="uk-alert-close" onclick="closeModal('modalEditSiswa')">[X]</button>
                </div>
                <form id="formEditSiswa" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="uk-modal-body">
                        <div class="uk-form-group">
                            <label class="uk-form-label">NAMA LENGKAP</label>
                            <input type="text" id="editSiswaNama" name="nama" class="uk-input" required>
                        </div>
                        <div class="uk-form-group">
                            <label class="uk-form-label">KELAS</label>
                            <select id="editSiswaKelas" name="kelas" class="uk-input" required>
                                <option value="" disabled>-- PILIH KELAS --</option>
                                @foreach($kelasList as $kls)
                                    <option value="{{ $kls }}">{{ $kls }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="uk-form-group">
                            <label class="uk-form-label">EMAIL</label>
                            <input type="email" id="editSiswaEmail" name="email" class="uk-input">
                        </div>
                        <div class="uk-form-group">
                            <label class="uk-form-label">ALAMAT</label>
                            <textarea id="editSiswaAlamat" name="alamat" rows="2" class="uk-input"></textarea>
                        </div>
                    </div>
                    <div class="uk-modal-footer">
                        <button type="button" class="uk-btn uk-btn-sm" onclick="closeModal('modalEditSiswa')">BATAL</button>
                        <button type="submit" class="uk-btn uk-btn-sm uk-btn-orange">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.openEditSiswa = function(siswa) {
            document.getElementById('formEditSiswa').action = '/siswa/' + siswa.id;
            document.getElementById('editSiswaNama').value = siswa.nama;
            document.getElementById('editSiswaKelas').value = siswa.kelas;
            document.getElementById('editSiswaEmail').value = siswa.email || '';
            document.getElementById('editSiswaAlamat').value = siswa.alamat || '';
            openModal('modalEditSiswa');
        };
    </script>
@endsection
