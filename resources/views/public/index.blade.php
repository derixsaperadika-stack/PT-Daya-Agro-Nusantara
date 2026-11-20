@extends('layouts.app')

@section('title', 'Beranda - PT Daya Agro Nusantara')

@section('content')
    <!-- Hero Section -->
    <section class="py-5 bg-white border-bottom position-relative overflow-hidden">
        <div class="container py-lg-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-success bg-opacity-10 text-success fw-semibold small mb-3">
                        <i class="bi bi-patch-check-fill"></i> UMKM Pengolahan Hasil Pertanian Nusantara
                    </div>
                    <h1 class="display-5 fw-extrabold text-dark mb-3" style="line-height: 1.2;">
                        Membangun Kedaulatan Pangan Melalui <span style="color: #15803D;">Pertanian Unggul</span> &amp; <span style="color: #D97706;">Produk Berkualitas</span>
                    </h1>
                    <p class="lead text-secondary mb-4" style="line-height: 1.7; font-size: 1.1rem;">
                        <strong>PT Daya Agro Nusantara</strong> mengolah hasil pertanian petani lokal menjadi produk pangan siap saji dan bahan baku berkualitas tinggi—dari <em>keripik singkong premium</em>, <em>kopi robusta nusantara</em>, <em>gula aren murni organik</em>, hingga <em>olahan minyak kelapa murni (VCO)</em>.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('products.index') }}" class="btn btn-agro-primary btn-lg px-4 py-3 d-inline-flex align-items-center gap-2">
                            <i class="bi bi-basket-fill"></i>
                            <span>Jelajahi Produk Kami</span>
                        </a>
                        <a href="{{ route('about') }}" class="btn btn-outline-secondary btn-lg px-4 py-3 d-inline-flex align-items-center gap-2">
                            <i class="bi bi-building"></i>
                            <span>Tentang UMKM Kami</span>
                        </a>
                    </div>

                    <!-- Mini Stat row -->
                    <div class="row g-3 mt-4 pt-3 border-top">
                        <div class="col-sm-3 col-6">
                            <h3 class="fw-bold mb-0 text-dark">{{ $stats['total_products'] }}</h3>
                            <small class="text-muted">Produk Terdaftar</small>
                        </div>
                        <div class="col-sm-3 col-6">
                            <h3 class="fw-bold mb-0 text-dark">{{ $stats['total_categories'] }}</h3>
                            <small class="text-muted">Kategori Pangan</small>
                        </div>
                        <div class="col-sm-3 col-6">
                            <h3 class="fw-bold mb-0 text-dark">{{ $stats['local_farmers'] }}</h3>
                            <small class="text-muted">Mitra Petani</small>
                        </div>
                        <div class="col-sm-3 col-6">
                            <h3 class="fw-bold mb-0 text-dark">100%</h3>
                            <small class="text-muted">Bahan Alami</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 text-center">
                    <div class="position-relative p-4 rounded-4" style="background: linear-gradient(135deg, #F0FDF4 0%, #FEF3C7 100%); border: 1px solid #DCFCE7;">
                        <!-- Large Decorative SVG Logo Presentation -->
                        <div class="p-3 bg-white rounded-4 shadow-sm mb-3">
                            <x-logo :height="120" :showText="false" class="justify-content-center my-2" />
                            <h4 class="fw-bold text-dark mt-3 mb-1">PT Daya Agro Nusantara</h4>
                            <p class="text-muted small mb-0">Lambang Inovasi, Kualitas &amp; Pemberdayaan Petani Lokal</p>
                        </div>

                        <div class="row g-2 text-start">
                            <div class="col-6">
                                <div class="bg-white p-2.5 rounded-3 border d-flex align-items-center gap-2">
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                    <span class="small fw-semibold">Higienis &amp; Aman</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-white p-2.5 rounded-3 border d-flex align-items-center gap-2">
                                    <i class="bi bi-shield-check text-success fs-5"></i>
                                    <span class="small fw-semibold">Bebas Kimiawi</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-white p-2.5 rounded-3 border d-flex align-items-center gap-2">
                                    <i class="bi bi-heart-fill text-danger fs-5"></i>
                                    <span class="small fw-semibold">Pangan Siap Saji</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-white p-2.5 rounded-3 border d-flex align-items-center gap-2">
                                    <i class="bi bi-box2-heart text-warning fs-5"></i>
                                    <span class="small fw-semibold">Bahan Baku Resto</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-semibold mb-2">Lini Produk Unggulan</span>
                <h2 class="fw-bold text-dark">4 Pilar Olahan Pertanian Kami</h2>
                <p class="text-muted mx-auto" style="max-width: 650px;">
                    Setiap komoditas diproses langsung dari perkebunan petani binaan dengan standar mutu tinggi dan pengolahan higienis.
                </p>
            </div>

            <div class="row g-4">
                @foreach($categories as $category)
                    <div class="col-md-6 col-lg-3">
                        <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="text-decoration-none">
                            <div class="card-custom h-100 p-4 d-flex flex-column justify-content-between text-center">
                                <div>
                                    <div class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background-color: #F0FDF4; color: #15803D;">
                                        <i class="bi {{ $category->icon ?: 'bi-box-seam' }} fs-2"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-2">{{ $category->name }}</h5>
                                    <p class="text-muted small mb-3" style="min-height: 40px;">
                                        {{ $category->description ?: 'Olahan pangan berkualitas hasil bumi lokal nusantara.' }}
                                    </p>
                                </div>
                                <div class="border-top pt-3 d-flex align-items-center justify-content-between">
                                    <span class="badge bg-light text-secondary border">{{ $category->products_count }} Produk</span>
                                    <span class="text-success small fw-semibold">Lihat Katalog <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-5 bg-white border-top border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-end justify-content-between mb-4">
                <div>
                    <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill fw-semibold mb-2">Paling Diminati</span>
                    <h2 class="fw-bold text-dark mb-0">Produk Pilihan Terbaik</h2>
                </div>
                <a href="{{ route('products.index') }}" class="btn btn-outline-success mt-3 mt-md-0 d-inline-flex align-items-center gap-2">
                    <span>Lihat Semua Produk</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="row g-4">
                @forelse($featuredProducts as $product)
                    <div class="col-md-6 col-lg-4">
                        <div class="card-custom h-100 d-flex flex-column">
                            <div class="position-relative overflow-hidden" style="height: 220px; background-color: #F8FAFC;">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-100 h-100" style="object-fit: cover;">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                                        <i class="bi bi-image fs-1 opacity-25"></i>
                                    </div>
                                @endif
                                
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge-category">{{ $product->category->name }}</span>
                                </div>

                                @if($product->is_featured)
                                    <div class="position-absolute top-0 end-0 m-3">
                                        <span class="badge bg-warning text-dark fw-bold"><i class="bi bi-star-fill text-dark me-1"></i>Unggulan</span>
                                    </div>
                                @endif
                            </div>

                            <div class="p-4 d-flex flex-column flex-grow-1 justify-content-between">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <small class="text-muted"><i class="bi bi-box me-1"></i> Satuan: {{ $product->unit }}</small>
                                        <small class="{{ $product->stock > 0 ? 'text-success' : 'text-danger' }} fw-semibold">
                                            <i class="bi bi-check2-circle me-1"></i> Stok: {{ $product->stock }}
                                        </small>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-2">
                                        <a href="{{ route('products.show', $product->slug) }}" class="text-dark text-decoration-none hover-primary">
                                            {{ $product->name }}
                                        </a>
                                    </h5>
                                    <p class="text-secondary small mb-3" style="line-height: 1.6;">
                                        {{ Str::limit($product->short_description ?: $product->description, 90) }}
                                    </p>
                                </div>

                                <div class="border-top pt-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="text-muted small d-block">Harga Resmi</span>
                                        <h5 class="fw-bold mb-0 text-success">{{ $product->formatted_price }}</h5>
                                    </div>
                                    <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-outline-success rounded-pill px-3 py-2 fw-semibold">
                                        Detail Produk <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada produk unggulan yang ditampilkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Business Story / Profile Preview -->
    <section class="py-5" style="background-color: #F8FAFC;">
        <div class="container py-lg-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-semibold mb-3">Tentang Usaha Kami</span>
                    <h2 class="display-6 fw-bold text-dark mb-3">Dari Petani Nusantara Menuju Meja Konsumen</h2>
                    <p class="text-secondary" style="line-height: 1.8;">
                        Didirikan dengan komitmen meningkatkan nilai tambah komoditas pertanian lokal, <strong>PT Daya Agro Nusantara</strong> menjalin kemitraan erat dengan para petani singkong, pekebun kopi robusta, pengrajin nira aren, dan petani kelapa nusantara.
                    </p>
                    <p class="text-secondary" style="line-height: 1.8;">
                        Melalui penerapan proses pascapanen terstandarisasi, teknologi higienis tanpa bahan pengawet sintetik, kami menghadirkan produk yang sehat, otentik, dan berdaya saing tinggi baik untuk konsumen langsung maupun pasokan horeka (hotel, resto, kafe).
                    </p>

                    <div class="row g-3 mt-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-start gap-3">
                                <div class="rounded-3 p-2 bg-success text-white flex-shrink-0">
                                    <i class="bi bi-award fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Kualitas Premium</h6>
                                    <small class="text-muted">Sortasi bahan baku ketat grade terbaik.</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-start gap-3">
                                <div class="rounded-3 p-2 bg-warning text-dark flex-shrink-0">
                                    <i class="bi bi-people-fill fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Daya Lokal</h6>
                                    <small class="text-muted">100% memberdayakan petani daerah binaan.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="p-4 p-lg-5 bg-white rounded-4 border shadow-sm">
                        <h4 class="fw-bold text-dark mb-4">Ingin Bermitra atau Memesan?</h4>
                        <p class="text-muted mb-4">
                            Kami melayani pembelian eceran, grosir reseller, serta kontrak suplai bahan baku pangan untuk restoran, kafe, dan industri bakery.
                        </p>

                        <div class="d-flex flex-column gap-3 mb-4">
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                                <i class="bi bi-whatsapp text-success fs-3"></i>
                                <div>
                                    <span class="d-block text-muted small">Hubungi WhatsApp Resmi</span>
                                    <strong class="text-dark">+62 812-3456-7890 (Customer Care)</strong>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                                <i class="bi bi-envelope-check text-primary fs-3"></i>
                                <div>
                                    <span class="d-block text-muted small">Surel Bisnis / Penawaran</span>
                                    <strong class="text-dark">kemitraan@dayaagro.co.id</strong>
                                </div>
                            </div>
                        </div>

                        <a href="https://wa.me/6281234567890?text=Halo%20PT%20Daya%20Agro%20Nusantara,%20saya%20tertarik%20dengan%20produk%20Anda" target="_blank" class="btn btn-agro-amber w-100 py-3 d-inline-flex align-items-center justify-content-center gap-2">
                            <i class="bi bi-whatsapp"></i>
                            <span>Chat Langsung via WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
