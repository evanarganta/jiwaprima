<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JIWAPRIMA</title>
    
    <link rel="preload" as="image" href="{{ asset('images/logo.png') }}" fetchpriority="high">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=VT323&display=swap');

        :root {
            --uk-black: #000000;
            --uk-bg: #050505;
            --uk-surface: #0a0a0a;
            --uk-white: #FFFFFF;
            --uk-gray: #888888;
            --uk-dark-gray: #222222;
            --uk-orange: #FFAA00;
            --uk-orange-glow: rgba(255, 170, 0, 0.5);
            --uk-red: #FF2200;
            --uk-cyan: #00F0FF;
            --uk-font: 'VT323', monospace;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--uk-black);
            color: var(--uk-white);
            font-family: var(--uk-font);
            font-size: 21px;
            letter-spacing: 1px;
            min-height: 100vh;
            padding: 16px;
            display: flex;
            flex-direction: column;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 32px 32px;
        }

        .uk-screen-frame {
            position: relative;
            min-height: calc(100vh - 32px);
            display: flex;
            flex-direction: column;
            background-color: var(--uk-white);
            padding: 2px;
            clip-path: polygon(
                16px 0, calc(100% - 16px) 0,
                100% 16px, 100% calc(100% - 16px),
                calc(100% - 16px) 100%, 16px 100%,
                0 calc(100% - 16px), 0 16px
            );
        }

        .uk-screen-frame-inner {
            background-color: rgba(5, 5, 5, 0.98);
            width: 100%;
            height: 100%;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            clip-path: polygon(
                15px 0, calc(100% - 15px) 0,
                100% 15px, 100% calc(100% - 15px),
                calc(100% - 15px) 100%, 15px 100%,
                0 calc(100% - 15px), 0 15px
            );
        }

        .uk-navbar {
            border-bottom: 2px solid var(--uk-white);
            padding: 14px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            background-color: var(--uk-black);
        }

        .uk-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .uk-brand-logo {
            height: 30px;
            max-width: 220px;
            object-fit: contain;
            display: block;
        }

        .uk-nav-menu {
            display: flex;
            gap: 12px;
            list-style: none;
            flex-wrap: wrap;
        }

        .uk-nav-btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 24px;
            font-family: var(--uk-font);
            font-size: 22px;
            letter-spacing: 1.5px;
            text-decoration: none;
            text-transform: uppercase;
            color: var(--uk-white);
            background: var(--uk-white);
            border: none;
            cursor: pointer;
            z-index: 1;
            clip-path: polygon(
                8px 0, calc(100% - 8px) 0,
                100% 8px, 100% calc(100% - 8px),
                calc(100% - 8px) 100%, 8px 100%,
                0 calc(100% - 8px), 0 8px
            );
        }

        .uk-nav-btn::after {
            content: '';
            position: absolute;
            inset: 2px;
            background: var(--uk-black);
            z-index: -1;
            transition: background 0.1s ease;
            clip-path: polygon(
                7px 0, calc(100% - 7px) 0,
                100% 7px, 100% calc(100% - 7px),
                calc(100% - 7px) 100%, 7px 100%,
                0 calc(100% - 7px), 0 7px
            );
        }

        .uk-nav-btn:hover {
            color: var(--uk-black) !important;
        }

        .uk-nav-btn:hover::after {
            background: var(--uk-white);
        }

        .uk-nav-btn.active {
            color: var(--uk-black) !important;
            box-shadow: 0 0 14px var(--uk-orange-glow);
        }

        .uk-nav-btn.active::after {
            background: var(--uk-orange);
        }

        .uk-main {
            padding: 28px 24px;
            flex-grow: 1;
            max-width: 1500px;
            width: 100%;
            margin: 0 auto;
        }

        .uk-section-divider {
            text-align: center;
            font-size: 28px;
            letter-spacing: 3px;
            color: var(--uk-white);
            margin-bottom: 24px;
            text-transform: uppercase;
        }

        .uk-page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .uk-btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 8px 22px;
            font-family: var(--uk-font);
            font-size: 21px;
            letter-spacing: 1.5px;
            cursor: pointer;
            text-decoration: none;
            text-transform: uppercase;
            color: var(--uk-white);
            background: var(--uk-white);
            border: none;
            z-index: 1;
            clip-path: polygon(
                8px 0, calc(100% - 8px) 0,
                100% 8px, 100% calc(100% - 8px),
                calc(100% - 8px) 100%, 8px 100%,
                0 calc(100% - 8px), 0 8px
            );
        }

        .uk-btn::after {
            content: '';
            position: absolute;
            inset: 2px;
            background: var(--uk-black);
            z-index: -1;
            transition: background 0.1s ease;
            clip-path: polygon(
                7px 0, calc(100% - 7px) 0,
                100% 7px, 100% calc(100% - 7px),
                calc(100% - 7px) 100%, 7px 100%,
                0 calc(100% - 7px), 0 7px
            );
        }

        .uk-btn:hover {
            color: var(--uk-black) !important;
        }

        .uk-btn:hover::after {
            background: var(--uk-white);
        }

        .uk-btn-orange {
            color: var(--uk-black) !important;
        }

        .uk-btn-orange::after {
            background: var(--uk-orange);
        }

        .uk-btn-orange:hover::after {
            background: var(--uk-white);
        }

        .uk-btn-sm {
            padding: 4px 14px;
            font-size: 18px;
            clip-path: polygon(
                6px 0, calc(100% - 6px) 0,
                100% 6px, 100% calc(100% - 6px),
                calc(100% - 6px) 100%, 6px 100%,
                0 calc(100% - 6px), 0 6px
            );
        }

        .uk-btn-sm::after {
            inset: 2px;
            clip-path: polygon(
                5px 0, calc(100% - 5px) 0,
                100% 5px, 100% calc(100% - 5px),
                calc(100% - 5px) 100%, 5px 100%,
                0 calc(100% - 5px), 0 5px
            );
        }

        .uk-btn-delete {
            background: var(--uk-red);
            color: var(--uk-red);
        }

        .uk-btn-delete::after {
            background: var(--uk-black);
        }

        .uk-btn-delete:hover {
            color: var(--uk-white) !important;
        }

        .uk-btn-delete:hover::after {
            background: var(--uk-red);
        }

        .uk-panel {
            position: relative;
            background-color: var(--uk-white);
            padding: 2px;
            margin-bottom: 24px;
            align-self: start;
            height: fit-content;
            clip-path: polygon(
                12px 0, calc(100% - 12px) 0,
                100% 12px, 100% calc(100% - 12px),
                calc(100% - 12px) 100%, 12px 100%,
                0 calc(100% - 12px), 0 12px
            );
        }

        .uk-panel-inner {
            background-color: var(--uk-black);
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            clip-path: polygon(
                11px 0, calc(100% - 11px) 0,
                100% 11px, 100% calc(100% - 11px),
                calc(100% - 11px) 100%, 11px 100%,
                0 calc(100% - 11px), 0 11px
            );
        }

        .uk-panel-header {
            padding: 14px 20px;
            border-bottom: 2px solid var(--uk-white);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            background-color: #0d0d0d;
        }

        .uk-panel-title {
            font-size: 23px;
            letter-spacing: 1.5px;
        }

        .uk-total-badge {
            position: relative;
            display: inline-flex;
            align-items: center;
            background: var(--uk-white);
            padding: 2px;
            clip-path: polygon(
                8px 0, calc(100% - 8px) 0,
                100% 8px, 100% calc(100% - 8px),
                calc(100% - 8px) 100%, 8px 100%,
                0 calc(100% - 8px), 0 8px
            );
        }

        .uk-total-badge-inner {
            background: var(--uk-black);
            color: var(--uk-white);
            display: flex;
            align-items: center;
            padding: 6px 18px;
            font-family: var(--uk-font);
            font-size: 22px;
            letter-spacing: 1.5px;
            height: 100%;
            clip-path: polygon(
                7px 0, calc(100% - 7px) 0,
                100% 7px, 100% calc(100% - 7px),
                calc(100% - 7px) 100%, 7px 100%,
                0 calc(100% - 7px), 0 7px
            );
        }

        .uk-search-box {
            position: relative;
            display: flex;
            align-items: center;
            background: var(--uk-white);
            padding: 2px;
            min-width: 400px;
            clip-path: polygon(
                8px 0, calc(100% - 8px) 0,
                100% 8px, 100% calc(100% - 8px),
                calc(100% - 8px) 100%, 8px 100%,
                0 calc(100% - 8px), 0 8px
            );
        }

        .uk-search-box-inner {
            background: var(--uk-black);
            display: flex;
            align-items: center;
            width: 100%;
            padding: 4px 12px;
            clip-path: polygon(
                7px 0, calc(100% - 7px) 0,
                100% 7px, 100% calc(100% - 7px),
                calc(100% - 7px) 100%, 7px 100%,
                0 calc(100% - 7px), 0 7px
            );
        }

        .uk-search-box input {
            background: transparent;
            border: none;
            padding: 6px 8px;
            color: var(--uk-white);
            font-family: var(--uk-font);
            font-size: 22px;
            outline: none;
            width: 100%;
            letter-spacing: 1px;
        }

        .uk-search-box input::placeholder {
            color: #555555;
        }

        .uk-search-box button {
            background: none;
            border: none;
            color: var(--uk-orange);
            font-family: var(--uk-font);
            font-size: 20px;
            cursor: pointer;
            padding-left: 8px;
            letter-spacing: 1px;
        }

        .uk-table-wrapper {
            width: 100%;
            overflow: visible;
        }

        .uk-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 20px;
        }

        .uk-table th {
            position: sticky;
            top: 0;
            z-index: 2;
            background: #111111;
            color: var(--uk-gray);
            font-size: 19px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 12px 18px;
            border-bottom: 2px solid var(--uk-white);
            text-align: left;
        }

        .uk-table td {
            padding: 12px 18px;
            border-bottom: 1px solid var(--uk-dark-gray);
        }

        .uk-table tr:last-child td {
            border-bottom: none;
        }

        .uk-pagination,
        nav[role="navigation"] {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            font-family: var(--uk-font);
            font-size: 19px;
            color: var(--uk-gray);
        }

        .uk-pagination svg,
        nav[role="navigation"] svg {
            display: none !important;
        }

        .uk-page-btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            font-family: var(--uk-font);
            font-size: 22px;
            letter-spacing: 0;
            text-decoration: none;
            text-align: center;
            color: var(--uk-white);
            background: var(--uk-white);
            border: none;
            cursor: pointer;
            z-index: 1;
            clip-path: polygon(
                7px 0, calc(100% - 7px) 0,
                100% 7px, 100% calc(100% - 7px),
                calc(100% - 7px) 100%, 7px 100%,
                0 calc(100% - 7px), 0 7px
            );
        }

        .uk-page-btn::after {
            content: '';
            position: absolute;
            inset: 2px;
            background: var(--uk-black);
            z-index: -1;
            transition: background 0.1s ease;
            clip-path: polygon(
                6px 0, calc(100% - 6px) 0,
                100% 6px, 100% calc(100% - 6px),
                calc(100% - 6px) 100%, 6px 100%,
                0 calc(100% - 6px), 0 6px
            );
        }

        .uk-page-btn:hover {
            color: var(--uk-black) !important;
        }

        .uk-page-btn:hover::after {
            background: var(--uk-white);
        }

        .uk-page-btn.uk-page-active {
            color: var(--uk-black) !important;
            box-shadow: 0 0 10px var(--uk-orange-glow);
        }

        .uk-page-btn.uk-page-active::after {
            background: var(--uk-orange);
        }

        .uk-toast-container {
            position: fixed;
            top: 24px;
            right: 24px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 12px;
            max-width: 440px;
            pointer-events: none;
        }

        .uk-alert {
            position: relative;
            background: var(--uk-orange);
            padding: 2px;
            pointer-events: auto;
            box-shadow: 0 0 20px var(--uk-orange-glow);
            animation: ukToastSlideIn 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            clip-path: polygon(
                8px 0, calc(100% - 8px) 0,
                100% 8px, 100% calc(100% - 8px),
                calc(100% - 8px) 100%, 8px 100%,
                0 calc(100% - 8px), 0 8px
            );
        }

        @keyframes ukToastSlideIn {
            from {
                transform: translateX(60px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .uk-alert-inner {
            background-color: #0c0800;
            color: var(--uk-orange);
            padding: 14px 20px;
            font-size: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            clip-path: polygon(
                7px 0, calc(100% - 7px) 0,
                100% 7px, 100% calc(100% - 7px),
                calc(100% - 7px) 100%, 7px 100%,
                0 calc(100% - 7px), 0 7px
            );
        }

        .uk-alert-danger {
            background: var(--uk-red);
            box-shadow: 0 0 20px rgba(255, 34, 0, 0.4);
        }

        .uk-alert-danger .uk-alert-inner {
            background-color: #110303;
            color: var(--uk-red);
        }

        .uk-alert-close {
            background: none;
            border: none;
            color: inherit;
            cursor: pointer;
            font-family: var(--uk-font);
            font-size: 22px;
            padding-left: 6px;
        }

        .uk-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 100;
            padding: 20px;
        }

        .uk-modal-overlay.active {
            display: flex;
        }

        .uk-modal {
            position: relative;
            background-color: var(--uk-white);
            padding: 2px;
            width: 100%;
            max-width: 540px;
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.15);
            clip-path: polygon(
                14px 0, calc(100% - 14px) 0,
                100% 14px, 100% calc(100% - 14px),
                calc(100% - 14px) 100%, 14px 100%,
                0 calc(100% - 14px), 0 14px
            );
        }

        .uk-modal-inner {
            background-color: var(--uk-black);
            width: 100%;
            clip-path: polygon(
                13px 0, calc(100% - 13px) 0,
                100% 13px, 100% calc(100% - 13px),
                calc(100% - 13px) 100%, 13px 100%,
                0 calc(100% - 13px), 0 13px
            );
        }

        .uk-modal-header {
            padding: 16px 20px;
            border-bottom: 2px solid var(--uk-white);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #0e0e0e;
        }

        .uk-modal-title {
            font-size: 24px;
            color: var(--uk-white);
            letter-spacing: 1.5px;
        }

        .uk-modal-body {
            padding: 22px 20px;
        }

        .uk-form-group {
            margin-bottom: 18px;
        }

        .uk-form-label {
            display: block;
            font-size: 19px;
            color: var(--uk-gray);
            margin-bottom: 6px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .uk-input {
            width: 100%;
            background-color: #0c0c0c;
            border: 1px solid var(--uk-white);
            padding: 10px 14px;
            font-family: var(--uk-font);
            font-size: 21px;
            color: var(--uk-white);
            outline: none;
            letter-spacing: 1px;
        }

        select.uk-input {
            cursor: pointer;
        }

        select.uk-input option {
            background-color: #111111;
            color: var(--uk-white);
            padding: 8px;
            font-family: var(--uk-font);
            font-size: 20px;
        }

        .uk-input:focus {
            border-color: var(--uk-orange);
            box-shadow: 0 0 8px var(--uk-orange-glow);
        }

        .uk-modal-footer {
            padding: 14px 20px;
            border-top: 1px solid var(--uk-dark-gray);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            background-color: #0a0a0a;
        }

        .uk-footer {
            border-top: 2px solid var(--uk-white);
            padding: 16px 24px;
            font-size: 19px;
            color: var(--uk-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            background-color: var(--uk-black);
        }

        @media (max-width: 900px) {
            .uk-slots-grid,
            .uk-previews-grid {
                grid-template-columns: 1fr !important;
            }
        }

        @media (max-width: 768px) {
            .uk-navbar {
                flex-direction: column;
                align-items: flex-start;
            }
            .uk-nav-menu {
                width: 100%;
            }
            .uk-search-box {
                min-width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="uk-screen-frame">
        <div class="uk-screen-frame-inner">
            
            <nav class="uk-navbar">
                <a href="{{ route('dashboard') }}" class="uk-brand">
                    <img src="{{ asset('images/logo.png') }}" alt="JIWAPRIMA" class="uk-brand-logo" fetchpriority="high" loading="eager" decoding="sync">
                </a>

                <ul class="uk-nav-menu">
                    <li>
                        <a href="{{ route('dashboard') }}" class="uk-nav-btn {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            DASHBOARD
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('guru.index') }}" class="uk-nav-btn {{ request()->routeIs('guru.*') ? 'active' : '' }}">
                            GURU
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('siswa.index') }}" class="uk-nav-btn {{ request()->routeIs('siswa.*') ? 'active' : '' }}">
                            SISWA
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mapel.index') }}" class="uk-nav-btn {{ request()->routeIs('mapel.*') ? 'active' : '' }}">
                            MATA PELAJARAN
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="uk-toast-container">
                @if(session('success'))
                    <div class="uk-alert" id="ukAlert">
                        <div class="uk-alert-inner">
                            <span>{{ session('success') }}</span>
                            <button class="uk-alert-close" onclick="document.getElementById('ukAlert').remove()">[X]</button>
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="uk-alert uk-alert-danger" id="ukErrorAlert">
                        <div class="uk-alert-inner">
                            <div>
                                <strong>ERROR:</strong>
                                @foreach($errors->all() as $err)
                                    <span>{{ $err }} </span>
                                @endforeach
                            </div>
                            <button class="uk-alert-close" onclick="document.getElementById('ukErrorAlert').remove()">[X]</button>
                        </div>
                    </div>
                @endif
            </div>

            <main class="uk-main">

                @yield('content')
            </main>

            <footer class="uk-footer">
                <div>
                    LARAVEL 13.29.0... OK
                </div>
                <div>
                    PHP 8.5.8... READY
                </div>
            </footer>

        </div>
    </div>

    @yield('scripts')

    <script>
        function openModal(id) {
            const el = document.getElementById(id);
            if (el) el.classList.add('active');
        }

        function closeModal(id) {
            const el = document.getElementById(id);
            if (el) el.classList.remove('active');
        }

        window.openEditGuru = function(guru) {
            const form = document.getElementById('formEditGuru');
            if (form) form.action = '/guru/' + guru.id;
            const n = document.getElementById('editGuruNama'); if (n) n.value = guru.nama;
            const m = document.getElementById('editGuruMapel');
            if (m) {
                let exists = Array.from(m.options).some(opt => opt.value === guru.mapel);
                if (!exists && guru.mapel) {
                    const opt = new Option(guru.mapel, guru.mapel, true, true);
                    m.add(opt);
                }
                m.value = guru.mapel;
            }
            const em = document.getElementById('editGuruEmail'); if (em) em.value = guru.email;
            openModal('modalEditGuru');
        };

        window.openEditSiswa = function(siswa) {
            const form = document.getElementById('formEditSiswa');
            if (form) form.action = '/siswa/' + siswa.id;
            const n = document.getElementById('editSiswaNama'); if (n) n.value = siswa.nama;
            const k = document.getElementById('editSiswaKelas');
            if (k) {
                let exists = Array.from(k.options).some(opt => opt.value === siswa.kelas);
                if (!exists && siswa.kelas) {
                    const opt = new Option(siswa.kelas, siswa.kelas, true, true);
                    k.add(opt);
                }
                k.value = siswa.kelas;
            }
            const em = document.getElementById('editSiswaEmail'); if (em) em.value = siswa.email || '';
            const al = document.getElementById('editSiswaAlamat'); if (al) al.value = siswa.alamat || '';
            openModal('modalEditSiswa');
        };

        window.openEditMapel = function(mapel) {
            const form = document.getElementById('formEditMapel');
            if (form) form.action = '/mapel/' + mapel.id;
            const n = document.getElementById('editMapelNama'); if (n) n.value = mapel.nama_mapel;
            const j = document.getElementById('editMapelJam'); if (j) j.value = mapel.jam;
            openModal('modalEditMapel');
        };

        function initModals() {
            document.querySelectorAll('.uk-modal-overlay').forEach(modal => {
                modal.onclick = (e) => {
                    if (e.target === modal) closeModal(modal.id);
                };
            });
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                document.querySelectorAll('.uk-modal-overlay').forEach(modal => {
                    closeModal(modal.id);
                });
            }
        });

        function initToasts() {
            document.querySelectorAll('.uk-alert').forEach(alert => {
                setTimeout(() => {
                    if (alert && alert.parentElement) {
                        alert.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                        alert.style.opacity = '0';
                        alert.style.transform = 'translateX(60px)';
                        setTimeout(() => alert.remove(), 400);
                    }
                }, 4000);
            });
        }

        async function navigateTo(url, push = true) {
            try {
                const response = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                if (!response.ok) {
                    window.location.href = url;
                    return;
                }
                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');

                const newMain = doc.querySelector('.uk-main');
                const currentMain = document.querySelector('.uk-main');
                if (newMain && currentMain) {
                    currentMain.innerHTML = newMain.innerHTML;
                }

                const newNav = doc.querySelector('.uk-nav-menu');
                const currentNav = document.querySelector('.uk-nav-menu');
                if (newNav && currentNav) {
                    currentNav.innerHTML = newNav.innerHTML;
                }

                const newToast = doc.querySelector('.uk-toast-container');
                const currentToast = document.querySelector('.uk-toast-container');
                if (newToast && currentToast) {
                    currentToast.innerHTML = newToast.innerHTML;
                    initToasts();
                }

                document.title = doc.title;
                if (push) {
                    history.pushState({ url }, doc.title, url);
                }

                if (currentMain) {
                    currentMain.querySelectorAll('script').forEach(s => {
                        try {
                            const fn = new Function(s.textContent);
                            fn();
                        } catch (e) {}
                    });
                }

                initModals();
            } catch (err) {
                window.location.href = url;
            }
        }

        document.addEventListener('click', (e) => {
            const link = e.target.closest('a');
            if (link && link.href && link.origin === window.location.origin && !link.target && !link.hasAttribute('download')) {
                const url = link.href;
                if (!url.includes('#') && !link.closest('.uk-alert-close')) {
                    e.preventDefault();
                    navigateTo(url);
                }
            }
        });

        window.addEventListener('popstate', (e) => {
            navigateTo(window.location.href, false);
        });

        initModals();
        initToasts();
    </script>
</body>
</html>
