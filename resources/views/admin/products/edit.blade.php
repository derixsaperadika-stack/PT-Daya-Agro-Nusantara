@extends('layouts.admin')

@section('title', 'Ubah Produk - ' . $product->name)
@section('page_title', 'Ubah Data Produk')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
                    <div>
                        <h4 class="fw-bold text-dark mb-1">Form Ubah Produk: {{ $product->name }}</h4>
                        <p class="text-muted small mb-0">Perbarui data produk, harga, stok, atau unggah foto pengganti.</p>
                    </div>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary rounded-3">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger rounded-3 mb-4">
                        <div class="fw-bold mb-1"><i class="bi bi-exclamation-triangle-fill me-1"></i> Terdapat kesalahan pengisian data:</div>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <!-- Nama Produk -->
                        <div class="col-md-8">
                            <label for="name" class="form-label fw-semibold">
                                Nama Produk <span class="text-danger">*</span>
                                <small class="text-muted fw-normal">(Wajib, Maks 150 karakter)</small>
                            </label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Produk" value="{{ old('name', $product->name) }}" required maxlength="150">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kategori Relasi -->
                        <div class="col-md-4">
                            <label for="category_id" class="form-label fw-semibold">
                                Kategori Produk <span class="text-danger">*</span>
                                <small class="text-muted fw-normal">(Relasi Database)</small>
                            </label>
                            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Harga Satuan -->
                        <div class="col-md-4">
                            <label for="price" class="form-label fw-semibold">
                                Harga Satuan (Rp) <span class="text-danger">*</span>
                                <small class="text-muted fw-normal">(Angka/Numerik)</small>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">Rp</span>
                                <input type="number" step="100" min="0" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', (int)$product->price) }}" required>
                            </div>
                            @error('price')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Jumlah Stok -->
                        <div class="col-md-4">
                            <label for="stock" class="form-label fw-semibold">
                                Jumlah Stok <span class="text-danger">*</span>
                                <small class="text-muted fw-normal">(Bilangan Bulat)</small>
                            </label>
                            <input type="number" min="0" step="1" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $product->stock) }}" required>
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Satuan Kemasan -->
                        <div class="col-md-4">
                            <label for="unit" class="form-label fw-semibold">
                                Satuan / Kemasan <span class="text-danger">*</span>
                                <small class="text-muted fw-normal">(Maks 50 karakter)</small>
                            </label>
                            <input type="text" name="unit" id="unit" class="form-control @error('unit') is-invalid @enderror" value="{{ old('unit', $product->unit) }}" required maxlength="50">
                            @error('unit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ringkasan Singkat -->
                        <div class="col-12">
                            <label for="short_description" class="form-label fw-semibold">
                                Ringkasan Singkat
                                <small class="text-muted fw-normal">(Opsional, Maks 255 karakter)</small>
                            </label>
                            <input type="text" name="short_description" id="short_description" class="form-control @error('short_description') is-invalid @enderror" value="{{ old('short_description', $product->short_description) }}" maxlength="255">
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi Lengkap -->
                        <div class="col-12">
                            <label for="description" class="form-label fw-semibold">
                                Deskripsi Lengkap &amp; Keunggulan <span class="text-danger">*</span>
                                <small class="text-muted fw-normal">(Minimal 10 karakter)</small>
                            </label>
                            <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Upload Foto Produk Baru -->
                        <div class="col-md-8">
                            <label for="image" class="form-label fw-semibold">
                                Ganti Foto Produk (Opsional)
                                <small class="text-muted fw-normal">(Format: JPG, PNG, WEBP, SVG | Maks: 2MB | Biarkan kosong jika tidak diganti)</small>
                            </label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg,image/webp,image/svg+xml" onchange="previewImage(this)">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Preview Foto Saat Ini & Baru -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold d-block">Foto Saat Ini / Baru</label>
                            <div class="border rounded-3 p-2 bg-light text-center" style="height: 120px; display: flex; align-items: center; justify-content: center;">
                                @if($product->image)
                                    <img id="imgPreview" src="{{ asset('storage/' . $product->image) }}" alt="Preview" class="rounded-2 w-100 h-100" style="object-fit: cover;">
                                    <span id="imgPlaceholder" class="d-none text-muted small"><i class="bi bi-card-image fs-3 d-block"></i>Belum ada foto</span>
                                @else
                                    <img id="imgPreview" src="" alt="Preview" class="d-none rounded-2 w-100 h-100" style="object-fit: cover;">
                                    <span id="imgPlaceholder" class="text-muted small"><i class="bi bi-card-image fs-3 d-block"></i>Belum ada foto</span>
                                @endif
                            </div>
                        </div>

                        <!-- Opsi Produk Unggulan -->
                        <div class="col-12">
                            <div class="form-check form-switch p-3 bg-light rounded-3">
                                <input class="form-check-input ms-0 me-3" type="checkbox" name="is_featured" value="1" id="is_featured" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold text-dark" for="is_featured">
                                    <i class="bi bi-star-fill text-warning me-1"></i> Tampilkan sebagai Produk Unggulan di Halaman Utama
                                </label>
                                <small class="text-muted d-block ms-5">Produk ini akan disorot di bagian "Produk Pilihan Terbaik" beranda.</small>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="col-12 d-flex justify-content-end gap-2 pt-3 border-top">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-light px-4 py-2">Batal</a>
                            <button type="submit" class="btn btn-primary fw-semibold px-4 py-2">
                                <i class="bi bi-check-circle me-1"></i> Perbarui Data Produk
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function previewImage(input) {
        const preview = document.getElementById('imgPreview');
        const placeholder = document.getElementById('imgPlaceholder');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
                if (placeholder) placeholder.classList.add('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
