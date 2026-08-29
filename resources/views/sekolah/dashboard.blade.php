@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="uk-section-divider">-- DASHBOARD --</div>

    <div class="uk-slots-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 28px;">
        
        <div style="position: relative; background: var(--uk-white); padding: 2px; clip-path: polygon(10px 0, calc(100% - 10px) 0, 100% 10px, 100% calc(100% - 10px), calc(100% - 10px) 100%, 10px 100%, 0 calc(100% - 10px), 0 10px); box-shadow: 0 0 16px var(--uk-orange-glow); display: flex; flex-direction: column;">
            <div style="background-color: var(--uk-orange); color: var(--uk-black); padding: 18px 20px; display: flex; flex-direction: column; justify-content: space-between; height: 100%; gap: 16px; clip-path: polygon(9px 0, calc(100% - 9px) 0, 100% 9px, 100% calc(100% - 9px), calc(100% - 9px) 100%, 9px 100%, 0 calc(100% - 9px), 0 9px);">
                <div>
                    <div style="font-size: 16px; letter-spacing: 1.5px; font-weight: 700;">TOTAL SISWA TERDAFTAR</div>
                    <div style="font-size: 30px; font-weight: 700; margin-top: 4px; line-height: 1.2;">
                        {{ $stats['total_siswa'] }} SISWA
                    </div>
                </div>
                <div class="siswa">
                    <a href="{{ route('siswa.index') }}" class="uk-btn uk-btn-sm" style="width: 100%;">
                        BUKA DATA SISWA
                    </a>
                </div>
            </div>
        </div>

        <div style="position: relative; background: var(--uk-white); padding: 2px; clip-path: polygon(10px 0, calc(100% - 10px) 0, 100% 10px, 100% calc(100% - 10px), calc(100% - 10px) 100%, 10px 100%, 0 calc(100% - 10px), 0 10px); display: flex; flex-direction: column;">
            <div style="background-color: var(--uk-black); color: var(--uk-white); padding: 18px 20px; display: flex; flex-direction: column; justify-content: space-between; height: 100%; gap: 16px; clip-path: polygon(9px 0, calc(100% - 9px) 0, 100% 9px, 100% calc(100% - 9px), calc(100% - 9px) 100%, 9px 100%, 0 calc(100% - 9px), 0 9px);">
                <div>
                    <div style="font-size: 16px; color: var(--uk-gray); letter-spacing: 1.5px;">TENAGA PENGAJAR</div>
                    <div style="font-size: 30px; font-weight: 700; margin-top: 4px; line-height: 1.2;">
                        {{ $stats['total_guru'] }} GURU
                    </div>
                </div>
                <div>
                    <a href="{{ route('guru.index') }}" class="uk-btn uk-btn-sm" style="width: 100%;">
                        BUKA DATA GURU
                    </a>
                </div>
            </div>
        </div>

        <div style="position: relative; background: var(--uk-white); padding: 2px; clip-path: polygon(10px 0, calc(100% - 10px) 0, 100% 10px, 100% calc(100% - 10px), calc(100% - 10px) 100%, 10px 100%, 0 calc(100% - 10px), 0 10px); display: flex; flex-direction: column;">
            <div style="background-color: var(--uk-black); color: var(--uk-white); padding: 18px 20px; display: flex; flex-direction: column; justify-content: space-between; height: 100%; gap: 16px; clip-path: polygon(9px 0, calc(100% - 9px) 0, 100% 9px, 100% calc(100% - 9px), calc(100% - 9px) 100%, 9px 100%, 0 calc(100% - 9px), 0 9px);">
                <div>
                    <div style="font-size: 16px; color: var(--uk-gray); letter-spacing: 1.5px;">MATA PELAJARAN</div>
                    <div style="font-size: 30px; font-weight: 700; margin-top: 4px; line-height: 1.2;">
                        {{ $stats['total_mapel'] }} MAPEL
                    </div>
                </div>
                <div>
                    <a href="{{ route('mapel.index') }}" class="uk-btn uk-btn-sm" style="width: 100%;">
                        BUKA MATA PELAJARAN
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="uk-previews-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: start; margin-bottom: -30px;">
        
        <div class="uk-panel">
            <div class="uk-panel-inner">
                <div class="uk-panel-header">
                    <span class="uk-panel-title">-- SISWA TERBARU --</span>
                    <a href="{{ route('siswa.index') }}" class="uk-btn uk-btn-sm">SEMUA</a>
                </div>
                <table class="uk-table">
                    <thead>
                        <tr>
                            <th>NAMA</th>
                            <th>KELAS</th>
                            <th>ALAMAT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentSiswas as $s)
                            <tr>
                                <td style="color: var(--uk-white); font-weight: bold;">{{ $s->nama }}</td>
                                <td><span style="color: var(--uk-orange);">{{ $s->kelas }}</span></td>
                                <td style="color: var(--uk-gray);">{{ $s->alamat ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" style="text-align: center; color: var(--uk-gray); padding: 20px;">KOSONG</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="uk-panel">
            <div class="uk-panel-inner">
                <div class="uk-panel-header">
                    <span class="uk-panel-title">-- DIREKTORI GURU --</span>
                    <a href="{{ route('guru.index') }}" class="uk-btn uk-btn-sm">SEMUA</a>
                </div>
                <table class="uk-table">
                    <thead>
                        <tr>
                            <th>NAMA</th>
                            <th>MAPEL</th>
                            <th>EMAIL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentGurus as $g)
                            <tr>
                                <td style="color: var(--uk-white); font-weight: bold;">{{ $g->nama }}</td>
                                <td>{{ $g->mapel }}</td>
                                <td style="color: var(--uk-gray);">{{ $g->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" style="text-align: center; color: var(--uk-gray); padding: 20px;">KOSONG</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
