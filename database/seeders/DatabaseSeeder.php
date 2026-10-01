<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Promosi;
use App\Models\Ulasan;
use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Pengguna / Admin
        User::updateOrCreate(
            ['email' => 'admin@doughheaven.com'],
            [
                'name' => 'Admin DoughHeaven',
                'password' => Hash::make('admin123'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'cheriaapiani@gmail.com'],
            [
                'name' => 'Cheria Apiani',
                'password' => Hash::make('admin123'),
            ]
        );

        // 2. Kategori Produk
        $katClassic = Kategori::updateOrCreate(
            ['nama_kategori' => 'Classic Donuts'],
            [
                'deskripsi' => 'Pilihan donat klasik dengan kelembutan adonan otentik.',
                'aktif' => true,
            ]
        );

        $katGlazed = Kategori::updateOrCreate(
            ['nama_kategori' => 'Glazed & Toppings'],
            [
                'deskripsi' => 'Donat berbalut glaze manis dan topping aneka rasa.',
                'aktif' => true,
            ]
        );

        $katSpecial = Kategori::updateOrCreate(
            ['nama_kategori' => 'Special Delights'],
            [
                'deskripsi' => 'Varian donat premium edisi spesial DoughHeaven.',
                'aktif' => true,
            ]
        );

        // 3. Produk Donat
        $produkList = [
            [
                'nama_produk' => 'Original Glazed Halo',
                'kategori_id' => $katGlazed->id,
                'deskripsi' => 'Donat lembut klasik dengan lapisan gula glaze mengkilap yang lumer sempurna di mulut.',
                'harga' => '15000',
                'gambar' => 'produk/YyR57vTjqxsJkcpqrC1tSM0cGK7u2dXeIGUln6ss.jpg',
                'rekomendasi' => 'rekomendasi',
            ],
            [
                'nama_produk' => 'Choco Heaven Delight',
                'kategori_id' => $katGlazed->id,
                'deskripsi' => 'Donat empuk dibalut cokelat belgian pekat dan taburan choco chips renyah.',
                'harga' => '18000',
                'gambar' => 'produk/93KFyw7kcHtvisXp6w1aCfuIa7PXFRDE9mzYOR4E.jpg',
                'rekomendasi' => 'rekomendasi',
            ],
            [
                'nama_produk' => 'Sweet Strawberry Sprinkles',
                'kategori_id' => $katGlazed->id,
                'deskripsi' => 'Glaze stroberi manis segar dengan taburan meses pelangi warna-warni yang ceria.',
                'harga' => '18000',
                'gambar' => 'produk/aVpMfcVo50jaB0y8C0kRQN6gyWzZDSJfDxPzxOm2.jpg',
                'rekomendasi' => 'rekomendasi',
            ],
            [
                'nama_produk' => 'Matcha Blossom Paradise',
                'kategori_id' => $katSpecial->id,
                'deskripsi' => 'Rasa matcha khas Jepang berpadu dengan kelembutan donat premium.',
                'harga' => '20000',
                'gambar' => 'produk/BCHcOMUtQLo1LDNCjB8qxmhdRoqyT5sPmGcuraEa.jpg',
                'rekomendasi' => 'none',
            ],
            [
                'nama_produk' => 'Caramel Crunch Delight',
                'kategori_id' => $katSpecial->id,
                'deskripsi' => 'Saus karamel lumer bertabur kacang almond panggang yang renyah.',
                'harga' => '22000',
                'gambar' => 'produk/By7Z7TpgTir1Resia4fBjYadRqXAoVXqVPk3mSwH.jpg',
                'rekomendasi' => 'none',
            ],
            [
                'nama_produk' => 'Classic Sugar Powder Donut',
                'kategori_id' => $katClassic->id,
                'deskripsi' => 'Donat tradisional yang lembut dengan taburan gula halus salju premium.',
                'harga' => '12000',
                'gambar' => 'produk/dYXqs3UEI2nkLuCIMBz9cbxQRV59D0Nj2QTqaOVp.jpg',
                'rekomendasi' => 'none',
            ],
        ];

        foreach ($produkList as $p) {
            Produk::updateOrCreate(
                ['nama_produk' => $p['nama_produk']],
                $p
            );
        }

        // 4. Promosi & Diskon
        $promo1 = Promosi::updateOrCreate(
            ['nama_promosi' => 'Happy Hour Deal - Diskon 30%'],
            [
                'kategori_promosi' => 'Flash Sale',
                'deskripsi' => 'Nikmati diskon 30% untuk semua varian donat favorit Anda setiap hari kerja pukul 14.00 - 16.00 WIB!',
                'jatuh_tempo' => now()->addDays(30),
            ]
        );

        $promo2 = Promosi::updateOrCreate(
            ['nama_promosi' => 'Buy 5 Get 1 Free Classic Donut'],
            [
                'kategori_promosi' => 'Bundle Deals',
                'deskripsi' => 'Beli 5 donat varian apa saja dan dapatkan 1 donat Classic Sugar Powder manis secara gratis!',
                'jatuh_tempo' => now()->addDays(60),
            ]
        );

        $promo3 = Promosi::updateOrCreate(
            ['nama_promosi' => 'Paket Berbagi: Box of 12 Donuts'],
            [
                'kategori_promosi' => 'Gift Sets',
                'deskripsi' => 'Kotak hemat 12 donat aneka rasa lezat pilihan Anda dengan harga spesial, cocok untuk kumpul keluarga.',
                'jatuh_tempo' => now()->addDays(90),
            ]
        );

        $promo4 = Promosi::updateOrCreate(
            ['nama_promosi' => 'Sweet Student & Youth Discount 15%'],
            [
                'kategori_promosi' => 'Loyalty Program',
                'deskripsi' => 'Tunjukkan kartu pelajar atau kartu mahasiswa Anda untuk mendapatkan diskon langsung 15% setiap hari.',
                'jatuh_tempo' => now()->addDays(120),
            ]
        );

        // Hubungkan produk ke promo
        $allProdukIds = Produk::pluck('id')->toArray();
        if (!empty($allProdukIds)) {
            $promo1->produks()->sync(array_slice($allProdukIds, 0, 3));
            $promo2->produks()->sync(array_slice($allProdukIds, 0, 4));
            $promo3->produks()->sync($allProdukIds);
            $promo4->produks()->sync(array_slice($allProdukIds, 2, 3));
        }

        // 5. Ulasan Pengguna
        Ulasan::updateOrCreate(
            [
                'email' => 'cheriasevani@gmail.com',
                'isi' => 'Enakk banget donatnya! Teksturnya super empuk dan varian matcha-nya juara.',
            ],
            [
                'nama' => 'Sevani Apiani',
                'subjek' => 'Donat Terenak di Bandung!',
                'tampilkan' => true,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ]
        );

        Ulasan::updateOrCreate(
            [
                'email' => 'rizky.pratama@gmail.com',
                'isi' => 'Pesan 2 lusin untuk syukuran kantor, ludes dalam 15 menit. Glaze cokelatnya premium dan gak bikin seret.',
            ],
            [
                'nama' => 'Rizky Pratama',
                'subjek' => 'Paling Favorit Buat Rapat Kantor',
                'tampilkan' => true,
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(7),
            ]
        );

        Ulasan::updateOrCreate(
            [
                'email' => 'nadia.safitri@yahoo.com',
                'isi' => 'Tempatnya cozy di Melong Asih, staff ramah dan kemasannya cantik banget cocok buat hampers hadiah ulang tahun.',
            ],
            [
                'nama' => 'Nadia Safitri',
                'subjek' => 'Packaging Cantik & Pelayanan Ramah',
                'tampilkan' => true,
                'created_at' => now()->subDays(12),
                'updated_at' => now()->subDays(12),
            ]
        );

        // 6. Blog & Kisah Manis DoughHeaven
        $adminUser = User::where('email', 'admin@doughheaven.com')->first() ?: User::first();
        if ($adminUser) {
            Blog::updateOrCreate(
                ['judul' => 'Rahasia Kelembutan Donat DoughHeaven: Dari Fermentasi Ragi Alami hingga Glaze Belgia'],
                [
                    'user_id' => $adminUser->id,
                    'tanggal' => now()->subDays(2),
                    'kategori' => 'whats_good',
                    'deskripsi' => 'Pernahkah Anda bertanya mengapa donat DoughHeaven tetap empuk dan lumer di mulut sepanjang hari? Yuk simak rahasia dapur artisanal kami!',
                    'isi_blog' => "Bagi kami di DoughHeaven, donat bukan sekadar adonan tepung yang digoreng manis. Setiap donat yang keluar dari oven dan penggorengan kami melewati proses slow cold-fermentation selama 18 jam.\n\nProses fermentasi lambat ini memungkinkan ragi alami memecah pati tepung gandum pilihan secara perlahan, menghasilkan gelembung udara mikro yang merata. Inilah yang membuat tekstur donat kami sangat lembut seperti kapas (cloud-like fluffiness) dan tidak berminyak.\n\nSelain adonan, kami menggunakan cokelat couverture Belgia asli serta puree buah stroberi segar untuk glaze topping. Kami percaya bahwa bahan-bahan terbaik yang dipilih dengan penuh dedikasi akan menghasilkan rasa manis yang elegan dan tak terlupakan.",
                    'gambar' => 'blog-images/1748198894_Donat.jpeg',
                ]
            );

            Blog::updateOrCreate(
                ['judul' => 'Paduan Sempurna: 5 Rekomendasi Minuman Kopi & Fruit Latte Pendamping Donat'],
                [
                    'user_id' => $adminUser->id,
                    'tanggal' => now()->subDays(5),
                    'kategori' => 'whats_new',
                    'deskripsi' => 'Menikmati donat hangat paling pas ditemani tegukan minuman yang pas. Ini panduan pairing donat favorit DoughHeaven!',
                    'isi_blog' => "Kombinasi rasa yang tepat antara manisnya donat dan kesegaran minuman dapat meningkatkan pengalaman santap Anda berkali-kali lipat!\n\nBerikut 3 pairing favorit pengunjung DoughHeaven:\n1. Choco Heaven Delight + Iced Americano: Kepahitan kopi robusta-arabika seimbang sempurna dengan manisnya lelehan cokelat Belgia pekat.\n2. Original Glazed + Fruit Berry Latte: Kesegaran susu stroberi berpadu lembut dengan lapisan gula karamel tipis.\n3. Matcha Blossom + Hot Earl Grey Tea: Aroma herbal teh berpadu harmonis dengan bubuk matcha Kyoto autentik.\n\nKira-kira kombinasi mana yang jadi favorit santai sore Anda hari ini?",
                    'gambar' => 'blog-images/1748198783_FRUIT LATTE AND CHOCOLATE DONUT.jpeg',
                ]
            );

            Blog::updateOrCreate(
                ['judul' => 'Tips Menyimpan Donat Agar Tetap Empuk dan Hangat Sampai Besok Pagi'],
                [
                    'user_id' => $adminUser->id,
                    'tanggal' => now()->subDays(10),
                    'kategori' => 'whats_fun',
                    'deskripsi' => 'Punya sisa donat di kotak untuk sarapan besok? Ikuti tips praktis ini agar teksturnya tetap lembut seperti baru keluar dari dapur!',
                    'isi_blog' => "Membawa pulang sekotak donat DoughHeaven untuk stok camilan keluarga? Jangan khawatir donat jadi keras atau kering!\n\nTips mudah menjaga kelezatan donat:\n1. Simpan di wadah kedap udara (Air-tight container): Jauhkan donat dari paparan udara terbuka agar kelembapan alaminya terjaga.\n2. Jangan simpan di kulkas: Suhu dingin kulkas justru mempercepat proses retrogradasi pati yang membuat donat mengeras. Cukup simpan di suhu ruang sejuk.\n3. Hangatkan 8-10 detik di microwave: Sebelum disantap, hangatkan donat sebentar. Glaze akan kembali berkilau dan adonan akan selembut saat baru matang!\n\nSelamat menikmati kembali donat impian Anda!",
                    'gambar' => 'blog-images/1748198562_2.jpeg',
                ]
            );
        }
    }
}
