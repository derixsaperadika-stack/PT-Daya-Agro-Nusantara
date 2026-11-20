<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT Daya Agro Nusantara') - UMKM Pangan & Pertanian Lokal</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-green: #15803D;
            --primary-green-dark: #14532D;
            --primary-green-light: #F0FDF4;
            --accent-amber: #D97706;
            --accent-amber-light: #FEF3C7;
            --dark-heading: #0F172A;
            --body-text: #334155;
            --surface-bg: #F8FAFC;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--body-text);
            background-color: var(--surface-bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95) !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .nav-link {
            font-weight: 500;
            color: #475569;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary-green) !important;
            background-color: var(--primary-green-light);
        }

        .btn-agro-primary {
            background-color: var(--primary-green);
            color: #ffffff;
            font-weight: 600;
            border: none;
            padding: 0.625rem 1.35rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px -1px rgba(21, 128, 61, 0.25);
            transition: all 0.2s ease;
        }

        .btn-agro-primary:hover {
            background-color: var(--primary-green-dark);
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 6px 10px -1px rgba(21, 128, 61, 0.3);
        }

        .btn-agro-amber {
            background-color: var(--accent-amber);
            color: #ffffff;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .btn-agro-amber:hover {
            background-color: #B45309;
            color: #ffffff;
        }

        .card-custom {
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            background: #ffffff;
            transition: all 0.25s ease;
            overflow: hidden;
        }

        .card-custom:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px -6px rgba(0, 0, 0, 0.08);
            border-color: #CBD5E1;
        }

        .badge-category {
            background-color: var(--primary-green-light);
            color: var(--primary-green);
            font-weight: 600;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            border: 1px solid #DCFCE7;
        }

        .footer {
            background: #0F172A;
            color: #94A3B8;
            margin-top: auto;
        }

        .footer a {
            color: #CBD5E1;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer a:hover {
            color: #4ADE80;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top py-2 py-lg-3">
        <div class="container">
            <a class="navbar-brand py-0 me-3 me-lg-4" href="{{ route('home') }}">
                <x-logo :height="46" />
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="bi bi-house-door me-1"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                            <i class="bi bi-grid me-1"></i> Produk Unggulan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            <i class="bi bi-info-circle me-1"></i> Profil UMKM
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                            <i class="bi bi-geo-alt me-1"></i> Kontak
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-success d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 fw-semibold">
                        <i class="bi bi-shield-lock-fill"></i>
                        <span>Panel Admin</span>
                    </a>
                    <a href="{{ route('products.index') }}" class="btn btn-agro-primary d-inline-flex align-items-center gap-2 px-3 py-2">
                        <i class="bi bi-bag-check"></i>
                        <span>Katalog Produk</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Notifications -->
    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 rounded-3 shadow-sm border-0" role="alert">
                <i class="bi bi-check-circle-fill fs-5 text-success"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 rounded-3 shadow-sm border-0" role="alert">
                <i class="bi bi-exclamation-triangle-fill fs-5 text-danger"></i>
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer pt-5 pb-4 mt-5">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-5 col-md-6">
                    <div class="d-inline-flex align-items-center gap-2 mb-3 bg-white p-2 rounded-3">
                        <x-logo :height="42" />
                    </div>
                    <p class="text-secondary pe-lg-4" style="line-height: 1.7; font-size: 0.95rem;">
                        <strong>PT Daya Agro Nusantara</strong> adalah unit usaha UMKM yang bergerak di bidang pengolahan hasil pertanian lokal menjadi produk pangan siap saji dan bahan baku berkualitas tinggi seperti keripik singkong premium, kopi robusta nusantara, gula aren murni, serta produk turunan olahan kelapa.
                    </p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle" style="width:36px; height:36px; display:inline-flex; align-items:center; justify-content:center;"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle" style="width:36px; height:36px; display:inline-flex; align-items:center; justify-content:center;"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle" style="width:36px; height:36px; display:inline-flex; align-items:center; justify-content:center;"><i class="bi bi-whatsapp"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle" style="width:36px; height:36px; display:inline-flex; align-items:center; justify-content:center;"><i class="bi bi-envelope"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-6">
                    <h6 class="text-white fw-bold mb-3 text-uppercase" style="letter-spacing: 0.5px;">Navigasi</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2" style="font-size: 0.95rem;">
                        <li><a href="{{ route('home') }}"><i class="bi bi-chevron-right me-1 text-success small"></i> Beranda</a></li>
                        <li><a href="{{ route('products.index') }}"><i class="bi bi-chevron-right me-1 text-success small"></i> Katalog Produk</a></li>
                        <li><a href="{{ route('about') }}"><i class="bi bi-chevron-right me-1 text-success small"></i> Profil UMKM</a></li>
                        <li><a href="{{ route('contact') }}"><i class="bi bi-chevron-right me-1 text-success small"></i> Kontak & Lokasi</a></li>
                        <li><a href="{{ route('admin.dashboard') }}"><i class="bi bi-chevron-right me-1 text-warning small"></i> Panel Admin</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 col-6">
                    <h6 class="text-white fw-bold mb-3 text-uppercase" style="letter-spacing: 0.5px;">Kategori</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2" style="font-size: 0.95rem;">
                        <li><a href="{{ route('products.index', ['category' => 'keripik-singkong']) }}">Keripik Singkong</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'kopi-robusta']) }}">Kopi Robusta</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'gula-aren']) }}">Gula Aren Murni</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'olahan-kelapa']) }}">Olahan Kelapa / VCO</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="text-white fw-bold mb-3 text-uppercase" style="letter-spacing: 0.5px;">Kantor & Workshop</h6>
                    <ul class="list-unstyled text-secondary d-flex flex-column gap-2" style="font-size: 0.9rem;">
                        <li class="d-flex align-items-start gap-2">
                            <i class="bi bi-geo-alt-fill text-success mt-1"></i>
                            <span>Jl. Agro Industri Nusantara No. 88, Kawasan Sentra Pertanian Lokal, Jawa Barat</span>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <i class="bi bi-whatsapp text-success"></i>
                            <span>+62 812-3456-7890</span>
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <i class="bi bi-envelope-fill text-success"></i>
                            <span>info@dayaagro.co.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="border-secondary opacity-25">

            <div class="row align-items-center pt-2">
                <div class="col-md-7 text-center text-md-start mb-2 mb-md-0">
                    <small class="text-secondary">&copy; {{ date('Y') }} <strong>PT Daya Agro Nusantara</strong>. Seluruh Hak Cipta Dilindungi.</small>
                </div>
                <div class="col-md-5 text-center text-md-end">
                    <small class="text-secondary">Website Laravel UMKM Dinamis &bull; Standar Produksi Pangan Higienis</small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
