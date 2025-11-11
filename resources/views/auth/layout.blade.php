<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pondok Pesantren Al-Falah Putak')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap');

        :root {
            --primary-color: #0d9488;
            --secondary-color: #14b8a6;
            --light-bg: #e0f2f1;
            --dark-teal: #0f766e;
        }
        
        body {
            font-family: 'Figtree', sans-serif;
            
            min-height: 100vh;
        }
        
        .sidebar {
            background: #B6DFDD;
            border-radius: 0 20px 20px 0;
            padding: 3rem 2rem;
            color: #127499;
            height: 100%;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center; /* <— ini bikin konten di tengah horizontal */
            text-align: center;  /* opsional untuk h2 */


        }
        
        .sidebar h2 {
            font-weight: 600;
            margin-bottom: 2rem;
            color: #0f766e;
        }
        
        .step-item {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            margin-bottom: 2rem;
            width: 100%; /* biar lebar penuh */
            max-width: 350px; /* supaya tidak terlalu melebar */
        }
        
        .step-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-right: 1rem;
            font-size: 1.5rem;
            color: var(--primary-color);
        }
        
        .step-content h5 {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #303030;
            text-align: left;
        }
        
        .step-content p {
            font-size: 0.9rem;
            margin: 0;
            color: #303030;
            opacity: 0.9;
            text-align: left;
        }
        
        .main-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px 0 0 20px;
            padding: 3rem;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }
        
        .main-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 800"><path d="M0,400 Q300,200 600,400 T1200,400 L1200,800 L0,800 Z" fill="%23e0f2f1" opacity="0.1"/></svg>');
            background-size: cover;
            background-position: center;
            opacity: 0.3;
            z-index: 0;
        }
        
        .main-content > * {
            position: relative;
            z-index: 1;
        }
        
        .page-title {
            color: var(--dark-teal);
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-align: center;
            font-size: 30px;
        }
        
        .page-subtitle {
            color: #64748b;
            margin-bottom: 2rem;
            text-align: center;
            font-size: 16px;
            font-weight: 200;
        }
        
        .role-tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .role-tab {
            flex: 1;
            padding: 0.75rem 1.5rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            background: white;
            color: #64748b;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }
        
        .role-tab.active {
            border-color: var(--primary-color);
            background: var(--light-bg);
            color: var(--dark-teal);
        }
        
        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(13, 148, 136, 0.25);
        }
        
        .input-group-text {
            background: var(--light-bg);
            border: 2px solid #e2e8f0;
            border-right: none;
            border-radius: 10px 0 0 10px;
            color: var(--primary-color);
        }
        
        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }
        
        .btn-primary {
            background: var(--primary-color);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background: var(--dark-teal);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 148, 136, 0.3);
        }
        
        .link-text {
            text-align: center;
            margin-top: 1.5rem;
            color: #64748b;
        }
        
        .link-text a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
        }
        
        .link-text a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                border-radius: 20px 20px 0 0;
                min-height: auto;
                padding: 2rem 1.5rem;
            }
            
            .main-content {
                border-radius: 0 0 20px 20px;
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-lg-5">
                <div class="sidebar">
                    <h2>Langkah-Langkah Pendaftaran</h2>
                    <div class="step-item">
                        <div class="step-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <div class="step-content">
                            <h5>Daftar Akun</h5>
                            <p>Isi form pendaftaran di awal sebelum Login</p>
                        </div>
                    </div>
                    <div class="step-item">
                        <div class="step-icon">
                            <i class="bi bi-box-arrow-in-right"></i>
                        </div>
                        <div class="step-content">
                            <h5>Login Akun</h5>
                            <p>Masuk ke sistem dengan mengklik tombol Login</p>
                        </div>
                    </div>
                    <div class="step-item">
                        <div class="step-icon">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <div class="step-content">
                            <h5>Lengkapi Biodata</h5>
                            <p>Upload berkas dan biodata calon santri</p>
                        </div>
                    </div>
                    <div class="step-item">
                        <div class="step-icon">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <div class="step-content">
                            <h5>Pembayaran Biaya Calon Santri</h5>
                            <p>Upload bukti pembayaran untuk biaya calon santri</p>
                        </div>
                    </div>
                    <div class="step-item">
                        <div class="step-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div class="step-content">
                            <h5>Cek Kelulusan Calon Santri</h5>
                            <p>Cek hasil pendaftaran calon santri di dashboard</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-lg-7">
                <div class="main-content d-flex align-items-center justify-content-center">
                    <div class="w-100" style="max-width: 500px;">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>

