@extends('layouts.app')

@section('title', 'Tentang Kami - PT Daya Agro Nusantara')

@section('content')
    <!-- Banner -->
    <section class="bg-white border-bottom py-5">
        <div class="container text-center">
            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-semibold mb-2">Profil Perusahaan UMKM</span>
            <h1 class="display-5 fw-extrabold text-dark mb-3">PT Daya Agro Nusantara</h1>
            <p class="lead text-secondary mx-auto mb-0" style="max-width: 750px;">
                Membangun rantai nilai pertanian lokal Indonesia yang adil, mandiri, dan berdaya saing global melalui produk olahan pangan bernilai tambah.
            </p>
        </div>
    </section>

    <!-- Content Story -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-5 mb-5">
                <div class="col-lg-6">
                    <h2 class="fw-bold text-dark mb-3">Latar Belakang &amp; Komitmen UMKM</h2>
                    <p class="text-secondary" style="line-height: 1.8;">
                        <strong>PT Daya Agro Nusantara</strong> didirikan berawal dari potensi melimpahnya hasil pertanian lokal yang kerap mengalami anjloknya harga jual saat musim panen raya. Melalui sentuhan inovasi pangan, pengeringan, pengolahan suhu stabil, dan pengemasan kedap udara, kami mentransformasi komoditas mentah menjadi produk bernilai jual tinggi.
                    </p>
                    <p class="text-secondary" style="line-height: 1.8;">
                        Fokus utama komoditas kami meliputi:
                    </p>
                    <ul class="list-unstyled d-flex flex-column gap-2 text-dark">
                        <li class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <strong>Singkong Pilihan:</strong> Diolah menjadi keripik singkong renyah aneka varian rasa tanpa pengawet.
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <strong>Kopi Robusta Pegunungan:</strong> Dipetik matang merah dan disangrai presisi untuk karakter aroma kuat.
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <strong>Nira Aren Murni:</strong> Gula aren cetak tradisional dan gula semut praktis berindeks glikemik ramah.
                        </li>
                        <li class="d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <strong>Kelapa Nusantara:</strong> Virgin Coconut Oil (VCO) metode dingin untuk kesehatan dan nutrisi.
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6 text-center">
                    <div class="p-4 bg-white rounded-4 border shadow-sm">
                        <x-logo :height="100" :showText="false" class="justify-content-center mb-3" />
                        <h4 class="fw-bold text-dark">Logo Resmi PT Daya Agro Nusantara</h4>
                        <p class="text-muted small">
                            Logo kami berupa monogram huruf <strong>"D"</strong> yang dikombinasikan dengan helai daun tunas hijau yang bertumbuh serta busur surya/lengkung panen emas. Melambangkan harapan bahwa dari bumi nusantara lahir kekuatan pangan yang berkelanjutan dan mensejahterakan masyarakat lokal.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Visi & Misi Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="p-4 bg-white rounded-4 border h-100 shadow-sm">
                        <div class="d-inline-flex p-3 rounded-3 bg-success bg-opacity-10 text-success mb-3">
                            <i class="bi bi-eye fs-3"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-2">Visi Kami</h4>
                        <p class="text-secondary mb-0" style="line-height: 1.8;">
                            Menjadi UMKM pengolahan hasil pertanian terdepan di tingkat nasional yang dikenal dengan keaslian rasa, kualitas pangan tanpa kompromi, dan kontribusi nyata terhadap kesejahteraan petani lokal di seluruh penjuru Indonesia.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-4 bg-white rounded-4 border h-100 shadow-sm">
                        <div class="d-inline-flex p-3 rounded-3 bg-warning bg-opacity-10 text-warning mb-3">
                            <i class="bi bi-bullseye fs-3"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-2">Misi Kami</h4>
                        <ul class="text-secondary mb-0 ps-3" style="line-height: 1.8;">
                            <li>Menghadirkan produk pangan siap saji yang lezat, bernutrisi, dan higienis bagi masyarakat.</li>
                            <li>Menyediakan pasokan bahan baku komoditas pertanian berkualitas tinggi bagi industri kuliner dan Horeka.</li>
                            <li>Menerapkan prinsip perdagangan yang adil (fair trade) demi menjamin kepastian harga panen bagi mitra petani.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
