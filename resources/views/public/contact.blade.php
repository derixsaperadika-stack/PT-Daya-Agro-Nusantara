@extends('layouts.app')

@section('title', 'Kontak Kami - PT Daya Agro Nusantara')

@section('content')
    <section class="bg-white border-bottom py-5">
        <div class="container text-center">
            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-semibold mb-2">Layanan Pelanggan &amp; Kemitraan</span>
            <h1 class="display-5 fw-extrabold text-dark mb-2">Hubungi Kami</h1>
            <p class="text-muted mx-auto mb-0" style="max-width: 600px;">
                Kami siap melayani kebutuhan pembelian produk, kemitraan pasokan bahan baku, maupun konsultasi pengiriman ke seluruh Indonesia.
            </p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Info Kolom -->
                <div class="col-lg-5">
                    <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                        <h4 class="fw-bold text-dark mb-4">Informasi Perusahaan</h4>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="p-2.5 rounded-3 bg-success bg-opacity-10 text-success flex-shrink-0">
                                <i class="bi bi-building fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Badan Usaha</h6>
                                <p class="text-secondary mb-0">PT Daya Agro Nusantara (UMKM Pangan)</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="p-2.5 rounded-3 bg-success bg-opacity-10 text-success flex-shrink-0">
                                <i class="bi bi-geo-alt-fill fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Pabrik &amp; Kantor Operasional</h6>
                                <p class="text-secondary mb-0">Jl. Agro Industri Nusantara No. 88, Sentra Pertanian Lokal, Jawa Barat, Indonesia</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="p-2.5 rounded-3 bg-success bg-opacity-10 text-success flex-shrink-0">
                                <i class="bi bi-whatsapp fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">WhatsApp &amp; Telepon</h6>
                                <p class="text-secondary mb-0">+62 812-3456-7890 (Layanan Cepat)</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="p-2.5 rounded-3 bg-success bg-opacity-10 text-success flex-shrink-0">
                                <i class="bi bi-envelope-fill fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Email Resmi</h6>
                                <p class="text-secondary mb-0">info@dayaagro.co.id</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h6 class="fw-bold text-dark mb-2">Jam Layanan Pelanggan</h6>
                        <p class="text-secondary small mb-0">
                            Senin - Sabtu: 08.00 - 17.00 WIB<br>
                            Minggu &amp; Libur Nasional: Tanggap darurat via WhatsApp
                        </p>
                    </div>
                </div>

                <!-- Formulir Pesan -->
                <div class="col-lg-7">
                    <div class="p-4 p-lg-5 bg-white rounded-4 border shadow-sm">
                        <h4 class="fw-bold text-dark mb-2">Kirim Pesan Pertanyaan</h4>
                        <p class="text-muted small mb-4">Silakan isi formulir di bawah ini, tim kami akan merespons secepatnya.</p>

                        <form onsubmit="event.preventDefault(); alert('Terima kasih! Pesan Anda telah terkirim ke customer care PT Daya Agro Nusantara.'); this.reset();">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nama Lengkap</label>
                                    <input type="text" class="form-control" placeholder="Nama Anda" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nomor WhatsApp / HP</label>
                                    <input type="tel" class="form-control" placeholder="Contoh: 08123456789" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Alamat Email</label>
                                    <input type="email" class="form-control" placeholder="email@contoh.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Jenis Kebutuhan</label>
                                    <select class="form-select" required>
                                        <option value="">Pilih Keperluan</option>
                                        <option value="beli">Pembelian Produk Eceran</option>
                                        <option value="grosir">Pemesanan Grosir / Reseller</option>
                                        <option value="horeka">Pasokan Horeka / Resto / Cafe</option>
                                        <option value="petani">Kemitraan Bahan Baku Pertanian</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Isi Pesan</label>
                                    <textarea class="form-control" rows="4" placeholder="Tuliskan detail pertanyaan atau pesanan Anda di sini..." required></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-agro-primary w-100 py-3 fw-semibold">
                                        <i class="bi bi-send me-1"></i> Kirim Pesan Sekarang
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
