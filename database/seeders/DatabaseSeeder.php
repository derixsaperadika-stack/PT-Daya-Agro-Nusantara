<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Kategori Produk
        $categoriesData = [
            [
                'name' => 'Keripik Singkong',
                'slug' => 'keripik-singkong',
                'icon' => 'bi-basket2',
                'description' => 'Olahan singkong pilihan renyah dengan aneka bumbu rempah alami lokal.',
            ],
            [
                'name' => 'Kopi Robusta',
                'slug' => 'kopi-robusta',
                'icon' => 'bi-cup-hot',
                'description' => 'Biji kopi robusta petik merah asli nusantara dengan aroma tebal dan rasa mantap.',
            ],
            [
                'name' => 'Gula Aren',
                'slug' => 'gula-aren',
                'icon' => 'bi-droplet-half',
                'description' => 'Pemanis alami kaya nutrisi dari 100% nira aren murni tanpa zat kimia buatan.',
            ],
            [
                'name' => 'Olahan Kelapa',
                'slug' => 'olahan-kelapa',
                'icon' => 'bi-tree',
                'description' => 'Produk turunan kelapa unggulan termasuk Minyak Kelapa Murni (VCO) cold-pressed.',
            ],
        ];

        $categories = [];
        foreach ($categoriesData as $cat) {
            $categories[$cat['slug']] = Category::create($cat);
        }

        // 2. Data Produk Contoh (Masing-masing kategori minimal 3 produk)
        $productsData = [
            // --- Kategori 1: Keripik Singkong (3 Produk) ---
            [
                'category_slug' => 'keripik-singkong',
                'name' => 'Keripik Singkong Original Crispy',
                'slug' => 'keripik-singkong-original-crispy',
                'short_description' => 'Keripik singkong gurih renyah dengan taburan garam laut alami.',
                'description' => 'Dibuat dari singkong mentega pilihan hasil panen petani lokal yang diproses dengan teknologi penggorengan suhu terkontrol. Menghasilkan tekstur keripik yang super renyah, tidak berminyak, dan mempertahankan cita rasa gurih alami tanpa bahan pengawet.',
                'price' => 18000,
                'stock' => 45,
                'unit' => 'Pouch 200g',
                'image' => 'products/keripik-singkong-original.jpg',
                'is_featured' => true,
            ],
            [
                'category_slug' => 'keripik-singkong',
                'name' => 'Keripik Singkong Balado Daun Jeruk',
                'slug' => 'keripik-singkong-balado-daun-jeruk',
                'short_description' => 'Sensasi pedas manis bumbu cabai asli dengan aroma segar daun jeruk.',
                'description' => 'Kombinasi cabai merah segar, bawang lokal, gula aren, dan cacahan daun jeruk purut menciptakan sensasi rasa pedas manis yang bikin ketagihan. Cocok untuk cemilan santai bersama teman dan keluarga.',
                'price' => 20000,
                'stock' => 30,
                'unit' => 'Pouch 200g',
                'image' => 'products/keripik-singkong-balado.jpg',
                'is_featured' => true,
            ],
            [
                'category_slug' => 'keripik-singkong',
                'name' => 'Keripik Singkong Keju Bakar Manis',
                'slug' => 'keripik-singkong-keju-bakar-manis',
                'short_description' => 'Keripik singkong dengan balutan keju panggang gurih manis yang lumer di lidah.',
                'description' => 'Menggunakan racikan bumbu keju cheddar asli yang dipanggang harum berpadu dengan kerenyahan irisan singkong pilihan. Menghadirkan rasa gurih manis creamy yang cocok untuk semua usia.',
                'price' => 21000,
                'stock' => 35,
                'unit' => 'Pouch 200g',
                'image' => 'products/keripik-singkong-keju.jpg',
                'is_featured' => false,
            ],

            // --- Kategori 2: Kopi Robusta (3 Produk) ---
            [
                'category_slug' => 'kopi-robusta',
                'name' => 'Kopi Robusta Petik Merah Premium',
                'slug' => 'kopi-robusta-petik-merah-premium',
                'short_description' => 'Biji kopi robusta grade 1 dengan body tebal, aroma cokelat & kacang.',
                'description' => 'Dipetik selektif hanya buah kopi merah matang dari lereng pegunungan nusantara. Melalui proses sortasi ketat dan disangrai medium-dark roast oleh roaster terampil, menghasilkan seduhan kopi mantap bertenaga dengan tingkat keasaman rendah.',
                'price' => 45000,
                'stock' => 25,
                'unit' => 'Pouch 250g',
                'image' => 'products/kopi-robusta-premium.jpg',
                'is_featured' => true,
            ],
            [
                'category_slug' => 'kopi-robusta',
                'name' => 'Kopi Robusta Fine Bubuk Halus',
                'slug' => 'kopi-robusta-fine-bubuk-halus',
                'short_description' => 'Kopi robusta bubuk gilingan halus siap seduh tubruk atau moka pot.',
                'description' => 'Digiling dengan tingkat kehalusan optimal sehingga menghasilkan krema tebal, aroma wangi cokelat karamel yang pekat, dan rasa mantap tanpa ampas kasar yang mengganggu.',
                'price' => 42000,
                'stock' => 30,
                'unit' => 'Pouch 250g',
                'image' => 'products/kopi-robusta-bubuk.jpg',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'kopi-robusta',
                'name' => 'Cold Brew Kopi Robusta Siap Minum',
                'slug' => 'cold-brew-kopi-robusta-siap-minum',
                'short_description' => 'Ekstrak seduh dingin 12 jam, rasa halus lembut dan menyegarkan.',
                'description' => 'Diseduh melalui teknik perendaman air dingin selama 12 jam penuh untuk menghasilkan rasa kopi yang kaya, manis alami tanpa gula, tingkat keasaman sangat rendah, dan ramah di lambung.',
                'price' => 25000,
                'stock' => 20,
                'unit' => 'Botol 250ml',
                'image' => 'products/kopi-cold-brew.jpg',
                'is_featured' => true,
            ],

            // --- Kategori 3: Gula Aren (3 Produk) ---
            [
                'category_slug' => 'gula-aren',
                'name' => 'Gula Aren Cetak Murni Tradisional',
                'slug' => 'gula-aren-cetak-murni-tradisional',
                'short_description' => 'Gula aren cetak padat dari nira aren murni tanpa campuran gula pasir.',
                'description' => 'Diproduksi higienis dengan perebusan tradisional di atas tungku kayu api oleh para petani nira aren binaan PT Daya Agro Nusantara. Memiliki aroma karamel asap khas dan rasa manis legit yang tahan lama.',
                'price' => 30000,
                'stock' => 50,
                'unit' => 'Batok 500g',
                'image' => 'products/gula-aren-cetak.jpg',
                'is_featured' => true,
            ],
            [
                'category_slug' => 'gula-aren',
                'name' => 'Gula Aren Semut Organik (Granulated)',
                'slug' => 'gula-aren-semut-organik',
                'short_description' => 'Gula aren kristal butiran halus, praktis larut, dan rendah glikemik.',
                'description' => 'Kristal gula aren murni dengan kadar air rendah (< 2%) sehingga tahan lama tanpa pengawet. Alternatif pemanis alami sehat untuk kopi, teh, minuman herbal, sereal, dan olahan kue.',
                'price' => 28000,
                'stock' => 35,
                'unit' => 'Pouch 300g',
                'image' => 'products/gula-aren-semut.jpg',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'gula-aren',
                'name' => 'Sirup Gula Aren Cair Murni',
                'slug' => 'sirup-gula-aren-cair-murni',
                'short_description' => 'Sirup nira aren kental alami tanpa pengawet untuk kopi susu & kafe.',
                'description' => 'Gula aren cair berkonsistensi kental pekat dengan aroma karamel smoky yang khas. Sangat mudah larut dalam minuman dingin maupun panas, ideal untuk bahan baku es kopi susu kekinian, boba, dan saus waffle/pancake.',
                'price' => 32000,
                'stock' => 40,
                'unit' => 'Botol 350ml',
                'image' => 'products/sirup-gula-aren-cair.jpg',
                'is_featured' => true,
            ],

            // --- Kategori 4: Olahan Kelapa (3 Produk) ---
            [
                'category_slug' => 'olahan-kelapa',
                'name' => 'Virgin Coconut Oil (VCO) Cold-Pressed',
                'slug' => 'virgin-coconut-oil-vco-cold-pressed',
                'short_description' => 'Minyak kelapa murni tanpa pemanasan, bening jernih kaya asam laurat.',
                'description' => 'Diekstrak menggunakan metode cold-press dari santan kelapa tua segar bebas pestisida. Warna bening sebening air, aroma kelapa lembut tanpa bau tengik, dan sarat nutrisi MCT untuk kesehatan imun tubuh, perawatan rambut, dan kulit.',
                'price' => 55000,
                'stock' => 20,
                'unit' => 'Botol 250ml',
                'image' => 'products/vco-kelapa-murni.jpg',
                'is_featured' => true,
            ],
            [
                'category_slug' => 'olahan-kelapa',
                'name' => 'Keripik Kelapa Panggang Crispy',
                'slug' => 'keripik-kelapa-panggang-crispy',
                'short_description' => 'Irisan daging kelapa panggang renyah dengan taburan sea salt dan gula aren.',
                'description' => 'Snack sehat berbahan irisan tipis daging kelapa tua pilihan yang dipanggang perlahan tanpa minyak tambahan. Renyah, gurih alami, kaya serat pangan, dan rendah karbohidrat.',
                'price' => 22000,
                'stock' => 28,
                'unit' => 'Pouch 150g',
                'image' => 'products/keripik-kelapa-panggang.jpg',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'olahan-kelapa',
                'name' => 'Gula Kelapa Kristal Organik',
                'slug' => 'gula-kelapa-kristal-organik',
                'short_description' => 'Gula kristal dari nira bunga pohon kelapa nusantara bernutrisi tinggi.',
                'description' => 'Dipanen dari tandan bunga kelapa segar oleh petani pesisir, diproses menjadi butiran kristal halus alami. Pemanis alami dengan indeks glikemik rendah dan aroma kelapa lembut yang menggugah selera.',
                'price' => 26000,
                'stock' => 32,
                'unit' => 'Pouch 250g',
                'image' => 'products/gula-kelapa-kristal.jpg',
                'is_featured' => false,
            ],
        ];

        foreach ($productsData as $prod) {
            $catSlug = $prod['category_slug'];
            unset($prod['category_slug']);
            $prod['category_id'] = $categories[$catSlug]->id;
            Product::create($prod);
        }
    }
}
