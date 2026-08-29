@extends('layouts.app')

@section('title', 'Data Guru')

@section('content')
    <div class="uk-page-header">
        <div class="uk-section-divider" style="margin-bottom: 0;">-- DATA GURU --</div>
        <button class="uk-btn uk-btn-orange" onclick="openModal('modalAddGuru')">
            + TAMBAH GURU
        </button>
    </div>

    <div class="uk-panel">
        <div class="uk-panel-inner">
            <div class="uk-panel-header">
                <div class="uk-total-badge">
                    <div class="uk-total-badge-inner">
                        TOTAL: {{ $gurus->total() }} GURU
                    </div>
                </div>
                <form method="GET" action="{{ route('guru.index') }}">
                    <div class="uk-search-box">
                        <div class="uk-search-box-inner">
                            <input type="text" name="q" value="{{ $search }}" placeholder="CARI GURU / MAPEL / EMAIL...">
                            @if($search)
                                <a href="{{ route('guru.index') }}" style="color: var(--uk-gray); text-decoration: none; margin-right: 6px;">[X]</a>
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
                            <th>NAMA GURU</th>
                            <th>MATA PELAJARAN</th>
                            <th>EMAIL</th>
                            <th style="text-align: right;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($gurus as $index => $guru)
                            <tr>
                                <td style="color: var(--uk-gray);">{{ $gurus->firstItem() + $index }}</td>
                                <td style="font-weight: bold; color: var(--uk-white);">{{ $guru->nama }}</td>
                                <td><span style="color: var(--uk-orange);">{{ $guru->mapel }}</span></td>
                                <td style="color: var(--uk-gray);">{{ $guru->email }}</td>
                                <td style="text-align: right;">
                                    <div style="display: inline-flex; gap: 8px;">
                                        <button class="uk-btn uk-btn-sm" onclick="openEditGuru({{ json_encode($guru) }})">
                                            EDIT
                                        </button>
                                        <form method="POST" action="{{ route('guru.destroy', $guru) }}" onsubmit="return confirm('Hapus data guru ' + {{ json_encode($guru->nama) }} + '?')">
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
                                <td colspan="5" style="text-align: center; color: var(--uk-gray); padding: 30px;">
                                    TIDAK ADA DATA GURU
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($gurus->hasPages())
                <div style="padding: 14px 20px; border-top: 1px solid var(--uk-dark-gray);">
                    {{ $gurus->links('vendor.pagination.ultrakill') }}
                </div>
            @endif
        </div>
    </div>

    <div class="uk-modal-overlay" id="modalAddGuru">
        <div class="uk-modal">
            <div class="uk-modal-inner">
                <div class="uk-modal-header">
                    <span class="uk-modal-title">-- TAMBAH DATA GURU --</span>
                    <button class="uk-alert-close" onclick="closeModal('modalAddGuru')">[X]</button>
                </div>
                <form method="POST" action="{{ route('guru.store') }}">
                    @csrf
                    <div class="uk-modal-body">
                        <div class="uk-form-group">
                            <label class="uk-form-label">NAMA LENGKAP & GELAR</label>
                            <input type="text" name="nama" class="uk-input" placeholder="contoh: Dr. Hendra Gunawan, M.T" value="{{ old('nama') }}" required>
                        </div>
                        <div class="uk-form-group">
                            <label class="uk-form-label">MATA PELAJARAN (DARI DATABASE MAPEL)</label>
                            <select name="mapel" class="uk-input" required>
                                <option value="" disabled {{ old('mapel') ? '' : 'selected' }}>-- PILIH MATA PELAJARAN --</option>
                                @forelse($mapelList as $mp)
                                    <option value="{{ $mp }}" @selected(old('mapel') === $mp)>{{ $mp }}</option>
                                @empty
                                    <option value="" disabled>-- BELUM ADA DATA MAPEL (BUAT DI MENU MAPEL DAHULU) --</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="uk-form-group">
                            <label class="uk-form-label">EMAIL RESMI</label>
                            <input type="email" name="email" class="uk-input" placeholder="contoh: hendra@smkprima.sch.id" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="uk-modal-footer">
                        <button type="button" class="uk-btn uk-btn-sm" onclick="closeModal('modalAddGuru')">BATAL</button>
                        <button type="submit" class="uk-btn uk-btn-sm uk-btn-orange">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="uk-modal-overlay" id="modalEditGuru">
        <div class="uk-modal">
            <div class="uk-modal-inner">
                <div class="uk-modal-header">
                    <span class="uk-modal-title">-- EDIT DATA GURU --</span>
                    <button class="uk-alert-close" onclick="closeModal('modalEditGuru')">[X]</button>
                </div>
                <form id="formEditGuru" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="uk-modal-body">
                        <div class="uk-form-group">
                            <label class="uk-form-label">NAMA LENGKAP</label>
                            <input type="text" id="editGuruNama" name="nama" class="uk-input" required>
                        </div>
                        <div class="uk-form-group">
                            <label class="uk-form-label">MATA PELAJARAN (DARI DATABASE MAPEL)</label>
                            <select id="editGuruMapel" name="mapel" class="uk-input" required>
                                <option value="" disabled>-- PILIH MATA PELAJARAN --</option>
                                @forelse($mapelList as $mp)
                                    <option value="{{ $mp }}">{{ $mp }}</option>
                                @empty
                                    <option value="" disabled>-- BELUM ADA DATA MAPEL --</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="uk-form-group">
                            <label class="uk-form-label">EMAIL</label>
                            <input type="email" id="editGuruEmail" name="email" class="uk-input" required>
                        </div>
                    </div>
                    <div class="uk-modal-footer">
                        <button type="button" class="uk-btn uk-btn-sm" onclick="closeModal('modalEditGuru')">BATAL</button>
                        <button type="submit" class="uk-btn uk-btn-sm uk-btn-orange">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.openEditGuru = function(guru) {
            document.getElementById('formEditGuru').action = '{{ url('guru') }}/' + guru.id;
            document.getElementById('editGuruNama').value = guru.nama;
            const m = document.getElementById('editGuruMapel');
            if (m) {
                let exists = Array.from(m.options).some(opt => opt.value === guru.mapel);
                if (!exists && guru.mapel) {
                    const opt = new Option(guru.mapel, guru.mapel, true, true);
                    m.add(opt);
                }
                m.value = guru.mapel;
            }
            document.getElementById('editGuruEmail').value = guru.email;
            openModal('modalEditGuru');
        };
    </script>
@endsection
