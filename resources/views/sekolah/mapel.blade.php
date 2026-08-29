@extends('layouts.app')

@section('title', 'Mata Pelajaran')

@section('content')
    <div class="uk-page-header">
        <div class="uk-section-divider" style="margin-bottom: 0;">-- MATA PELAJARAN --</div>
        <button class="uk-btn uk-btn-orange" onclick="openModal('modalAddMapel')">
            + TAMBAH MAPEL
        </button>
    </div>

    <div class="uk-panel">
        <div class="uk-panel-inner">
            <div class="uk-panel-header">
                <div class="uk-total-badge">
                    <div class="uk-total-badge-inner">
                        TOTAL: {{ $mapels->total() }} MAPEL
                    </div>
                </div>
                <form method="GET" action="{{ route('mapel.index') }}">
                    <div class="uk-search-box">
                        <div class="uk-search-box-inner">
                            <input type="text" name="q" value="{{ $search }}" placeholder="CARI MAPEL / JAM...">
                            @if($search)
                                <a href="{{ route('mapel.index') }}" style="color: var(--uk-gray); text-decoration: none; margin-right: 6px;">[X]</a>
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
                            <th>NAMA MATA PELAJARAN</th>
                            <th>ALOKASI JAM</th>
                            <th>STATUS</th>
                            <th style="text-align: right;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mapels as $index => $mapel)
                            <tr>
                                <td style="color: var(--uk-gray);">{{ $mapels->firstItem() + $index }}</td>
                                <td style="font-weight: bold; color: var(--uk-white);">{{ $mapel->nama_mapel }}</td>
                                <td><span style="color: var(--uk-orange);">{{ $mapel->jam }} JAM / MINGGU</span></td>
                                <td><span style="color: var(--uk-cyan);">AKTIF</span></td>
                                <td style="text-align: right;">
                                    <div style="display: inline-flex; gap: 8px;">
                                        <button class="uk-btn uk-btn-sm" onclick="openEditMapel({{ json_encode($mapel) }})">
                                            EDIT
                                        </button>
                                        <form method="POST" action="{{ route('mapel.destroy', $mapel) }}" onsubmit="return confirm('Hapus mata pelajaran ' + {{ json_encode($mapel->nama_mapel) }} + '?')">
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
                                    TIDAK ADA DATA MATA PELAJARAN
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($mapels->hasPages())
                <div style="padding: 14px 20px; border-top: 1px solid var(--uk-dark-gray);">
                    {{ $mapels->links('vendor.pagination.ultrakill') }}
                </div>
            @endif
        </div>
    </div>

    <div class="uk-modal-overlay" id="modalAddMapel">
        <div class="uk-modal">
            <div class="uk-modal-inner">
                <div class="uk-modal-header">
                    <span class="uk-modal-title">-- TAMBAH MATA PELAJARAN --</span>
                    <button class="uk-alert-close" onclick="closeModal('modalAddMapel')">[X]</button>
                </div>
                <form method="POST" action="{{ route('mapel.store') }}">
                    @csrf
                    <div class="uk-modal-body">
                        <div class="uk-form-group">
                            <label class="uk-form-label">NAMA MATA PELAJARAN</label>
                            <input type="text" name="nama_mapel" class="uk-input" placeholder="contoh: Pemrograman Berorientasi Objek" value="{{ old('nama_mapel') }}" required>
                        </div>
                        <div class="uk-form-group">
                            <label class="uk-form-label">ALOKASI JAM PER MINGGU</label>
                            <input type="number" name="jam" min="1" max="40" class="uk-input" placeholder="contoh: 4" value="{{ old('jam') }}" required>
                        </div>
                    </div>
                    <div class="uk-modal-footer">
                        <button type="button" class="uk-btn uk-btn-sm" onclick="closeModal('modalAddMapel')">BATAL</button>
                        <button type="submit" class="uk-btn uk-btn-sm uk-btn-orange">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="uk-modal-overlay" id="modalEditMapel">
        <div class="uk-modal">
            <div class="uk-modal-inner">
                <div class="uk-modal-header">
                    <span class="uk-modal-title">-- EDIT MATA PELAJARAN --</span>
                    <button class="uk-alert-close" onclick="closeModal('modalEditMapel')">[X]</button>
                </div>
                <form id="formEditMapel" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="uk-modal-body">
                        <div class="uk-form-group">
                            <label class="uk-form-label">NAMA MATA PELAJARAN</label>
                            <input type="text" id="editMapelNama" name="nama_mapel" class="uk-input" required>
                        </div>
                        <div class="uk-form-group">
                            <label class="uk-form-label">ALOKASI JAM</label>
                            <input type="number" id="editMapelJam" name="jam" min="1" max="40" class="uk-input" required>
                        </div>
                    </div>
                    <div class="uk-modal-footer">
                        <button type="button" class="uk-btn uk-btn-sm" onclick="closeModal('modalEditMapel')">BATAL</button>
                        <button type="submit" class="uk-btn uk-btn-sm uk-btn-orange">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.openEditMapel = function(mapel) {
            document.getElementById('formEditMapel').action = '{{ url('mapel') }}/' + mapel.id;
            document.getElementById('editMapelNama').value = mapel.nama_mapel;
            document.getElementById('editMapelJam').value = mapel.jam;
            openModal('modalEditMapel');
        };
    </script>
@endsection
