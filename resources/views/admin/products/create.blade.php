@extends('layouts.admin')

@section('title', 'Tambah Produk Baru')
@section('page_title', 'Tambah Produk Baru')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
                    <div>
                        <h4 class="fw-bold text-dark mb-1">Form Tambah Produk</h4>
                        <p class="text-muted small mb-0">Isi seluruh informasi produk olahan pertanian berikut dengan lengkap dan benar.</p>
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

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-4">
                        <!-- Nama Produk -->
                        <div class="col-md-8">
                            <label for="name" class="form-label fw-semibold">
                                Nama Produk <span class="text-danger">*</span>
                                <small class="text-muted fw-normal">(Wajib, Maks 150 karakter)</small>
                            </label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Contoh: Keripik Singkong Balado Premium" value="{{ old('name') }}" required maxlength="150">
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
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                <input type="number" step="100" min="0" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="25000" value="{{ old('price') }}" required>
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
                            <input type="number" min="0" step="1" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="50" value="{{ old('stock', 0) }}" required>
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
                            <input type="text" name="unit" id="unit" class="form-control @error('unit') is-invalid @enderror" placeholder="Pouch 200g, Botol 250ml, dll" value="{{ old('unit', 'Pouch 200g') }}" required maxlength="50">
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
                            <input type="text" name="short_description" id="short_description" class="form-control @error('short_description') is-invalid @enderror" placeholder="Ringkasan 1-2 kalimat untuk kartu produk di beranda" value="{{ old('short_description') }}" maxlength="255">
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
                            <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Jelaskan asal bahan baku tani, proses pengolahan, cita rasa, dan saran penyajian..." required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Upload Foto Produk -->
                        <div class="col-md-8">
                            <label for="image" class="form-label fw-semibold">
                                Upload Foto Produk
                                <small class="text-muted fw-normal">(Format: JPG, PNG, WEBP, SVG | Maks: 2MB | Disimpan di storage/public)</small>
                            </label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg,image/webp,image/svg+xml" onchange="previewImage(this)">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Live Preview Thumbnail -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold d-block">Preview Foto</label>
                            <div class="border rounded-3 p-2 bg-light text-center" style="height: 120px; display: flex; align-items: center; justify-content: center;">
                                <img id="imgPreview" src="" alt="Preview" class="d-none rounded-2 w-100 h-100" style="object-fit: cover;">
                                <span id="imgPlaceholder" class="text-muted small"><i class="bi bi-card-image fs-3 d-block"></i>Belum ada foto</span>
                            </div>
                        </div>

                        <!-- Opsi Produk Unggulan -->
                        <div class="col-12">
                            <div class="form-check form-switch p-3 bg-light rounded-3">
                                <input class="form-check-input ms-0 me-3" type="checkbox" name="is_featured" value="1" id="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold text-dark" for="is_featured">
                                    <i class="bi bi-star-fill text-warning me-1"></i> Tampilkan sebagai Produk Unggulan di Halaman Utama
                                </label>
                                <small class="text-muted d-block ms-5">Produk ini akan disorot di bagian "Produk Pilihan Terbaik" beranda.</small>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="col-12 d-flex justify-content-end gap-2 pt-3 border-top">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-light px-4 py-2">Batal</a>
                            <button type="submit" class="btn btn-success fw-semibold px-4 py-2">
                                <i class="bi bi-check-circle me-1"></i> Simpan Produk Baru
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
                placeholder.classList.add('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.classList.add('d-none');
            placeholder.classList.remove('d-none');
        }
    }
</script>
@endpush
