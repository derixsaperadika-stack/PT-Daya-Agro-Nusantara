@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page_title', 'Ringkasan Dashboard')

@section('content')
    <!-- Metric Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted fw-semibold small text-uppercase">Total Produk</span>
                    <div class="rounded-3 p-2 bg-success bg-opacity-10 text-success">
                        <i class="bi bi-box-seam fs-4"></i>
                    </div>
                </div>
                <h3 class="fw-bold text-dark mb-1">{{ $totalProducts }}</h3>
                <small class="text-muted">Item aktif di database</small>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted fw-semibold small text-uppercase">Total Kategori</span>
                    <div class="rounded-3 p-2 bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-tags fs-4"></i>
                    </div>
                </div>
                <h3 class="fw-bold text-dark mb-1">{{ $totalCategories }}</h3>
                <small class="text-muted">Lini olahan hasil pertanian</small>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted fw-semibold small text-uppercase">Stok Menipis</span>
                    <div class="rounded-3 p-2 bg-warning bg-opacity-10 text-warning">
                        <i class="bi bi-exclamation-triangle fs-4"></i>
                    </div>
                </div>
                <h3 class="fw-bold text-dark mb-1">{{ $lowStockCount }}</h3>
                <small class="text-muted">Produk stok &le; 10 item</small>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted fw-semibold small text-uppercase">Nilai Inventaris</span>
                    <div class="rounded-3 p-2 bg-success bg-opacity-10 text-success">
                        <i class="bi bi-cash-stack fs-4"></i>
                    </div>
                </div>
                <h4 class="fw-bold text-success mb-1">Rp {{ number_format($totalInventoryValue, 0, ',', '.') }}</h4>
                <small class="text-muted">Estimasi total nilai stok</small>
            </div>
        </div>
    </div>

    <!-- Quick Action Banner -->
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background: linear-gradient(135deg, #15803D 0%, #14532D 100%); color: #ffffff;">
        <div class="row align-items-center g-3">
            <div class="col-lg-8">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-white p-2 rounded-3 shadow-sm d-none d-sm-block">
                        <x-logo :height="48" :showText="false" />
                    </div>
                    <div>
                        <h4 class="fw-bold mb-1">Selamat Datang di Panel PT Daya Agro Nusantara</h4>
                        <p class="mb-0 opacity-75 small">Kelola data produk pertanian, kategori, stok barang, serta pantau etalase publik UMKM secara dinamis.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admin.products.create') }}" class="btn btn-warning fw-semibold px-3 py-2 rounded-3 text-dark">
                    <i class="bi bi-plus-circle-fill me-1"></i> Tambah Produk Baru
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Products Table -->
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card-table shadow-sm">
                <div class="p-3 border-bottom d-flex align-items-center justify-content-between bg-white">
                    <h6 class="fw-bold text-dark mb-0"><i class="bi bi-clock-history me-1 text-success"></i> Produk Terkini Ditambahkan</h6>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-success">
                        Kelola Semua <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentProducts as $prod)
                                <tr>
                                    <td style="width: 60px;">
                                        @if($prod->image)
                                            <img src="{{ asset('storage/' . $prod->image) }}" alt="{{ $prod->name }}" class="rounded-2" style="width: 44px; height: 44px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded-2 d-flex align-items-center justify-content-center text-muted" style="width: 44px; height: 44px;">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong class="d-block text-dark">{{ $prod->name }}</strong>
                                        <small class="text-muted">{{ $prod->unit }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border">{{ $prod->category->name }}</span>
                                    </td>
                                    <td>
                                        <strong class="text-success">{{ $prod->formatted_price }}</strong>
                                    </td>
                                    <td>
                                        @if($prod->stock <= 10)
                                            <span class="badge bg-warning text-dark">{{ $prod->stock }}</span>
                                        @else
                                            <span class="badge bg-success bg-opacity-10 text-success">{{ $prod->stock }}</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.products.edit', $prod) }}" class="btn btn-sm btn-outline-primary" title="Ubah">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">Belum ada produk yang tersimpan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Categories summary -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6 class="fw-bold text-dark mb-0"><i class="bi bi-pie-chart text-success me-1"></i> Sebaran Kategori</h6>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-outline-secondary">Kelola</a>
                </div>

                <div class="d-flex flex-column gap-3">
                    @foreach($categories as $cat)
                        <div class="p-3 rounded-3 bg-light d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi {{ $cat->icon ?: 'bi-tag' }} fs-5 text-success"></i>
                                <span class="fw-semibold text-dark">{{ $cat->name }}</span>
                            </div>
                            <span class="badge bg-success rounded-pill">{{ $cat->products_count }} item</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
