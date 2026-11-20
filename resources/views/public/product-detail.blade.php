@extends('layouts.app')

@section('title', $product->name . ' - PT Daya Agro Nusantara')

@section('content')
    <div class="container py-4 py-lg-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-decoration-none text-muted">Katalog Produk</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="text-decoration-none text-muted">{{ $product->category->name }}</a></li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row g-5">
            <!-- Product Image Section -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden p-2 bg-white sticky-top" style="top: 100px;">
                    <div class="position-relative rounded-4 overflow-hidden" style="height: 420px; background-color: #F8FAFC;">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-100 h-100" style="object-fit: cover;">
                        @else
                            <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                <i class="bi bi-image fs-1 opacity-25 mb-2"></i>
                                <span>Foto Produk Segera Diunggah</span>
                            </div>
                        @endif

                        @if($product->is_featured)
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-warning text-dark fw-bold px-3 py-2 fs-6">
                                    <i class="bi bi-star-fill me-1"></i> Produk Unggulan
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="col-lg-6">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="badge-category text-decoration-none">
                        <i class="bi {{ $product->category->icon ?: 'bi-tag' }} me-1"></i> {{ $product->category->name }}
                    </a>
                    <span class="badge bg-light text-secondary border">SKU: DAN-PRD-{{ str_pad($product->id, 4, '0', STR_PAD_LEFT) }}</span>
                </div>

                <h1 class="display-6 fw-bold text-dark mb-2">{{ $product->name }}</h1>

                <!-- Price Box -->
                <div class="p-3 my-3 rounded-4" style="background-color: #F0FDF4; border: 1px solid #DCFCE7;">
                    <span class="text-muted small d-block mb-1">Harga Resmi UMKM</span>
                    <div class="d-flex align-items-baseline gap-2">
                        <h2 class="fw-extrabold text-success mb-0">{{ $product->formatted_price }}</h2>
                        <span class="text-secondary">/ {{ $product->unit }}</span>
                    </div>
                </div>

                <!-- Stock & Availability Status -->
                <div class="row g-2 mb-4">
                    <div class="col-6">
                        <div class="p-3 bg-white rounded-3 border">
                            <small class="text-muted d-block">Status Ketersediaan</small>
                            @if($product->stock > 0)
                                <strong class="text-success"><i class="bi bi-check-circle-fill me-1"></i> Stok Tersedia ({{ $product->stock }} {{ $product->unit }})</strong>
                            @else
                                <strong class="text-danger"><i class="bi bi-x-circle-fill me-1"></i> Stok Habis (Pre-Order)</strong>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 bg-white rounded-3 border">
                            <small class="text-muted d-block">Kemasan &amp; Takaran</small>
                            <strong class="text-dark"><i class="bi bi-box-seam me-1"></i> {{ $product->unit }}</strong>
                        </div>
                    </div>
                </div>

                <!-- Short Description -->
                @if($product->short_description)
                    <div class="mb-4">
                        <h6 class="fw-bold text-dark mb-2">Ringkasan Produk</h6>
                        <p class="lead text-secondary fs-6" style="line-height: 1.7;">
                            {{ $product->short_description }}
                        </p>
                    </div>
                @endif

                <!-- Long Description -->
                <div class="mb-4">
                    <h6 class="fw-bold text-dark mb-2">Deskripsi Lengkap &amp; Keunggulan</h6>
                    <div class="text-secondary" style="line-height: 1.8; white-space: pre-line;">
                        {{ $product->description }}
                    </div>
                </div>

                <!-- Order Action Button (WhatsApp Direct) -->
                @php
                    $waText = rawurlencode("Halo PT Daya Agro Nusantara, saya ingin memesan:\nProduk: {$product->name}\nHarga: {$product->formatted_price} / {$product->unit}\nMohon info ketersediaan stok & pengirimannya. Terima kasih!");
                @endphp
                <div class="p-4 rounded-4 bg-white border shadow-sm mb-4">
                    <h6 class="fw-bold text-dark mb-2"><i class="bi bi-cart-check text-success me-1"></i> Pesan Langsung dari Produsen</h6>
                    <p class="text-muted small mb-3">Pesanan Anda akan langsung diproses oleh tim UMKM PT Daya Agro Nusantara.</p>
                    
                    <div class="d-flex flex-wrap gap-2">
                        <a href="https://wa.me/6281234567890?text={{ $waText }}" target="_blank" class="btn btn-agro-primary btn-lg flex-grow-1 d-inline-flex align-items-center justify-content-center gap-2">
                            <i class="bi bi-whatsapp fs-5"></i>
                            <span>Pesan via WhatsApp Sekarang</span>
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-secondary btn-lg px-3" title="Kontak Penjualan">
                            <i class="bi bi-chat-dots"></i>
                        </a>
                    </div>
                </div>

                <!-- Guarantees -->
                <div class="row g-2 text-center text-muted small">
                    <div class="col-4">
                        <i class="bi bi-shield-check text-success fs-5 d-block mb-1"></i>
                        <span>100% Produk Asli</span>
                    </div>
                    <div class="col-4">
                        <i class="bi bi-truck text-success fs-5 d-block mb-1"></i>
                        <span>Kirim Seluruh RI</span>
                    </div>
                    <div class="col-4">
                        <i class="bi bi-patch-check text-success fs-5 d-block mb-1"></i>
                        <span>Higienis &amp; Teruji</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        @if($relatedProducts->count() > 0)
            <div class="mt-5 pt-4 border-top">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold text-dark mb-0">Produk Terkait di Kategori {{ $product->category->name }}</h3>
                    <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="btn btn-sm btn-outline-success">
                        Lihat Kategori <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="row g-4">
                    @foreach($relatedProducts as $rel)
                        <div class="col-md-4">
                            <div class="card-custom h-100 d-flex flex-column">
                                <div style="height: 180px; background-color: #F8FAFC;" class="position-relative">
                                    @if($rel->image)
                                        <img src="{{ asset('storage/' . $rel->image) }}" alt="{{ $rel->name }}" class="w-100 h-100" style="object-fit: cover;">
                                    @endif
                                </div>
                                <div class="p-3 d-flex flex-column flex-grow-1 justify-content-between">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1">
                                            <a href="{{ route('products.show', $rel->slug) }}" class="text-dark text-decoration-none">
                                                {{ $rel->name }}
                                            </a>
                                        </h6>
                                        <span class="text-success fw-bold">{{ $rel->formatted_price }}</span>
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ route('products.show', $rel->slug) }}" class="btn btn-sm btn-outline-secondary w-100">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
