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

        /* Navigation menu */
        .nav-menu-item {
            cursor: pointer;
            user-select: none;
        }

        .nav-submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .nav-menu-item.active .nav-submenu {
            max-height: 500px;
        }

        .nav-submenu-item {
            padding-left: 52px;
            padding-top: 8px;
            padding-bottom: 8px;
            position: relative;
        }

        .nav-submenu-item::before {
            content: '•';
            position: absolute;
            left: 36px;
            color: #129990;
            font-weight: bold;
        }

        .nav-submenu-item a {
            color: #333;
            text-decoration: none;
            display: block;
        }

        .nav-submenu-item a:hover {
            color: #129990;
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
            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border: 2px solid #129990; background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);">
                <i class="fas fa-mosque text-dark" style="font-size: 20px;"></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 fw-bold" style="color: #0d7377;">Pondok Pesantren Al-Falah Putak</h6>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="d-flex flex-column gap-2">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" 
               class="d-flex align-items-center px-3 py-2 rounded text-decoration-none transition {{ request()->routeIs('admin.dashboard') ? 'bg-success bg-opacity-10 text-success' : 'text-dark hover-bg-light' }}">
                <i class="fas fa-th me-3" style="width: 20px; color: #129990;"></i>
                <span class="fw-medium">Dashboard</span>
            </a>
            
            <!-- Verifikasi Data Calon Santri -->
            <div class="nav-menu-item {{ request()->routeIs('admin.verifikasi.*') ? 'active' : '' }}">
                <div class="d-flex align-items-center px-3 py-2 rounded text-decoration-none {{ request()->routeIs('admin.verifikasi.*') ? 'bg-success bg-opacity-10 text-success' : 'text-dark' }} hover-bg-light nav-menu-toggle">
                    <i class="fas fa-file me-3" style="width: 20px; color: #129990;"></i>
                    <span class="fw-medium">Verifikasi Data Calon Santri</span>
                </div>
                <div class="nav-submenu">
                    <div class="nav-submenu-item">
                        <a href="{{ route('admin.verifikasi.index', ['jenjang' => 'mi']) }}" class="{{ request()->routeIs('admin.verifikasi.*') && request()->query('jenjang', 'mi') === 'mi' ? 'text-success fw-semibold' : '' }}">Madrasah Ibtidaiyyah</a>
                    </div>
                    <div class="nav-submenu-item">
                        <a href="{{ route('admin.verifikasi.index', ['jenjang' => 'mts']) }}" class="{{ request()->routeIs('admin.verifikasi.*') && request()->query('jenjang', 'mi') === 'mts' ? 'text-success fw-semibold' : '' }}">Madrasah Tsanawiyyah</a>
                    </div>
                    <div class="nav-submenu-item">
                        <a href="{{ route('admin.verifikasi.index', ['jenjang' => 'ma']) }}" class="{{ request()->routeIs('admin.verifikasi.*') && request()->query('jenjang', 'mi') === 'ma' ? 'text-success fw-semibold' : '' }}">Madrasah Aliyah</a>
                    </div>
                </div>
            </div>
            
            <!-- Data Pendaftaran -->
            <div class="nav-menu-item {{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}">
                <div class="d-flex align-items-center px-3 py-2 rounded text-decoration-none {{ request()->routeIs('admin.pendaftaran.*') ? 'bg-success bg-opacity-10 text-success' : 'text-dark' }} hover-bg-light nav-menu-toggle">
                    <i class="fas fa-file-edit me-3" style="width: 20px; color: #129990;"></i>
                    <span class="fw-medium">Data Pendaftaran</span>
                </div>
                <div class="nav-submenu">
                    <div class="nav-submenu-item">
                        <a href="{{ route('admin.pendaftaran.index', ['jenjang' => 'mi']) }}" class="{{ request()->query('jenjang') == 'mi' ? 'text-success fw-semibold' : '' }}">Madrasah Ibtidaiyyah</a>
                    </div>
                    <div class="nav-submenu-item">
                        <a href="{{ route('admin.pendaftaran.index', ['jenjang' => 'mts']) }}" class="{{ request()->query('jenjang') == 'mts' ? 'text-success fw-semibold' : '' }}">Madrasah Tsanawiyyah</a>
                    </div>
                    <div class="nav-submenu-item">
                        <a href="{{ route('admin.pendaftaran.index', ['jenjang' => 'ma']) }}" class="{{ request()->query('jenjang') == 'ma' ? 'text-success fw-semibold' : '' }}">Madrasah Aliyah</a>
                    </div>
                </div>
            </div>
            
            <!-- Kelola Periode -->
            <a href="{{ route('admin.periode.index') }}" class="d-flex align-items-center px-3 py-2 rounded text-decoration-none {{ request()->routeIs('admin.periode.*') ? 'bg-success bg-opacity-10 text-success' : 'text-dark' }} hover-bg-light">
                <i class="fas fa-calendar-alt me-3" style="width: 20px; color: #129990;"></i>
                <span class="fw-medium">Kelola Periode</span>
            </a>
            
            <!-- Riwayat Informasi Kelulusan -->
            <div class="nav-menu-item {{ request()->routeIs('admin.kelulusan.*') ? 'active' : '' }}">
                <div class="d-flex align-items-center px-3 py-2 rounded text-decoration-none {{ request()->routeIs('admin.kelulusan.*') ? 'bg-success bg-opacity-10 text-success' : 'text-dark' }} hover-bg-light nav-menu-toggle">
                    <i class="fas fa-history me-3" style="width: 20px; color: #129990;"></i>
                    <span class="fw-medium">Riwayat Informasi Kelulusan</span>
                </div>
                <div class="nav-submenu">
                    <div class="nav-submenu-item">
                        <a href="{{ route('admin.kelulusan.index', ['jenjang' => 'mi']) }}" class="{{ request()->routeIs('admin.kelulusan.*') && request()->query('jenjang', 'mi') === 'mi' ? 'text-success fw-semibold' : '' }}">Madrasah Ibtidaiyyah</a>
                    </div>
                    <div class="nav-submenu-item">
                        <a href="{{ route('admin.kelulusan.index', ['jenjang' => 'mts']) }}" class="{{ request()->routeIs('admin.kelulusan.*') && request()->query('jenjang', 'mi') === 'mts' ? 'text-success fw-semibold' : '' }}">Madrasah Tsanawiyyah</a>
                    </div>
                    <div class="nav-submenu-item">
                        <a href="{{ route('admin.kelulusan.index', ['jenjang' => 'ma']) }}" class="{{ request()->routeIs('admin.kelulusan.*') && request()->query('jenjang', 'mi') === 'ma' ? 'text-success fw-semibold' : '' }}">Madrasah Aliyah</a>
                    </div>
                </div>
            </div>
            
            <!-- Kelola Berita -->
            <a href="#" 
               class="d-flex align-items-center px-3 py-2 rounded text-decoration-none transition text-dark hover-bg-light">
                <i class="fas fa-newspaper me-3" style="width: 20px; color: #129990;"></i>
                <span class="fw-medium">Kelola Berita</span>
            </a>
            
            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="pt-3">
                @csrf
                <button type="submit" class="d-flex align-items-center px-3 py-2 rounded border-0 bg-transparent text-dark w-100 text-start hover-bg-light">
                    <i class="fas fa-unlock me-3" style="width: 20px; color: #129990;"></i>
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

            // Menu toggle functionality
            const menuItems = document.querySelectorAll('.nav-menu-item');
            menuItems.forEach(item => {
                // Auto-open menu if it has active class (from PHP route check)
                if (item.classList.contains('active')) {
                    item.classList.add('active');
                }

                const toggle = item.querySelector('.nav-menu-toggle');
                toggle?.addEventListener('click', (e) => {
                    e.preventDefault();
                    const isActive = item.classList.contains('active');
                    
                    // Close all other menus
                    menuItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });
                    
                    // Toggle current menu
                    item.classList.toggle('active', !isActive);
                });
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
