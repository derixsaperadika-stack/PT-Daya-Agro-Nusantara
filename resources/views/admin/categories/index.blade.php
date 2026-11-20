@extends('layouts.admin')

@section('title', 'Kelola Kategori')
@section('page_title', 'Kelola Kategori Produk')

@section('content')
    <div class="row g-4">
        <!-- Category List -->
        <div class="col-lg-8">
            <div class="card-table shadow-sm">
                <div class="p-3 bg-white border-bottom d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-0"><i class="bi bi-tags-fill text-success me-1"></i> Daftar Kategori Komoditas Pertanian</h6>
                        <small class="text-muted">Total {{ $categories->count() }} kategori terdaftar</small>
                    </div>
                    <button type="button" class="btn btn-success btn-sm rounded-3 fw-semibold d-lg-none" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th style="width: 60px;">Ikon</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Jumlah Produk</th>
                                <th class="text-end" style="width: 120px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $index => $cat)
                                <tr>
                                    <td class="text-muted small">{{ $index + 1 }}</td>
                                    <td>
                                        <div class="rounded-circle d-flex align-items-center justify-content-center text-success bg-success bg-opacity-10" style="width: 40px; height: 40px;">
                                            <i class="bi {{ $cat->icon ?: 'bi-tag' }} fs-5"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <strong class="text-dark d-block">{{ $cat->name }}</strong>
                                        <small class="text-muted">slug: <code class="text-success">{{ $cat->slug }}</code></small>
                                    </td>
                                    <td class="text-secondary small" style="max-width: 250px;">
                                        {{ $cat->description ?: '-' }}
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border px-2.5 py-1.5 rounded-pill">
                                            <i class="bi bi-box me-1 text-success"></i> {{ $cat->products_count }} Produk
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editCatModal{{ $cat->id }}" title="Ubah">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delCatModal{{ $cat->id }}" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Edit Modal -->
                                        <div class="modal fade text-start" id="editCatModal{{ $cat->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content rounded-4 border-0 shadow">
                                                    <form action="{{ route('admin.categories.update', $cat) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold text-dark">Ubah Kategori: {{ $cat->name }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Nama Kategori <span class="text-danger">*</span></label>
                                                                <input type="text" name="name" class="form-control" value="{{ old('name', $cat->name) }}" required maxlength="100">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Ikon Bootstrap</label>
                                                                <input type="text" name="icon" class="form-control" value="{{ old('icon', $cat->icon) }}" placeholder="Contoh: bi-cup-hot, bi-tree, bi-basket2">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Deskripsi</label>
                                                                <textarea name="description" class="form-control" rows="3">{{ old('description', $cat->description) }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-0">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary fw-semibold">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade text-start" id="delCatModal{{ $cat->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content rounded-4 border-0 shadow">
                                                    <div class="modal-header border-0 pb-0">
                                                        <h5 class="modal-title fw-bold text-danger">Konfirmasi Hapus Kategori</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body py-4">
                                                        Apakah Anda yakin ingin menghapus kategori <strong>"{{ $cat->name }}"</strong>?
                                                        @if($cat->products_count > 0)
                                                            <div class="alert alert-warning mt-3 mb-0 small">
                                                                <i class="bi bi-exclamation-triangle-fill me-1"></i> Perhatian: Kategori ini memiliki <strong>{{ $cat->products_count }} produk</strong> yang juga akan terhapus karena relasi cascade database!
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer border-0 pt-0">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus Kategori</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">Belum ada kategori yang terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Category Form (Card on Desktop) -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white sticky-top" style="top: 90px;">
                <h5 class="fw-bold text-dark mb-1"><i class="bi bi-plus-circle text-success me-1"></i> Tambah Kategori Baru</h5>
                <p class="text-muted small mb-4">Tambahkan klasifikasi produk olahan pertanian baru ke database.</p>

                @if ($errors->any())
                    <div class="alert alert-danger rounded-3 small mb-3">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="cat_name" class="form-label fw-semibold">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="cat_name" class="form-control @error('name') is-invalid @enderror" placeholder="Contoh: Madu Alami" value="{{ old('name') }}" required maxlength="100">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cat_icon" class="form-label fw-semibold">Ikon Bootstrap</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-app-indicator"></i></span>
                            <input type="text" name="icon" id="cat_icon" class="form-control @error('icon') is-invalid @enderror" placeholder="bi-flower1, bi-tree, bi-cup" value="{{ old('icon', 'bi-box-seam') }}" maxlength="50">
                        </div>
                        <small class="text-muted d-block mt-1">Nama kelas Bootstrap Icons (contoh: <code>bi-cup-hot</code>)</small>
                        @error('icon')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cat_desc" class="form-label fw-semibold">Deskripsi Singkat</label>
                        <textarea name="description" id="cat_desc" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Uraian singkat kelompok produk..." maxlength="255">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success w-100 py-2.5 fw-semibold rounded-3">
                        <i class="bi bi-save me-1"></i> Simpan Kategori
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
