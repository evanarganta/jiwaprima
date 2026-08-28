<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Sekolah - Arknights Endfield Industrial Tactical Database">
    <title>ENDFIELD // ACADEMY INFRA_NEXUS - Sistem Informasi Sekolah</title>
    
    <!-- Google Fonts: Space Grotesk, Chakra Petch & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,400;0,600;0,700;1,700&family=JetBrains+Mono:wght@400;600;800&family=Space+Grotesk:wght@400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- FontAwesome for Tactical Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --ef-yellow: #FFE600;
            --ef-yellow-hover: #FFF04D;
            --ef-yellow-glow: rgba(255, 230, 0, 0.45);
            --ef-black: #0D0E11;
            --ef-dark: #16181D;
            --ef-dark-secondary: #22262F;
            --ef-gray-bg: #EAECEF;
            --ef-white: #FFFFFF;
            --ef-border: #D1D5DB;
            --ef-border-dark: #2F3542;
            --ef-text-muted: #6B7280;
            --ef-text-dark: #111827;
            --ef-danger: #FF385C;
            --ef-success: #00E676;
            --ef-font-tech: 'Chakra Petch', sans-serif;
            --ef-font-mono: 'JetBrains Mono', monospace;
            --ef-font-main: 'Space Grotesk', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--ef-font-main);
            background-color: #E6E8EC;
            background-image: 
                radial-gradient(#CBD2D9 1px, transparent 1px),
                linear-gradient(to right, rgba(200, 205, 215, 0.15) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(200, 205, 215, 0.15) 1px, transparent 1px);
            background-size: 24px 24px, 48px 48px, 48px 48px;
            color: var(--ef-text-dark);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Topographic / Grid Overlay */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            background: repeating-linear-gradient(
                -45deg,
                transparent,
                transparent 40px,
                rgba(0, 0, 0, 0.015) 40px,
                rgba(0, 0, 0, 0.015) 80px
            );
            z-index: 1;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 24px 20px;
            position: relative;
            z-index: 2;
        }

        /* Tactical Header */
        .ef-header {
            background: var(--ef-white);
            border-left: 8px solid var(--ef-yellow);
            border-top: 2px solid var(--ef-dark);
            border-right: 2px solid var(--ef-dark);
            border-bottom: 3px solid var(--ef-dark);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
        }

        .ef-header-stripe {
            height: 8px;
            background: repeating-linear-gradient(
                -45deg,
                var(--ef-yellow),
                var(--ef-yellow) 12px,
                var(--ef-black) 12px,
                var(--ef-black) 24px
            );
        }

        .ef-header-inner {
            padding: 20px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .ef-brand-group {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .ef-logo-mark {
            background: var(--ef-black);
            color: var(--ef-yellow);
            font-family: var(--ef-font-tech);
            font-size: 28px;
            font-weight: 800;
            padding: 10px 18px;
            letter-spacing: 2px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            clip-path: polygon(0 0, calc(100% - 12px) 0, 100% 12px, 100% 100%, 12px 100%, 0 calc(100% - 12px));
        }

        .ef-logo-mark span {
            color: var(--ef-white);
            font-size: 14px;
            background: #2D3039;
            padding: 2px 6px;
            letter-spacing: 1px;
        }

        .ef-title-box h1 {
            font-size: 24px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .ef-title-box .ef-tagline {
            font-family: var(--ef-font-mono);
            font-size: 11px;
            color: var(--ef-text-muted);
            letter-spacing: 1.5px;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .ef-badge-coord {
            background: var(--ef-gray-bg);
            border: 1px solid #CBD2D9;
            padding: 2px 8px;
            font-weight: 700;
            color: var(--ef-dark);
        }

        .ef-telemetry {
            display: flex;
            align-items: center;
            gap: 16px;
            font-family: var(--ef-font-mono);
        }

        .ef-telemetry-item {
            text-align: right;
            border-right: 2px solid var(--ef-yellow);
            padding-right: 14px;
        }

        .ef-telemetry-label {
            font-size: 10px;
            color: var(--ef-text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .ef-telemetry-val {
            font-size: 16px;
            font-weight: 800;
            color: var(--ef-black);
        }

        .ef-barcode {
            font-family: var(--ef-font-mono);
            letter-spacing: 4px;
            font-size: 20px;
            font-weight: 800;
            color: #1a1a1a;
            user-select: none;
        }

        /* Banner Notification */
        @keyframes slideDown {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .ef-alert-toast {
            animation: slideDown 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            background: var(--ef-dark);
            border-left: 6px solid var(--ef-yellow);
            color: var(--ef-white);
            padding: 14px 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: var(--ef-font-mono);
            font-size: 13px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 0 100%);
        }

        .ef-alert-toast .ef-alert-close {
            background: none;
            border: none;
            color: var(--ef-yellow);
            cursor: pointer;
            font-size: 16px;
        }

        /* Stats Bar Widget */
        .ef-stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .ef-stat-card {
            background: var(--ef-white);
            border: 2px solid #D8DCE3;
            border-top: 4px solid var(--ef-dark);
            padding: 16px 20px;
            position: relative;
            transition: all 0.2s ease;
            clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 0 100%);
        }

        .ef-stat-card:hover {
            border-top-color: var(--ef-yellow);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        }

        .ef-stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: var(--ef-font-mono);
            font-size: 11px;
            color: var(--ef-text-muted);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .ef-stat-number {
            font-family: var(--ef-font-tech);
            font-size: 36px;
            font-weight: 700;
            color: var(--ef-black);
            margin: 6px 0;
            display: flex;
            align-items: baseline;
            gap: 8px;
        }

        .ef-stat-sub {
            font-family: var(--ef-font-mono);
            font-size: 11px;
            color: #4B5563;
        }

        /* Stepper Navigation Tabs (Endfield STEP 01, STEP 02, STEP 03 Style) */
        .ef-nav-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .ef-nav-step {
            background: var(--ef-white);
            border: 2px solid #D1D5DB;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            position: relative;
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            clip-path: polygon(0 0, calc(100% - 14px) 0, 100% 14px, 100% 100%, 14px 100%, 0 calc(100% - 14px));
        }

        .ef-nav-step:hover {
            border-color: var(--ef-yellow);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .ef-nav-step.active {
            border-color: var(--ef-black);
            background: #FFFFFF;
            box-shadow: 0 0 0 2px var(--ef-black), 0 12px 28px rgba(0,0,0,0.12);
        }

        .ef-step-top {
            background: var(--ef-yellow);
            padding: 12px 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid var(--ef-dark);
        }

        .ef-step-number {
            font-family: var(--ef-font-tech);
            font-size: 22px;
            font-weight: 800;
            letter-spacing: 1.5px;
            color: var(--ef-black);
        }

        .ef-step-dots {
            display: grid;
            grid-template-columns: repeat(3, 4px);
            gap: 3px;
        }

        .ef-step-dot {
            width: 4px;
            height: 4px;
            background: var(--ef-black);
            opacity: 0.5;
        }

        .ef-step-body {
            padding: 18px;
            text-align: left;
        }

        .ef-step-title {
            font-family: var(--ef-font-main);
            font-size: 16px;
            font-weight: 700;
            color: var(--ef-black);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .ef-step-desc {
            font-family: var(--ef-font-mono);
            font-size: 11px;
            color: var(--ef-text-muted);
        }

        .ef-step-count-badge {
            margin-top: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--ef-dark);
            color: var(--ef-yellow);
            font-family: var(--ef-font-mono);
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
        }

        /* Action Toolbar */
        .ef-toolbar {
            background: var(--ef-white);
            border: 2px solid #D1D5DB;
            padding: 16px 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 0 100%);
        }

        .ef-search-box {
            display: flex;
            align-items: center;
            background: var(--ef-gray-bg);
            border: 1px solid #CBD2D9;
            padding: 0 14px;
            min-width: 320px;
        }

        .ef-search-box input {
            background: transparent;
            border: none;
            padding: 10px 8px;
            font-family: var(--ef-font-mono);
            font-size: 13px;
            width: 100%;
            outline: none;
            color: var(--ef-black);
        }

        .ef-search-box button {
            background: none;
            border: none;
            color: var(--ef-text-muted);
            cursor: pointer;
        }

        .ef-toolbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .ef-btn-primary {
            background: var(--ef-black);
            color: var(--ef-yellow);
            border: 2px solid var(--ef-black);
            font-family: var(--ef-font-tech);
            font-size: 13px;
            font-weight: 700;
            padding: 9px 18px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.2s ease;
            clip-path: polygon(0 0, calc(100% - 8px) 0, 100% 8px, 100% 100%, 8px 100%, 0 calc(100% - 8px));
        }

        .ef-btn-primary:hover {
            background: var(--ef-yellow);
            color: var(--ef-black);
            box-shadow: 0 0 15px var(--ef-yellow-glow);
        }

        .ef-view-toggle {
            display: flex;
            border: 1px solid #CBD2D9;
            background: var(--ef-gray-bg);
        }

        .ef-toggle-btn {
            background: transparent;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            color: var(--ef-text-muted);
            font-size: 13px;
            transition: 0.2s;
        }

        .ef-toggle-btn.active {
            background: var(--ef-dark);
            color: var(--ef-yellow);
        }

        /* Tactical Cards Grid */
        .ef-data-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .ef-card {
            background: var(--ef-white);
            border: 2px solid #D5D9E0;
            position: relative;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
            display: flex;
            flex-direction: column;
            clip-path: polygon(0 0, calc(100% - 14px) 0, 100% 14px, 100% 100%, 14px 100%, 0 calc(100% - 14px));
        }

        .ef-card:hover {
            border-color: var(--ef-dark);
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
        }

        .ef-card-header {
            background: #F4F6F9;
            border-bottom: 2px solid #E2E6EC;
            padding: 12px 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ef-card-id {
            font-family: var(--ef-font-mono);
            font-size: 11px;
            font-weight: 700;
            color: var(--ef-text-muted);
            letter-spacing: 1px;
        }

        .ef-card-badge {
            background: var(--ef-yellow);
            color: var(--ef-black);
            font-family: var(--ef-font-mono);
            font-size: 10px;
            font-weight: 800;
            padding: 2px 8px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .ef-card-body {
            padding: 20px 18px;
            flex-grow: 1;
        }

        .ef-card-name {
            font-size: 18px;
            font-weight: 700;
            color: var(--ef-black);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .ef-card-info-row {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-family: var(--ef-font-mono);
            font-size: 12px;
            color: #374151;
            margin-bottom: 8px;
            word-break: break-all;
        }

        .ef-card-info-row i {
            color: #9CA3AF;
            width: 14px;
            margin-top: 3px;
        }

        .ef-card-footer {
            background: #FAFAFB;
            border-top: 1px dashed #D5D9E0;
            padding: 12px 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ef-card-actions {
            display: flex;
            gap: 8px;
        }

        .ef-btn-action {
            background: var(--ef-dark);
            color: var(--ef-white);
            border: none;
            padding: 6px 12px;
            font-family: var(--ef-font-mono);
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: 0.2s;
            clip-path: polygon(0 0, calc(100% - 6px) 0, 100% 6px, 100% 100%, 0 100%);
        }

        .ef-btn-action:hover {
            background: var(--ef-yellow);
            color: var(--ef-black);
        }

        .ef-btn-danger {
            background: #FFF1F2;
            color: var(--ef-danger);
            border: 1px solid #FECDD3;
        }

        .ef-btn-danger:hover {
            background: var(--ef-danger);
            color: #FFF;
        }

        /* Tactical Data Table View */
        .ef-table-wrapper {
            background: var(--ef-white);
            border: 2px solid #D5D9E0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
            margin-bottom: 30px;
            overflow-x: auto;
            clip-path: polygon(0 0, calc(100% - 12px) 0, 100% 12px, 100% 100%, 12px 100%, 0 calc(100% - 12px));
        }

        .ef-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 13px;
        }

        .ef-table th {
            background: var(--ef-dark);
            color: var(--ef-yellow);
            font-family: var(--ef-font-tech);
            letter-spacing: 1px;
            padding: 14px 16px;
            font-weight: 700;
            text-transform: uppercase;
            border-bottom: 2px solid var(--ef-black);
        }

        .ef-table td {
            padding: 14px 16px;
            border-bottom: 1px solid #E5E7EB;
            font-family: var(--ef-font-mono);
            color: #1F2937;
        }

        .ef-table tr:hover td {
            background-color: #F8FAFC;
        }

        /* Empty State */
        .ef-empty-state {
            background: var(--ef-white);
            border: 2px dashed #CBD2D9;
            padding: 48px 24px;
            text-align: center;
            font-family: var(--ef-font-mono);
        }

        .ef-empty-state i {
            font-size: 40px;
            color: #9CA3AF;
            margin-bottom: 16px;
        }

        /* Modal Sci-Fi HUD */
        .ef-modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(13, 14, 17, 0.75);
            backdrop-filter: blur(4px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 999;
            padding: 20px;
        }

        .ef-modal-backdrop.active {
            display: flex;
        }

        .ef-modal-box {
            background: var(--ef-white);
            border: 2px solid var(--ef-dark);
            border-top: 6px solid var(--ef-yellow);
            width: 100%;
            max-width: 540px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
            position: relative;
            animation: slideDown 0.25s ease;
            clip-path: polygon(0 0, calc(100% - 14px) 0, 100% 14px, 100% 100%, 14px 100%, 0 calc(100% - 14px));
        }

        .ef-modal-header {
            background: var(--ef-dark);
            color: var(--ef-white);
            padding: 16px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ef-modal-title {
            font-family: var(--ef-font-tech);
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--ef-yellow);
        }

        .ef-modal-close {
            background: none;
            border: none;
            color: #9CA3AF;
            font-size: 18px;
            cursor: pointer;
            transition: 0.2s;
        }

        .ef-modal-close:hover {
            color: var(--ef-yellow);
        }

        .ef-modal-body {
            padding: 24px;
        }

        .ef-form-group {
            margin-bottom: 16px;
        }

        .ef-form-label {
            display: block;
            font-family: var(--ef-font-mono);
            font-size: 11px;
            font-weight: 700;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 6px;
        }

        .ef-form-input {
            width: 100%;
            padding: 10px 14px;
            background: #F8FAFC;
            border: 1px solid #CBD5E1;
            font-family: var(--ef-font-mono);
            font-size: 13px;
            color: var(--ef-black);
            outline: none;
            transition: 0.2s;
        }

        .ef-form-input:focus {
            background: #FFFFFF;
            border-color: var(--ef-black);
            box-shadow: 0 0 0 2px var(--ef-yellow);
        }

        .ef-modal-footer {
            background: #F1F5F9;
            border-top: 1px solid #E2E8F0;
            padding: 14px 24px;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .ef-btn-secondary {
            background: #E2E8F0;
            border: none;
            padding: 9px 16px;
            font-family: var(--ef-font-mono);
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            color: #475569;
        }

        /* Database & Migration Telemetry Footer */
        .ef-footer {
            background: var(--ef-dark);
            color: #9CA3AF;
            border-top: 4px solid var(--ef-yellow);
            padding: 24px 28px;
            margin-top: 40px;
            font-family: var(--ef-font-mono);
            font-size: 12px;
        }

        .ef-footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        .ef-pulse-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            background: var(--ef-success);
            border-radius: 50%;
            margin-right: 6px;
            box-shadow: 0 0 8px var(--ef-success);
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { opacity: 0.5; }
            50% { opacity: 1; }
            100% { opacity: 0.5; }
        }

        /* Responsive */
        @media (max-width: 900px) {
            .ef-nav-container {
                grid-template-columns: 1fr;
            }
            .ef-header-inner {
                flex-direction: column;
                align-items: flex-start;
            }
            .ef-telemetry {
                width: 100%;
                justify-content: space-between;
            }
            .ef-search-box {
                min-width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    
    <!-- TOP TACTICAL HEADER -->
    <header class="ef-header">
        <div class="ef-header-stripe"></div>
        <div class="ef-header-inner">
            <div class="ef-brand-group">
                <div class="ef-logo-mark">
                    <span>ARKK</span> ENDFIELD
                </div>
                <div class="ef-title-box">
                    <h1>// THE-ACADEMY <span style="color: #64748b; font-size: 18px;">[SISFO_V2.6]</span></h1>
                    <div class="ef-tagline">
                        <span class="ef-badge-coord">32°27'46"N, 44°25'28"E</span>
                        <span>// PROTOCOL: SCHOOL_INFO_SYSTEM</span>
                        <span style="color: #10b981;"><i class="fa-solid fa-circle-check"></i> ALL SYSTEMS NOMINAL</span>
                    </div>
                </div>
            </div>

            <div class="ef-telemetry">
                <div class="ef-telemetry-item">
                    <div class="ef-telemetry-label">DATABASE SYNC</div>
                    <div class="ef-telemetry-val" style="color: #00E676;">CONNECTED</div>
                </div>
                <div class="ef-telemetry-item">
                    <div class="ef-telemetry-label">SYS CLEARANCE</div>
                    <div class="ef-telemetry-val">LVL 4 // ADMIN</div>
                </div>
                <div class="ef-barcode">▮|||▮|▮||▮▮||</div>
            </div>
        </div>
    </header>

    <!-- TOAST NOTIFICATIONS / FLASH MESSAGE -->
    @if(session('success'))
        <div class="ef-alert-toast" id="alertToast">
            <div>
                <i class="fa-solid fa-square-check" style="color: var(--ef-yellow); margin-right: 8px;"></i>
                <strong>[STATUS OK]</strong> {{ session('success') }}
            </div>
            <button class="ef-alert-close" onclick="document.getElementById('alertToast').style.display='none'">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    @if($errors->any())
        <div class="ef-alert-toast" style="border-left-color: var(--ef-danger); background: #2B161B;" id="alertToastError">
            <div>
                <i class="fa-solid fa-triangle-exclamation" style="color: var(--ef-danger); margin-right: 8px;"></i>
                <strong>[VALIDATION ERROR]</strong>
                @foreach ($errors->all() as $error)
                    <span>{{ $error }} </span>
                @endforeach
            </div>
            <button class="ef-alert-close" onclick="document.getElementById('alertToastError').style.display='none'">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    <!-- HUD STATS COUNTER BAR -->
    <div class="ef-stats-grid">
        <div class="ef-stat-card">
            <div class="ef-stat-header">
                <span>FACULTY CORPS</span>
                <i class="fa-solid fa-chalkboard-user"></i>
            </div>
            <div class="ef-stat-number">
                {{ $stats['total_guru'] }} <span style="font-size: 14px; color: #9CA3AF;">INSTRUCTORS</span>
            </div>
            <div class="ef-stat-sub">Tabel: <code>guru</code> (Active)</div>
        </div>

        <div class="ef-stat-card">
            <div class="ef-stat-header">
                <span>CADET REGISTRY</span>
                <i class="fa-solid fa-user-graduate"></i>
            </div>
            <div class="ef-stat-number">
                {{ $stats['total_siswa'] }} <span style="font-size: 14px; color: #9CA3AF;">STUDENTS</span>
            </div>
            <div class="ef-stat-sub">Tabel: <code>siswa</code> + Kolom <code>alamat</code></div>
        </div>

        <div class="ef-stat-card">
            <div class="ef-stat-header">
                <span>CURRICULUM PROTOCOLS</span>
                <i class="fa-solid fa-book-bookmark"></i>
            </div>
            <div class="ef-stat-number">
                {{ $stats['total_mapel'] }} <span style="font-size: 14px; color: #9CA3AF;">MODULES</span>
            </div>
            <div class="ef-stat-sub">Total Alokasi: <strong>{{ $stats['total_jam'] }} Jam/Minggu</strong></div>
        </div>

        <div class="ef-stat-card">
            <div class="ef-stat-header">
                <span>CLASS DIVISIONS</span>
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <div class="ef-stat-number">
                {{ $stats['total_kelas'] }} <span style="font-size: 14px; color: #9CA3AF;">DIVISIONS</span>
            </div>
            <div class="ef-stat-sub">Status: <strong>OPTIMAL</strong></div>
        </div>
    </div>

    <!-- STEPPER NAVIGATION (ARKNIGHTS ENDFIELD 3-STEP STYLE) -->
    @php
        $activeTab = request('tab', 'guru');
    @endphp

    <div class="ef-nav-container">
        <!-- STEP 01: GURU -->
        <a href="?tab=guru" class="ef-nav-step {{ $activeTab === 'guru' ? 'active' : '' }}">
            <div class="ef-step-top">
                <span class="ef-step-number">STEP 01.</span>
                <div class="ef-step-dots">
                    <span class="ef-step-dot"></span><span class="ef-step-dot"></span><span class="ef-step-dot"></span>
                </div>
            </div>
            <div class="ef-step-body">
                <div class="ef-step-title">
                    <i class="fa-solid fa-user-tie"></i> INSTRUCTOR CORPS (GURU)
                </div>
                <div class="ef-step-desc">Pengelolaan pengajar, bidang studi, dan email instruktur</div>
                <div class="ef-step-count-badge">
                    <i class="fa-solid fa-database"></i> {{ count($gurus) }} REGISTERED
                </div>
            </div>
        </a>

        <!-- STEP 02: SISWA -->
        <a href="?tab=siswa" class="ef-nav-step {{ $activeTab === 'siswa' ? 'active' : '' }}">
            <div class="ef-step-top">
                <span class="ef-step-number">STEP 02.</span>
                <div class="ef-step-dots">
                    <span class="ef-step-dot"></span><span class="ef-step-dot"></span><span class="ef-step-dot"></span>
                </div>
            </div>
            <div class="ef-step-body">
                <div class="ef-step-title">
                    <i class="fa-solid fa-id-card-clip"></i> CADET ARCHIVE (SISWA)
                </div>
                <div class="ef-step-desc">Basis data siswa, kelas, email, & atribut kolom alamat</div>
                <div class="ef-step-count-badge">
                    <i class="fa-solid fa-database"></i> {{ count($siswas) }} REGISTERED
                </div>
            </div>
        </a>

        <!-- STEP 03: MAPEL -->
        <a href="?tab=mapel" class="ef-nav-step {{ $activeTab === 'mapel' ? 'active' : '' }}">
            <div class="ef-step-top">
                <span class="ef-step-number">STEP 03.</span>
                <div class="ef-step-dots">
                    <span class="ef-step-dot"></span><span class="ef-step-dot"></span><span class="ef-step-dot"></span>
                </div>
            </div>
            <div class="ef-step-body">
                <div class="ef-step-title">
                    <i class="fa-solid fa-atom"></i> STUDY PROTOCOLS (MAPEL)
                </div>
                <div class="ef-step-desc">Katalog mata pelajaran, kode modul, dan alokasi durasi jam</div>
                <div class="ef-step-count-badge">
                    <i class="fa-solid fa-database"></i> {{ count($mapels) }} REGISTERED
                </div>
            </div>
        </a>
    </div>

    <!-- ACTION TOOLBAR -->
    <div class="ef-toolbar">
        <form method="GET" action="{{ route('sekolah.index') }}" style="display: flex; gap: 8px;">
            <input type="hidden" name="tab" value="{{ $activeTab }}">
            <div class="ef-search-box">
                <i class="fa-solid fa-magnifying-glass" style="color: #9CA3AF; margin-right: 6px;"></i>
                <input type="text" name="q" value="{{ $search }}" placeholder="SEARCH TELEMETRY & RECORDS...">
                @if($search)
                    <a href="?tab={{ $activeTab }}" style="color: #9CA3AF; text-decoration: none; margin-right: 8px;"><i class="fa-solid fa-xmark"></i></a>
                @endif
                <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </form>

        <div class="ef-toolbar-actions">
            <div class="ef-view-toggle">
                <button class="ef-toggle-btn active" id="btnViewGrid" onclick="setViewMode('grid')" title="Tactical Grid"><i class="fa-solid fa-border-all"></i></button>
                <button class="ef-toggle-btn" id="btnViewTable" onclick="setViewMode('table')" title="Data Table Matrix"><i class="fa-solid fa-list-ul"></i></button>
            </div>

            @if($activeTab === 'guru')
                <button class="ef-btn-primary" onclick="openModal('modalAddGuru')">
                    <i class="fa-solid fa-plus"></i> NEW INSTRUCTOR
                </button>
            @elseif($activeTab === 'siswa')
                <button class="ef-btn-primary" onclick="openModal('modalAddSiswa')">
                    <i class="fa-solid fa-plus"></i> NEW CADET
                </button>
            @elseif($activeTab === 'mapel')
                <button class="ef-btn-primary" onclick="openModal('modalAddMapel')">
                    <i class="fa-solid fa-plus"></i> NEW PROTOCOL
                </button>
            @endif
        </div>
    </div>

    <!-- ==================== TAB 1: GURU ==================== -->
    @if($activeTab === 'guru')
        <!-- GRID VIEW -->
        <div id="viewGrid" class="ef-data-grid">
            @forelse($gurus as $guru)
                <div class="ef-card">
                    <div class="ef-card-header">
                        <span class="ef-card-id">// INSTRUCTOR_ID: #{{ str_pad($guru->id, 3, '0', STR_PAD_LEFT) }}</span>
                        <span class="ef-card-badge">STATUS: ACTIVE</span>
                    </div>
                    <div class="ef-card-body">
                        <div class="ef-card-name">
                            <i class="fa-solid fa-user-gear" style="color: #6366F1;"></i>
                            {{ $guru->nama }}
                        </div>
                        <div class="ef-card-info-row">
                            <i class="fa-solid fa-book"></i>
                            <span>Mapel: <strong>{{ $guru->mapel }}</strong></span>
                        </div>
                        <div class="ef-card-info-row">
                            <i class="fa-solid fa-envelope"></i>
                            <span>Email: <code>{{ $guru->email }}</code></span>
                        </div>
                    </div>
                    <div class="ef-card-footer">
                        <span style="font-family: var(--ef-font-mono); font-size: 10px; color: #9CA3AF;">
                            SYNCED: {{ $guru->updated_at->diffForHumans() }}
                        </span>
                        <div class="ef-card-actions">
                            <button class="ef-btn-action" onclick="openEditGuru({{ json_encode($guru) }})">
                                <i class="fa-solid fa-pen-to-square"></i> EDIT
                            </button>
                            <form method="POST" action="{{ route('guru.destroy', $guru) }}" onsubmit="return confirm('Hapus data instruktur {{ $guru->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ef-btn-action ef-btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1;">
                    <div class="ef-empty-state">
                        <i class="fa-solid fa-folder-open"></i>
                        <h3>NO INSTRUCTOR RECORDS FOUND</h3>
                        <p style="color: #9CA3AF; margin-top: 6px;">Tidak ada data guru yang cocok dengan pencarian.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- TABLE VIEW -->
        <div id="viewTable" class="ef-table-wrapper" style="display: none;">
            <table class="ef-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>NAMA INSTRUKTUR</th>
                        <th>BIDANG MAPEL</th>
                        <th>EMAIL</th>
                        <th>LAST SYNC</th>
                        <th style="text-align: right;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gurus as $guru)
                        <tr>
                            <td><strong>#{{ str_pad($guru->id, 3, '0', STR_PAD_LEFT) }}</strong></td>
                            <td style="font-weight: 700;">{{ $guru->nama }}</td>
                            <td><span style="background: #EEF2FF; color: #4338CA; padding: 2px 8px; border-radius: 4px;">{{ $guru->mapel }}</span></td>
                            <td><code>{{ $guru->email }}</code></td>
                            <td>{{ $guru->updated_at->format('Y-m-d H:i') }}</td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 6px;">
                                    <button class="ef-btn-action" onclick="openEditGuru({{ json_encode($guru) }})"><i class="fa-solid fa-pen"></i></button>
                                    <form method="POST" action="{{ route('guru.destroy', $guru) }}" onsubmit="return confirm('Hapus data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ef-btn-action ef-btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 30px;">Tidak ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif

    <!-- ==================== TAB 2: SISWA ==================== -->
    @if($activeTab === 'siswa')
        <!-- GRID VIEW -->
        <div id="viewGrid" class="ef-data-grid">
            @forelse($siswas as $siswa)
                <div class="ef-card">
                    <div class="ef-card-header">
                        <span class="ef-card-id">// CADET_ID: #{{ str_pad($siswa->id, 3, '0', STR_PAD_LEFT) }}</span>
                        <span class="ef-card-badge" style="background: #10B981; color: white;">{{ $siswa->kelas }}</span>
                    </div>
                    <div class="ef-card-body">
                        <div class="ef-card-name">
                            <i class="fa-solid fa-user-astronaut" style="color: #059669;"></i>
                            {{ $siswa->nama }}
                        </div>
                        <div class="ef-card-info-row">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <span>Kelas: <strong>{{ $siswa->kelas }}</strong></span>
                        </div>
                        <div class="ef-card-info-row">
                            <i class="fa-solid fa-envelope"></i>
                            <span>Email: <code>{{ $siswa->email ?? '-' }}</code></span>
                        </div>
                        <div class="ef-card-info-row">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Alamat: <em>{{ $siswa->alamat ?? 'Belum diisi' }}</em></span>
                        </div>
                    </div>
                    <div class="ef-card-footer">
                        <span style="font-family: var(--ef-font-mono); font-size: 10px; color: #9CA3AF;">
                            SYNCED: {{ $siswa->updated_at->diffForHumans() }}
                        </span>
                        <div class="ef-card-actions">
                            <button class="ef-btn-action" onclick="openEditSiswa({{ json_encode($siswa) }})">
                                <i class="fa-solid fa-pen-to-square"></i> EDIT
                            </button>
                            <form method="POST" action="{{ route('siswa.destroy', $siswa) }}" onsubmit="return confirm('Hapus data siswa {{ $siswa->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ef-btn-action ef-btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1;">
                    <div class="ef-empty-state">
                        <i class="fa-solid fa-folder-open"></i>
                        <h3>NO CADET RECORDS FOUND</h3>
                        <p style="color: #9CA3AF; margin-top: 6px;">Tidak ada data siswa yang cocok dengan kriteria.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- TABLE VIEW -->
        <div id="viewTable" class="ef-table-wrapper" style="display: none;">
            <table class="ef-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>NAMA SISWA</th>
                        <th>DIVISI KELAS</th>
                        <th>EMAIL</th>
                        <th>ALAMAT [MODIFIED FIELD]</th>
                        <th style="text-align: right;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($siswas as $siswa)
                        <tr>
                            <td><strong>#{{ str_pad($siswa->id, 3, '0', STR_PAD_LEFT) }}</strong></td>
                            <td style="font-weight: 700;">{{ $siswa->nama }}</td>
                            <td><span style="background: #ECFDF5; color: #047857; padding: 2px 8px; border-radius: 4px; font-weight: 700;">{{ $siswa->kelas }}</span></td>
                            <td><code>{{ $siswa->email ?? '-' }}</code></td>
                            <td><i class="fa-solid fa-location-dot" style="color: #9CA3AF; font-size: 11px;"></i> {{ $siswa->alamat ?? '-' }}</td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 6px;">
                                    <button class="ef-btn-action" onclick="openEditSiswa({{ json_encode($siswa) }})"><i class="fa-solid fa-pen"></i></button>
                                    <form method="POST" action="{{ route('siswa.destroy', $siswa) }}" onsubmit="return confirm('Hapus data siswa?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ef-btn-action ef-btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 30px;">Tidak ada data siswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif

    <!-- ==================== TAB 3: MAPEL ==================== -->
    @if($activeTab === 'mapel')
        <!-- GRID VIEW -->
        <div id="viewGrid" class="ef-data-grid">
            @forelse($mapels as $mapel)
                <div class="ef-card">
                    <div class="ef-card-header">
                        <span class="ef-card-id">// PROTOCOL_ID: #{{ str_pad($mapel->id, 3, '0', STR_PAD_LEFT) }}</span>
                        <span class="ef-card-badge" style="background: var(--ef-yellow); color: var(--ef-black);">{{ $mapel->jam }} JAM / WEEK</span>
                    </div>
                    <div class="ef-card-body">
                        <div class="ef-card-name">
                            <i class="fa-solid fa-microchip" style="color: #EAB308;"></i>
                            {{ $mapel->nama_mapel }}
                        </div>
                        <div class="ef-card-info-row">
                            <i class="fa-solid fa-clock"></i>
                            <span>Beban Belajar: <strong>{{ $mapel->jam }} Jam Pembelajaran</strong></span>
                        </div>
                        <div class="ef-card-info-row">
                            <i class="fa-solid fa-network-wired"></i>
                            <span>Status Kurikulum: <code style="color: #059669;">ACTIVE_STANDARDIZED</code></span>
                        </div>
                    </div>
                    <div class="ef-card-footer">
                        <span style="font-family: var(--ef-font-mono); font-size: 10px; color: #9CA3AF;">
                            SYNCED: {{ $mapel->updated_at->diffForHumans() }}
                        </span>
                        <div class="ef-card-actions">
                            <button class="ef-btn-action" onclick="openEditMapel({{ json_encode($mapel) }})">
                                <i class="fa-solid fa-pen-to-square"></i> EDIT
                            </button>
                            <form method="POST" action="{{ route('mapel.destroy', $mapel) }}" onsubmit="return confirm('Hapus mapel {{ $mapel->nama_mapel }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ef-btn-action ef-btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1;">
                    <div class="ef-empty-state">
                        <i class="fa-solid fa-folder-open"></i>
                        <h3>NO PROTOCOL RECORDS FOUND</h3>
                        <p style="color: #9CA3AF; margin-top: 6px;">Tidak ada modul mata pelajaran yang ditemukan.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- TABLE VIEW -->
        <div id="viewTable" class="ef-table-wrapper" style="display: none;">
            <table class="ef-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>NAMA MATA PELAJARAN</th>
                        <th>ALOKASI JAM</th>
                        <th>STATUS PROTOKOL</th>
                        <th>LAST SYNC</th>
                        <th style="text-align: right;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mapels as $mapel)
                        <tr>
                            <td><strong>#{{ str_pad($mapel->id, 3, '0', STR_PAD_LEFT) }}</strong></td>
                            <td style="font-weight: 700;">{{ $mapel->nama_mapel }}</td>
                            <td><span style="background: #FEF9C3; color: #854D0E; font-weight: 800; padding: 2px 10px; border-radius: 4px;">{{ $mapel->jam }} Jam/Minggu</span></td>
                            <td><span style="color: #10B981; font-weight: 600;">ACTIVE</span></td>
                            <td>{{ $mapel->updated_at->format('Y-m-d H:i') }}</td>
                            <td style="text-align: right;">
                                <div style="display: inline-flex; gap: 6px;">
                                    <button class="ef-btn-action" onclick="openEditMapel({{ json_encode($mapel) }})"><i class="fa-solid fa-pen"></i></button>
                                    <form method="POST" action="{{ route('mapel.destroy', $mapel) }}" onsubmit="return confirm('Hapus data mapel?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ef-btn-action ef-btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 30px;">Tidak ada modul mata pelajaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif

    <!-- TACTICAL TELEMETRY FOOTER -->
    <footer class="ef-footer">
        <div class="ef-footer-inner">
            <div>
                <span class="ef-pulse-dot"></span>
                <strong>SYSTEM STATUS:</strong> ONLINE // <code>ENDFIELD_DATABASE_NEXUS</code>
                <span style="margin: 0 10px; color: #4B5563;">|</span>
                <span>PHP 8.5 & Laravel Framework</span>
            </div>
            <div>
                <span>DATABASE: MySQL (jiwaprima)</span>
                <span style="margin: 0 10px; color: #4B5563;">|</span>
                <span style="color: var(--ef-yellow);">MIGRATIONS: ALL APPLIED & SEEDED</span>
            </div>
        </div>
    </footer>

</div>

<!-- ==================== MODALS: GURU ==================== -->
<!-- ADD GURU -->
<div class="ef-modal-backdrop" id="modalAddGuru">
    <div class="ef-modal-box">
        <div class="ef-modal-header">
            <div class="ef-modal-title"><i class="fa-solid fa-plus-circle"></i> INITIALIZE NEW INSTRUCTOR</div>
            <button class="ef-modal-close" onclick="closeModal('modalAddGuru')"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <form method="POST" action="{{ route('guru.store') }}">
            @csrf
            <div class="ef-modal-body">
                <div class="ef-form-group">
                    <label class="ef-form-label">Nama Lengkap & Gelar</label>
                    <input type="text" name="nama" class="ef-form-input" placeholder="contoh: Dr. Hendra Gunawan, M.T" required>
                </div>
                <div class="ef-form-group">
                    <label class="ef-form-label">Mata Pelajaran yang Diampu</label>
                    <input type="text" name="mapel" class="ef-form-input" placeholder="contoh: Rekayasa Perangkat Lunak" required>
                </div>
                <div class="ef-form-group">
                    <label class="ef-form-label">Alamat Email Resmi</label>
                    <input type="email" name="email" class="ef-form-input" placeholder="contoh: hendra@sekolah.sch.id" required>
                </div>
            </div>
            <div class="ef-modal-footer">
                <button type="button" class="ef-btn-secondary" onclick="closeModal('modalAddGuru')">BATAL</button>
                <button type="submit" class="ef-btn-primary"><i class="fa-solid fa-check"></i> SIMPAN RECORD</button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT GURU -->
<div class="ef-modal-backdrop" id="modalEditGuru">
    <div class="ef-modal-box">
        <div class="ef-modal-header">
            <div class="ef-modal-title"><i class="fa-solid fa-pen-to-square"></i> MODIFY INSTRUCTOR DATA</div>
            <button class="ef-modal-close" onclick="closeModal('modalEditGuru')"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <form id="formEditGuru" method="POST">
            @csrf
            @method('PUT')
            <div class="ef-modal-body">
                <div class="ef-form-group">
                    <label class="ef-form-label">Nama Lengkap</label>
                    <input type="text" id="editGuruNama" name="nama" class="ef-form-input" required>
                </div>
                <div class="ef-form-group">
                    <label class="ef-form-label">Mata Pelajaran</label>
                    <input type="text" id="editGuruMapel" name="mapel" class="ef-form-input" required>
                </div>
                <div class="ef-form-group">
                    <label class="ef-form-label">Alamat Email</label>
                    <input type="email" id="editGuruEmail" name="email" class="ef-form-input" required>
                </div>
            </div>
            <div class="ef-modal-footer">
                <button type="button" class="ef-btn-secondary" onclick="closeModal('modalEditGuru')">BATAL</button>
                <button type="submit" class="ef-btn-primary"><i class="fa-solid fa-check"></i> UPDATE DATA</button>
            </div>
        </form>
    </div>
</div>

<!-- ==================== MODALS: SISWA ==================== -->
<!-- ADD SISWA -->
<div class="ef-modal-backdrop" id="modalAddSiswa">
    <div class="ef-modal-box">
        <div class="ef-modal-header">
            <div class="ef-modal-title"><i class="fa-solid fa-plus-circle"></i> ENROLL NEW CADET (SISWA)</div>
            <button class="ef-modal-close" onclick="closeModal('modalAddSiswa')"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <form method="POST" action="{{ route('siswa.store') }}">
            @csrf
            <div class="ef-modal-body">
                <div class="ef-form-group">
                    <label class="ef-form-label">Nama Lengkap Siswa</label>
                    <input type="text" name="nama" class="ef-form-input" placeholder="contoh: Evan Arganta" required>
                </div>
                <div class="ef-form-group">
                    <label class="ef-form-label">Kelas / Divisi</label>
                    <input type="text" name="kelas" class="ef-form-input" placeholder="contoh: XI RPL 1" required>
                </div>
                <div class="ef-form-group">
                    <label class="ef-form-label">Email Siswa</label>
                    <input type="email" name="email" class="ef-form-input" placeholder="contoh: evan@student.sch.id">
                </div>
                <div class="ef-form-group">
                    <label class="ef-form-label">Alamat [Modified Migration Field]</label>
                    <textarea name="alamat" rows="2" class="ef-form-input" placeholder="contoh: Jl. Merdeka No. 45, Bandung"></textarea>
                </div>
            </div>
            <div class="ef-modal-footer">
                <button type="button" class="ef-btn-secondary" onclick="closeModal('modalAddSiswa')">BATAL</button>
                <button type="submit" class="ef-btn-primary"><i class="fa-solid fa-check"></i> SIMPAN SISWA</button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT SISWA -->
<div class="ef-modal-backdrop" id="modalEditSiswa">
    <div class="ef-modal-box">
        <div class="ef-modal-header">
            <div class="ef-modal-title"><i class="fa-solid fa-pen-to-square"></i> MODIFY CADET DATA</div>
            <button class="ef-modal-close" onclick="closeModal('modalEditSiswa')"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <form id="formEditSiswa" method="POST">
            @csrf
            @method('PUT')
            <div class="ef-modal-body">
                <div class="ef-form-group">
                    <label class="ef-form-label">Nama Siswa</label>
                    <input type="text" id="editSiswaNama" name="nama" class="ef-form-input" required>
                </div>
                <div class="ef-form-group">
                    <label class="ef-form-label">Kelas / Divisi</label>
                    <input type="text" id="editSiswaKelas" name="kelas" class="ef-form-input" required>
                </div>
                <div class="ef-form-group">
                    <label class="ef-form-label">Email</label>
                    <input type="email" id="editSiswaEmail" name="email" class="ef-form-input">
                </div>
                <div class="ef-form-group">
                    <label class="ef-form-label">Alamat</label>
                    <textarea id="editSiswaAlamat" name="alamat" rows="2" class="ef-form-input"></textarea>
                </div>
            </div>
            <div class="ef-modal-footer">
                <button type="button" class="ef-btn-secondary" onclick="closeModal('modalEditSiswa')">BATAL</button>
                <button type="submit" class="ef-btn-primary"><i class="fa-solid fa-check"></i> UPDATE DATA</button>
            </div>
        </form>
    </div>
</div>

<!-- ==================== MODALS: MAPEL ==================== -->
<!-- ADD MAPEL -->
<div class="ef-modal-backdrop" id="modalAddMapel">
    <div class="ef-modal-box">
        <div class="ef-modal-header">
            <div class="ef-modal-title"><i class="fa-solid fa-plus-circle"></i> INITIALIZE STUDY PROTOCOL (MAPEL)</div>
            <button class="ef-modal-close" onclick="closeModal('modalAddMapel')"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <form method="POST" action="{{ route('mapel.store') }}">
            @csrf
            <div class="ef-modal-body">
                <div class="ef-form-group">
                    <label class="ef-form-label">Nama Mata Pelajaran</label>
                    <input type="text" name="nama_mapel" class="ef-form-input" placeholder="contoh: Bahasa Ibrani" required>
                </div>
                <div class="ef-form-group">
                    <label class="ef-form-label">Durasi Jam per Minggu</label>
                    <input type="number" name="jam" min="1" max="40" class="ef-form-input" placeholder="contoh: 4" required>
                </div>
            </div>
            <div class="ef-modal-footer">
                <button type="button" class="ef-btn-secondary" onclick="closeModal('modalAddMapel')">BATAL</button>
                <button type="submit" class="ef-btn-primary"><i class="fa-solid fa-check"></i> DAFTARKAN MAPEL</button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT MAPEL -->
<div class="ef-modal-backdrop" id="modalEditMapel">
    <div class="ef-modal-box">
        <div class="ef-modal-header">
            <div class="ef-modal-title"><i class="fa-solid fa-pen-to-square"></i> MODIFY PROTOCOL DATA</div>
            <button class="ef-modal-close" onclick="closeModal('modalEditMapel')"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <form id="formEditMapel" method="POST">
            @csrf
            @method('PUT')
            <div class="ef-modal-body">
                <div class="ef-form-group">
                    <label class="ef-form-label">Nama Mata Pelajaran</label>
                    <input type="text" id="editMapelNama" name="nama_mapel" class="ef-form-input" required>
                </div>
                <div class="ef-form-group">
                    <label class="ef-form-label">Durasi Jam per Minggu</label>
                    <input type="number" id="editMapelJam" name="jam" min="1" max="40" class="ef-form-input" required>
                </div>
            </div>
            <div class="ef-modal-footer">
                <button type="button" class="ef-btn-secondary" onclick="closeModal('modalEditMapel')">BATAL</button>
                <button type="submit" class="ef-btn-primary"><i class="fa-solid fa-check"></i> UPDATE DATA</button>
            </div>
        </form>
    </div>
</div>

<!-- SCRIPTS FOR INTERACTIVITY & VIEW SWITCHING -->
<script>
    function openModal(id) {
        document.getElementById(id).classList.add('active');
    }

    function closeModal(id) {
        document.getElementById(id).classList.remove('active');
    }

    function openEditGuru(guru) {
        document.getElementById('formEditGuru').action = '/guru/' + guru.id;
        document.getElementById('editGuruNama').value = guru.nama;
        document.getElementById('editGuruMapel').value = guru.mapel;
        document.getElementById('editGuruEmail').value = guru.email;
        openModal('modalEditGuru');
    }

    function openEditSiswa(siswa) {
        document.getElementById('formEditSiswa').action = '/siswa/' + siswa.id;
        document.getElementById('editSiswaNama').value = siswa.nama;
        document.getElementById('editSiswaKelas').value = siswa.kelas;
        document.getElementById('editSiswaEmail').value = siswa.email || '';
        document.getElementById('editSiswaAlamat').value = siswa.alamat || '';
        openModal('modalEditSiswa');
    }

    function openEditMapel(mapel) {
        document.getElementById('formEditMapel').action = '/mapel/' + mapel.id;
        document.getElementById('editMapelNama').value = mapel.nama_mapel;
        document.getElementById('editMapelJam').value = mapel.jam;
        openModal('modalEditMapel');
    }

    function setViewMode(mode) {
        const grid = document.getElementById('viewGrid');
        const table = document.getElementById('viewTable');
        const btnGrid = document.getElementById('btnViewGrid');
        const btnTable = document.getElementById('btnViewTable');

        if (!grid || !table) return;

        if (mode === 'table') {
            grid.style.display = 'none';
            table.style.display = 'block';
            btnGrid.classList.remove('active');
            btnTable.classList.add('active');
        } else {
            grid.style.display = 'grid';
            table.style.display = 'none';
            btnTable.classList.remove('active');
            btnGrid.classList.add('active');
        }
    }

    // Close modal on escape or background click
    document.querySelectorAll('.ef-modal-backdrop').forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('active');
            }
        });
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            document.querySelectorAll('.ef-modal-backdrop').forEach(modal => {
                modal.classList.remove('active');
            });
        }
    });
</script>

</body>
</html>
