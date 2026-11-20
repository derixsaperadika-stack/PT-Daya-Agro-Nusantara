<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - PT Daya Agro Nusantara</title>
    
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
            --sidebar-bg: #0F172A;
            --sidebar-text: #94A3B8;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F8FAFC;
            color: #334155;
            min-height: 100vh;
        }

        .admin-sidebar {
            width: 270px;
            background-color: var(--sidebar-bg);
            min-height: 100vh;
            color: var(--sidebar-text);
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 1.25rem 1.25rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            background: #020617;
        }

        .sidebar-menu {
            padding: 1.25rem 0.85rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #94A3B8;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 0.35rem;
            transition: all 0.2s ease;
        }

        .sidebar-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.08);
        }

        .sidebar-link.active {
            color: #ffffff;
            background: var(--primary-green);
            font-weight: 600;
            box-shadow: 0 4px 6px -1px rgba(21, 128, 61, 0.4);
        }

        .admin-main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .admin-topbar {
            background: #ffffff;
            border-bottom: 1px solid #E2E8F0;
            padding: 0.85rem 1.5rem;
        }

        .card-table {
            border: 1px solid #E2E8F0;
            border-radius: 14px;
            background: #ffffff;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.04);
            overflow: hidden;
        }

        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            color: #64748B;
            background-color: #F8FAFC;
            padding: 0.85rem 1rem;
            border-bottom: 1px solid #E2E8F0;
        }

        .table td {
            padding: 0.85rem 1rem;
            vertical-align: middle;
            color: #334155;
            border-bottom: 1px solid #F1F5F9;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="d-flex min-vh-100">
        <!-- Sidebar -->
        <aside class="admin-sidebar d-none d-lg-block flex-shrink-0">
            <div class="sidebar-brand">
                <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
                    <x-logo :height="40" textColor="text-white" subColor="text-secondary" />
                </a>
            </div>

            <div class="sidebar-menu">
                <small class="text-uppercase text-secondary fw-bold px-3 d-block mb-2" style="font-size: 0.7rem; letter-spacing: 1px;">Navigasi Utama</small>
                
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 fs-5"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="bi bi-box-seam fs-5"></i>
                    <span>Kelola Produk (CRUD)</span>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="bi bi-tags fs-5"></i>
                    <span>Kelola Kategori</span>
                </a>

                <hr class="border-secondary opacity-25 my-3">

                <small class="text-uppercase text-secondary fw-bold px-3 d-block mb-2" style="font-size: 0.7rem; letter-spacing: 1px;">Tautan Luar</small>
                
                <a href="{{ route('home') }}" target="_blank" class="sidebar-link text-warning">
                    <i class="bi bi-box-arrow-up-right fs-5"></i>
                    <span>Lihat Website Publik</span>
                </a>
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div class="admin-main">
            <!-- Topbar -->
            <header class="admin-topbar d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-outline-secondary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminMobileSidebar" aria-controls="adminMobileSidebar">
                        <i class="bi bi-list fs-5"></i>
                    </button>
                    <div>
                        <h5 class="mb-0 fw-bold text-dark">@yield('page_title', 'Dashboard')</h5>
                        <small class="text-muted">PT Daya Agro Nusantara - Sistem Manajemen Data UMKM</small>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('home') }}" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1 rounded-3">
                        <i class="bi bi-globe"></i>
                        <span class="d-none d-md-inline">Ke Web Publik</span>
                    </a>
                    <div class="d-flex align-items-center gap-2 border-start ps-3">
                        <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold" style="width:36px; height:36px;">
                            AD
                        </div>
                        <div class="d-none d-sm-block text-start leading-tight">
                            <span class="d-block fw-semibold" style="font-size: 0.85rem;">Administrator</span>
                            <small class="text-muted" style="font-size: 0.75rem;">admin@dayaagro.id</small>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Offcanvas Sidebar for Mobile -->
            <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="adminMobileSidebar" aria-labelledby="adminMobileSidebarLabel">
                <div class="offcanvas-header border-bottom border-secondary">
                    <x-logo :height="38" textColor="text-white" subColor="text-secondary" />
                    <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-3">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <i class="bi bi-box-seam"></i> Kelola Produk (CRUD)
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="bi bi-tags"></i> Kelola Kategori
                    </a>
                    <hr class="border-secondary">
                    <a href="{{ route('home') }}" class="sidebar-link text-warning">
                        <i class="bi bi-box-arrow-up-right"></i> Lihat Website Publik
                    </a>
                </div>
            </div>

            <!-- Page Content -->
            <div class="p-3 p-lg-4 flex-grow-1">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 rounded-3 shadow-sm border-0 mb-4" role="alert">
                        <i class="bi bi-check-circle-fill fs-5 text-success"></i>
                        <div>{{ session('success') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 rounded-3 shadow-sm border-0 mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill fs-5 text-danger"></i>
                        <div>{{ session('error') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>

            <!-- Admin Footer -->
            <footer class="bg-white border-top py-3 px-4 text-center text-muted" style="font-size: 0.85rem;">
                &copy; {{ date('Y') }} PT Daya Agro Nusantara &bull; Panel Administrasi UMKM Dinamis (Laravel)
            </footer>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
