@extends('layouts.app')

@section('title', 'Katalog Produk Pangan & Olahan Pertanian - PT Daya Agro Nusantara')

@section('content')
    <!-- Header Banner -->
    <section class="bg-white border-bottom py-4 py-lg-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-2 small">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Beranda</a></li>
                            <li class="breadcrumb-item active text-success fw-semibold" aria-current="page">Katalog Produk</li>
                            @if($activeCategory)
                                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">{{ $activeCategory->name }}</li>
                            @endif
                        </ol>
                    </nav>
                    <h1 class="h2 fw-bold text-dark mb-1">Katalog Produk Pangan Nusantara</h1>
                    <p class="text-muted mb-0">Pilihan produk pangan siap saji dan bahan baku berkualitas hasil panen petani lokal.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <span class="badge bg-success bg-opacity-10 text-success p-2 px-3 rounded-pill fw-semibold">
                        <i class="bi bi-box2 me-1"></i> Menampilkan {{ $products->total() }} Produk
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter & Search Toolbar -->
    <section class="py-4">
        <div class="container">
            <div class="card border-0 shadow-sm rounded-4 p-3 mb-4">
                <form action="{{ route('products.index') }}" method="GET" class="row g-2 align-items-center">
                    <!-- Search Input -->
                    <div class="col-lg-6 col-md-5">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                            <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="Cari keripik, kopi, gula aren, VCO..." value="{{ request('search') }}">
                            @if(request('search'))
                                <a href="{{ route('products.index', ['category' => request('category')]) }}" class="btn btn-outline-secondary border-start-0" title="Hapus Pencarian">
                                    <i class="bi bi-x"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Category Dropdown on Mobile / Quick filter -->
                    <div class="col-lg-4 col-md-4">
                        <select name="category" class="form-select" onchange="this.form.submit()">
                            <option value="">Semua Kategori ({{ $categories->sum('products_count') }})</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'selected' : '' }}>
                                    {{ $cat->name }} ({{ $cat->products_count }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit / Reset -->
                    <div class="col-lg-2 col-md-3 d-flex gap-2">
                        <button type="submit" class="btn btn-agro-primary w-100">
                            <i class="bi bi-funnel me-1"></i> Filter
                        </button>
                        @if(request('category') || request('search'))
                            <a href="{{ route('products.index') }}" class="btn btn-outline-danger" title="Reset Filter">
                                <i class="bi bi-arrow-counterclockwise"></i>
                            </a>
                        @endif
                    </div>
                </form>

                <!-- Category Pill Buttons -->
                <div class="d-none d-md-flex flex-wrap gap-2 mt-3 pt-3 border-top">
                    <a href="{{ route('products.index', ['search' => request('search')]) }}" 
                       class="btn btn-sm {{ !request('category') ? 'btn-success' : 'btn-outline-secondary' }} rounded-pill px-3">
                        Semua Kategori
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('products.index', ['category' => $cat->slug, 'search' => request('search')]) }}" 
                           class="btn btn-sm {{ request('category') == $cat->slug ? 'btn-success' : 'btn-outline-secondary' }} rounded-pill px-3">
                            <i class="bi {{ $cat->icon ?: 'bi-tag' }} me-1"></i> {{ $cat->name }} ({{ $cat->products_count }})
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Products Grid -->
            <div class="row g-4">
                @forelse($products as $product)
                    <div class="col-md-6 col-lg-4">
                        <div class="card-custom h-100 d-flex flex-column">
                            <div class="position-relative overflow-hidden" style="height: 230px; background-color: #F8FAFC;">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-100 h-100" style="object-fit: cover;">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                                        <i class="bi bi-image fs-1 opacity-25"></i>
                                    </div>
                                @endif
                                
                                <div class="position-absolute top-0 start-0 m-3">
                                    <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="badge-category text-decoration-none">
                                        {{ $product->category->name }}
                                    </a>
                                </div>

                                @if($product->is_featured)
                                    <div class="position-absolute top-0 end-0 m-3">
                                        <span class="badge bg-warning text-dark fw-bold"><i class="bi bi-star-fill me-1"></i>Unggulan</span>
                                    </div>
                                @endif
                            </div>

                            <div class="p-4 d-flex flex-column flex-grow-1 justify-content-between">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <small class="text-muted"><i class="bi bi-box me-1"></i> {{ $product->unit }}</small>
                                        <small class="{{ $product->stock > 0 ? 'text-success' : 'text-danger' }} fw-semibold">
                                            @if($product->stock > 0)
                                                <i class="bi bi-check-circle me-1"></i> Tersedia: {{ $product->stock }}
                                            @else
                                                <i class="bi bi-x-circle me-1"></i> Stok Habis
                                            @endif
                                        </small>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-2">
                                        <a href="{{ route('products.show', $product->slug) }}" class="text-dark text-decoration-none">
                                            {{ $product->name }}
                                        </a>
                                    </h5>
                                    <p class="text-secondary small mb-3" style="line-height: 1.6;">
                                        {{ Str::limit($product->short_description ?: $product->description, 100) }}
                                    </p>
                                </div>

                                <div class="border-top pt-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="text-muted small d-block" style="font-size: 0.75rem;">Harga Satuan</span>
                                        <h5 class="fw-bold mb-0 text-success">{{ $product->formatted_price }}</h5>
                                    </div>
                                    <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-outline-success rounded-pill px-3 py-2 fw-semibold">
                                        Detail &amp; Pesan <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 py-5 text-center">
                        <div class="p-5 bg-white rounded-4 border">
                            <i class="bi bi-search fs-1 text-muted d-block mb-3"></i>
                            <h4 class="fw-bold text-dark">Tidak Ada Produk yang Cocok</h4>
                            <p class="text-muted">Coba ubah kata kunci pencarian atau pilih kategori lain.</p>
                            <a href="{{ route('products.index') }}" class="btn btn-agro-primary mt-2">
                                <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Pencarian
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-5 d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection
