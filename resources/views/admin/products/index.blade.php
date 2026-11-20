@extends('layouts.admin')

@section('title', 'Kelola Produk')
@section('page_title', 'Daftar Produk Pertanian')

@section('content')
    <!-- Actions and Filters Bar -->
    <div class="card border-0 shadow-sm rounded-4 p-3 mb-4 bg-white">
        <div class="row g-2 align-items-center">
            <div class="col-lg-8">
                <form action="{{ route('admin.products.index') }}" method="GET" class="row g-2">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-search"></i></span>
                            <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="Cari nama atau deskripsi..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select name="category_id" class="form-select" onchange="this.form.submit()">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 d-flex gap-1">
                        <button type="submit" class="btn btn-outline-success w-100">Cari</button>
                        @if(request('search') || request('category_id'))
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary" title="Reset">
                                <i class="bi bi-x"></i>
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <div class="col-lg-4 text-lg-end mt-2 mt-lg-0">
                <a href="{{ route('admin.products.create') }}" class="btn btn-success fw-semibold px-3 py-2 rounded-3">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Produk Baru
                </a>
            </div>
        </div>
    </div>

    <!-- Products Table -->
    <div class="card-table shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 80px;">Foto</th>
                        <th>Nama &amp; Slug Produk</th>
                        <th>Kategori</th>
                        <th>Harga Satuan</th>
                        <th>Stok / Satuan</th>
                        <th>Status</th>
                        <th class="text-end" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $index => $product)
                        <tr>
                            <td class="text-muted small">{{ $products->firstItem() + $index }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-3 border" style="width: 55px; height: 55px; object-fit: cover;">
                                @else
                                    <div class="rounded-3 border bg-light d-flex align-items-center justify-content-center text-muted" style="width: 55px; height: 55px;">
                                        <i class="bi bi-image fs-4 opacity-50"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong class="d-block text-dark">{{ $product->name }}</strong>
                                <small class="text-muted d-block">slug: <code class="text-success">{{ $product->slug }}</code></small>
                            </td>
                            <td>
                                <span class="badge bg-success bg-opacity-10 text-success fw-semibold px-2 py-1 rounded-pill">
                                    {{ $product->category->name }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-bold text-success">{{ $product->formatted_price }}</span>
                            </td>
                            <td>
                                <div>
                                    @if($product->stock <= 10)
                                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-circle me-1"></i>{{ $product->stock }}</span>
                                    @else
                                        <span class="badge bg-light text-dark border">{{ $product->stock }}</span>
                                    @endif
                                    <small class="text-muted d-block">{{ $product->unit }}</small>
                                </div>
                            </td>
                            <td>
                                @if($product->is_featured)
                                    <span class="badge bg-warning text-dark"><i class="bi bi-star-fill me-1"></i>Unggulan</span>
                                @else
                                    <span class="badge bg-light text-muted border">Standar</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('products.show', $product->slug) }}" target="_blank" class="btn btn-outline-secondary" title="Lihat di Web Publik">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-outline-primary" title="Ubah Data">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade text-start" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-4 border-0 shadow">
                                            <div class="modal-header border-0 pb-0">
                                                <h5 class="modal-title fw-bold text-danger" id="deleteModalLabel{{ $product->id }}">
                                                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Konfirmasi Hapus Produk
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body py-4">
                                                Apakah Anda yakin ingin menghapus produk <strong>"{{ $product->name }}"</strong>? Data yang dihapus tidak dapat dipulihkan.
                                            </div>
                                            <div class="modal-footer border-0 pt-0">
                                                <button type="button" class="btn btn-light rounded-3 px-3" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger rounded-3 px-3">
                                                        <i class="bi bi-trash-fill me-1"></i> Ya, Hapus Produk
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                <span>Tidak ada produk yang ditemukan.</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($products->hasPages())
            <div class="p-3 border-top d-flex justify-content-center bg-white">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection
