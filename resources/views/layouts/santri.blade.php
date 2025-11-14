<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Pondok Pesantren Al-Falah Putak')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @stack('styles')

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap');

        :root {
            --sidebar-width: 300px;
        }


        body {
            overflow-x: hidden;
            background-color: #f8f9fa;
            font-family: 'Figtree', sans-serif;
        }

        .text-success {
            color: #129990 !important;
        }

        .btn-success {
            background-color: #129990 !important;
            border-color: #129990 !important;
        }

        /* Sidebar Desktop */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background-color: #E7F5F4;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 1050;
        }

        /* Main content (desktop) */
        main {
            margin-left: var(--sidebar-width);
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        /* Hover & transition */
        .hover-bg-light:hover {
            background-color: #f8f9fa !important;
        }
        .transition {
            transition: all 0.3s ease;
        }

        /* Sidebar Mobile */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                top: 56px;
                height: calc(100vh - 56px);
                width: 260px;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            main {
                margin-left: 0 !important;
                padding-top: 70px; /* biar gak ketutup navbar di HP */
            }
        }
    </style>
</head>
<body>

    <!-- Topbar (mobile only) -->
    <nav class="navbar navbar-light bg-white shadow-sm fixed-top d-md-none">
        <div class="container-fluid">
            <button class="btn btn-outline-success me-2" id="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <span class="navbar-brand fw-bold text-success">Al-Falah Putak</span>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="sidebar p-4">
        <!-- Logo -->
        <div class="d-flex align-items-center mb-4">
            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                <span class="text-white fw-bold small">PP</span>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 fw-bold text-dark">Pondok Pesantren</h6>
                <h6 class="mb-0 fw-bold text-dark">Al-Falah Putak</h6>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="d-flex flex-column gap-2">
            <a href="{{ route('biodata-santri.index') }}" 
               class="d-flex align-items-center px-3 py-2 rounded text-decoration-none transition {{ request()->routeIs('biodata-santri.*') ? 'bg-success bg-opacity-10 text-success' : 'text-dark hover-bg-light' }}">
                <i class="fas fa-file-alt me-3" style="width: 20px;"></i>
                <span class="fw-medium">Biodata Calon Santri</span>
            </a>
            
            <a href="{{ route('pembayaran.index') }}" 
               class="d-flex align-items-center px-3 py-2 rounded text-decoration-none transition {{ request()->routeIs('pembayaran.*') ? 'bg-success bg-opacity-10 text-success' : 'text-dark hover-bg-light' }}">
                <i class="fas fa-credit-card me-3" style="width: 20px;"></i>
                <span class="fw-medium">Pembayaran</span>
            </a>
            
            <a href="#" class="d-flex align-items-center px-3 py-2 rounded text-decoration-none text-dark hover-bg-light">
                <i class="fas fa-graduation-cap me-3" style="width: 20px;"></i>
                <span class="fw-medium">Informasi Kelulusan</span>
            </a>
            
            <form method="POST" action="{{ route('logout') }}" class="pt-3">
                @csrf
                <button type="submit" class="d-flex align-items-center px-3 py-2 rounded border-0 bg-transparent text-dark w-100 text-start hover-bg-light">
                    <i class="fas fa-lock me-3" style="width: 20px;"></i>
                    <span class="fw-medium">Logout</span>
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="p-4">
        @yield('content')
    </main>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.getElementById('menu-toggle');
            toggleBtn?.addEventListener('click', () => {
                sidebar.classList.toggle('active');
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
