<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Untuk menghindari error duplikasi saat seeder dijalankan berulang kali
        // Kita hanya akan menambahkan data jika tabel products kosong.
        if (DB::table('products')->count() > 0) {
            return;
        }

        $products = [
            // --- 1. MacBook Pro M3 ---
            [
                'name' => 'MacBook Pro 14" M3 Pro',
                'brand' => 'Apple',
                'description' => 'Laptop profesional kelas atas dengan chip M3 Pro untuk performa dan efisiensi energi yang tak tertandingi.',
                'processor' => 'Apple M3 Pro (11-core CPU)',
                'ram_gb' => 18,
                'storage_gb' => 512,
                'storage_type' => 'SSD',
                'gpu' => 'Apple M3 Pro (14-core GPU)',
                'display_size_inch' => 14.2,
                'display_resolution' => '3024x1964',
                'price' => 29990000,
                'image' => 'https://images.unsplash.com/photo-1627885061483-360706214150?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 2. Dell XPS 13 Plus ---
            [
                'name' => 'Dell XPS 13 Plus',
                'brand' => 'Dell',
                'description' => 'Laptop ultra-portabel dengan desain modern dan performa tinggi untuk pekerjaan kreatif.',
                'processor' => 'Intel Core i7-1360P',
                'ram_gb' => 16,
                'storage_gb' => 1000, // 1TB
                'storage_type' => 'SSD',
                'gpu' => null,
                'display_size_inch' => 13.4,
                'display_resolution' => '3.5K OLED (3456x2160)',
                'price' => 25500000,
                'image' => 'https://images.unsplash.com/photo-1622736113945-802c679a9559?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 3. ASUS ROG Zephyrus G14 ---
            [
                'name' => 'ASUS ROG Zephyrus G14',
                'brand' => 'ASUS',
                'description' => 'Laptop gaming ringkas dan bertenaga dengan performa AMD Ryzen dan grafis NVIDIA RTX.',
                'processor' => 'AMD Ryzen 9 7940HS',
                'ram_gb' => 32,
                'storage_gb' => 1000,
                'storage_type' => 'SSD',
                'gpu' => 'NVIDIA GeForce RTX 4070',
                'display_size_inch' => 14.0,
                'display_resolution' => 'QHD+ (2560x1600) 165Hz',
                'price' => 32000000,
                'image' => 'https://images.unsplash.com/photo-1593642702749-bf929252c89f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 4. HP Spectre x360 14 ---
            [
                'name' => 'HP Spectre x360 14',
                'brand' => 'HP',
                'description' => 'Laptop 2-in-1 premium yang elegan dengan layar OLED dan baterai tahan lama.',
                'processor' => 'Intel Core i7-1355U',
                'ram_gb' => 16,
                'storage_gb' => 512,
                'storage_type' => 'SSD',
                'gpu' => null,
                'display_size_inch' => 13.5,
                'display_resolution' => '3K2K OLED (3000x2000)',
                'price' => 22800000,
                'image' => 'https://images.unsplash.com/photo-1616852467140-bc56598c1303?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 5. Lenovo ThinkPad X1 Carbon Gen 11 ---
            [
                'name' => 'Lenovo ThinkPad X1 Carbon Gen 11',
                'brand' => 'Lenovo',
                'description' => 'Laptop bisnis andalan dengan ketahanan legendaris, ringan, dan fitur keamanan terdepan.',
                'processor' => 'Intel Core i5-1335U',
                'ram_gb' => 16,
                'storage_gb' => 512,
                'storage_type' => 'SSD',
                'gpu' => null,
                'display_size_inch' => 14.0,
                'display_resolution' => 'WUXGA (1920x1200)',
                'price' => 21000000,
                'image' => 'https://images.unsplash.com/photo-1510511116631-77864c3c3a92?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 6. Microsoft Surface Laptop 5 ---
            [
                'name' => 'Microsoft Surface Laptop 5',
                'brand' => 'Microsoft',
                'description' => 'Laptop yang dirancang oleh Microsoft, sangat tipis dan ringan, ideal untuk penggunaan Windows.',
                'processor' => 'Intel Core i7-1255U',
                'ram_gb' => 16,
                'storage_gb' => 512,
                'storage_type' => 'SSD',
                'gpu' => null,
                'display_size_inch' => 13.5,
                'display_resolution' => '2256x1504',
                'price' => 19500000,
                'image' => 'https://images.unsplash.com/photo-1629815809278-f6dd3108c908?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 7. Acer Predator Helios 16 ---
            [
                'name' => 'Acer Predator Helios 16',
                'brand' => 'Acer',
                'description' => 'Laptop gaming bertenaga dengan layar besar dan sistem pendingin canggih.',
                'processor' => 'Intel Core i9-13900HX',
                'ram_gb' => 64,
                'storage_gb' => 2000, // 2TB
                'storage_type' => 'SSD',
                'gpu' => 'NVIDIA GeForce RTX 4080',
                'display_size_inch' => 16.0,
                'display_resolution' => 'QHD+ (2560x1600) 240Hz',
                'price' => 45000000,
                'image' => 'https://images.unsplash.com/photo-1586940026330-8d5f3d37617b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 8. Xiaomi RedmiBook Pro 15 ---
            [
                'name' => 'Xiaomi RedmiBook Pro 15',
                'brand' => 'Xiaomi',
                'description' => 'Pilihan laptop dengan harga terjangkau yang menawarkan spesifikasi solid untuk kerja dan hiburan.',
                'processor' => 'Intel Core i5-12450H',
                'ram_gb' => 16,
                'storage_gb' => 512,
                'storage_type' => 'SSD',
                'gpu' => null,
                'display_size_inch' => 15.6,
                'display_resolution' => '3.2K (3200x2000)',
                'price' => 12500000,
                'image' => 'https://images.unsplash.com/photo-1593642531955-b62e17b3bd04?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 9. MSI Titan GT77 HX ---
            [
                'name' => 'MSI Titan GT77 HX',
                'brand' => 'MSI',
                'description' => 'Desktop Replacement terkuat dengan spesifikasi puncak untuk gaming dan *rendering* ekstrem.',
                'processor' => 'Intel Core i9-13980HX',
                'ram_gb' => 128,
                'storage_gb' => 4000, // 4TB
                'storage_type' => 'SSD',
                'gpu' => 'NVIDIA GeForce RTX 4090',
                'display_size_inch' => 17.3,
                'display_resolution' => '4K (3840x2160) 144Hz',
                'price' => 85000000,
                'image' => 'https://images.unsplash.com/photo-1627850898516-724f114006c7?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 10. Razer Blade 16 ---
            [
                'name' => 'Razer Blade 16',
                'brand' => 'Razer',
                'description' => 'Laptop gaming dengan desain premium yang ramping dan layar Mini-LED dual-mode.',
                'processor' => 'Intel Core i9-13950HX',
                'ram_gb' => 32,
                'storage_gb' => 1000,
                'storage_type' => 'SSD',
                'gpu' => 'NVIDIA GeForce RTX 4070',
                'display_size_inch' => 16.0,
                'display_resolution' => 'QHD+ (2560x1600) 240Hz',
                'price' => 48000000,
                'image' => 'https://images.unsplash.com/photo-1647416480287-c914e9f39007?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 11. Samsung Galaxy Book3 Pro ---
            [
                'name' => 'Samsung Galaxy Book3 Pro',
                'brand' => 'Samsung',
                'description' => 'Laptop tipis dan ringan dengan integrasi sempurna untuk ekosistem Galaxy.',
                'processor' => 'Intel Core i7-1360P',
                'ram_gb' => 16,
                'storage_gb' => 512,
                'storage_type' => 'SSD',
                'gpu' => null,
                'display_size_inch' => 14.0,
                'display_resolution' => '2880x1800 AMOLED',
                'price' => 24500000,
                'image' => 'https://images.unsplash.com/photo-1678170889984-6330a1127009?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 12. Google Pixelbook Go (Generasi Lama) ---
            [
                'name' => 'Google Pixelbook Go',
                'brand' => 'Google',
                'description' => 'Chromebook ringan dan cepat, ideal untuk pengguna yang bekerja di cloud.',
                'processor' => 'Intel Core i5-8200Y',
                'ram_gb' => 8,
                'storage_gb' => 128,
                'storage_type' => 'SSD',
                'gpu' => null,
                'display_size_inch' => 13.3,
                'display_resolution' => 'Full HD (1920x1080)',
                'price' => 10500000,
                'image' => 'https://images.unsplash.com/photo-1616010515152-d596645d9101?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => false,
            ],
            // --- 13. HP Omen 17 ---
            [
                'name' => 'HP Omen 17',
                'brand' => 'HP',
                'description' => 'Laptop gaming layar besar dengan pendingin yang efektif dan keyboard mekanikal.',
                'processor' => 'Intel Core i7-13700HX',
                'ram_gb' => 32,
                'storage_gb' => 1000,
                'storage_type' => 'SSD',
                'gpu' => 'NVIDIA GeForce RTX 4070',
                'display_size_inch' => 17.3,
                'display_resolution' => 'QHD (2560x1440) 165Hz',
                'price' => 38000000,
                'image' => 'https://images.unsplash.com/photo-1605371924559-2d06126da363?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 14. Dell G15 Gaming ---
            [
                'name' => 'Dell G15 Gaming',
                'brand' => 'Dell',
                'description' => 'Laptop gaming entry-level yang menawarkan keseimbangan harga dan performa.',
                'processor' => 'AMD Ryzen 7 7840HS',
                'ram_gb' => 16,
                'storage_gb' => 512,
                'storage_type' => 'SSD',
                'gpu' => 'NVIDIA GeForce RTX 4060',
                'display_size_inch' => 15.6,
                'display_resolution' => 'Full HD (1920x1080) 120Hz',
                'price' => 18500000,
                'image' => 'https://images.unsplash.com/photo-1616782531021-39644ed1e92d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 15. ASUS Zenbook 14 OLED ---
            [
                'name' => 'ASUS Zenbook 14 OLED',
                'brand' => 'ASUS',
                'description' => 'Laptop tipis dan ringan untuk produktivitas dengan layar OLED yang memukau.',
                'processor' => 'Intel Core i7-13700H',
                'ram_gb' => 16,
                'storage_gb' => 1000,
                'storage_type' => 'SSD',
                'gpu' => null,
                'display_size_inch' => 14.0,
                'display_resolution' => '2.8K OLED (2880x1800)',
                'price' => 19900000,
                'image' => 'https://images.unsplash.com/photo-1618331777490-58c067d510f2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 16. Lenovo Legion Pro 7i ---
            [
                'name' => 'Lenovo Legion Pro 7i',
                'brand' => 'Lenovo',
                'description' => 'Laptop gaming dengan spesifikasi brutal dan desain yang profesional.',
                'processor' => 'Intel Core i9-13900HX',
                'ram_gb' => 32,
                'storage_gb' => 1000,
                'storage_type' => 'SSD',
                'gpu' => 'NVIDIA GeForce RTX 4080',
                'display_size_inch' => 16.0,
                'display_resolution' => 'QHD+ (2560x1600) 240Hz',
                'price' => 43000000,
                'image' => 'https://images.unsplash.com/photo-1627876251219-c9676722d361?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 17. Acer Aspire 5 ---
            [
                'name' => 'Acer Aspire 5',
                'brand' => 'Acer',
                'description' => 'Laptop serbaguna untuk kebutuhan sehari-hari dengan harga ekonomis.',
                'processor' => 'Intel Core i3-1215U',
                'ram_gb' => 8,
                'storage_gb' => 512,
                'storage_type' => 'SSD',
                'gpu' => null,
                'display_size_inch' => 15.6,
                'display_resolution' => 'Full HD (1920x1080)',
                'price' => 7800000,
                'image' => 'https://images.unsplash.com/photo-1616852467140-bc56598c1303?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 18. HP Pavilion Aero 13 ---
            [
                'name' => 'HP Pavilion Aero 13',
                'brand' => 'HP',
                'description' => 'Laptop ultra-ringan dengan body magnesium yang kuat dan performa AMD Ryzen.',
                'processor' => 'AMD Ryzen 5 7535U',
                'ram_gb' => 16,
                'storage_gb' => 512,
                'storage_type' => 'SSD',
                'gpu' => null,
                'display_size_inch' => 13.3,
                'display_resolution' => 'WUXGA (1920x1200)',
                'price' => 13500000,
                'image' => 'https://images.unsplash.com/photo-1593642531955-b62e17b3bd04?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 19. Microsoft Surface Pro 9 ---
            [
                'name' => 'Microsoft Surface Pro 9',
                'brand' => 'Microsoft',
                'description' => 'Tablet 2-in-1 dengan performa laptop, sangat fleksibel dan portabel.',
                'processor' => 'Intel Core i5-1235U',
                'ram_gb' => 8,
                'storage_gb' => 256,
                'storage_type' => 'SSD',
                'gpu' => null,
                'display_size_inch' => 13.0,
                'display_resolution' => '2880x1920',
                'price' => 17500000,
                'image' => 'https://images.unsplash.com/photo-1606220556950-89196d013f9c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 20. Alienware m18 ---
            [
                'name' => 'Alienware m18',
                'brand' => 'Dell',
                'description' => 'Laptop gaming 18 inci yang masif dengan tenaga maksimal untuk pengalaman gaming imersif.',
                'processor' => 'Intel Core i9-13900HX',
                'ram_gb' => 32,
                'storage_gb' => 2000,
                'storage_type' => 'SSD',
                'gpu' => 'NVIDIA GeForce RTX 4090',
                'display_size_inch' => 18.0,
                'display_resolution' => 'QHD+ (2560x1600) 165Hz',
                'price' => 70000000,
                'image' => 'https://images.unsplash.com/photo-1616782531021-39644ed1e92d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 21. ASUS Vivobook 14X ---
            [
                'name' => 'ASUS Vivobook 14X',
                'brand' => 'ASUS',
                'description' => 'Laptop *mainstream* dengan performa yang cukup kuat untuk tugas sehari-hari dan sedikit kerja kreatif.',
                'processor' => 'AMD Ryzen 7 5800H',
                'ram_gb' => 16,
                'storage_gb' => 512,
                'storage_type' => 'SSD',
                'gpu' => null,
                'display_size_inch' => 14.0,
                'display_resolution' => 'Full HD (1920x1080)',
                'price' => 11000000,
                'image' => 'https://images.unsplash.com/photo-1593642702749-bf929252c89f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 22. Lenovo IdeaPad Slim 5 ---
            [
                'name' => 'Lenovo IdeaPad Slim 5',
                'brand' => 'Lenovo',
                'description' => 'Pilihan laptop tipis dengan harga terjangkau untuk mahasiswa dan pekerja kantoran.',
                'processor' => 'Intel Core i5-1340P',
                'ram_gb' => 16,
                'storage_gb' => 512,
                'storage_type' => 'SSD',
                'gpu' => null,
                'display_size_inch' => 14.0,
                'display_resolution' => '2.2K (2240x1400)',
                'price' => 10500000,
                'image' => 'https://images.unsplash.com/photo-1510511116631-77864c3c3a92?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 23. Dell Latitude 7440 ---
            [
                'name' => 'Dell Latitude 7440',
                'brand' => 'Dell',
                'description' => 'Laptop bisnis kelas enterprise dengan fitur keamanan dan manajemen IT yang kuat.',
                'processor' => 'Intel Core i7-1355U',
                'ram_gb' => 16,
                'storage_gb' => 512,
                'storage_type' => 'SSD',
                'gpu' => null,
                'display_size_inch' => 14.0,
                'display_resolution' => 'Full HD+ (1920x1200)',
                'price' => 27000000,
                'image' => 'https://images.unsplash.com/photo-1627885061483-360706214150?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 24. MacBook Air M2 ---
            [
                'name' => 'MacBook Air 15" M2',
                'brand' => 'Apple',
                'description' => 'Laptop paling tipis dan ringan dari Apple dengan performa efisien chip M2.',
                'processor' => 'Apple M2 (8-core CPU)',
                'ram_gb' => 8,
                'storage_gb' => 256,
                'storage_type' => 'SSD',
                'gpu' => 'Apple M2 (10-core GPU)',
                'display_size_inch' => 15.3,
                'display_resolution' => '2880x1864',
                'price' => 18999000,
                'image' => 'https://images.unsplash.com/photo-1678170889984-6330a1127009?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
            // --- 25. ROG Flow Z13 (2023) ---
            [
                'name' => 'ASUS ROG Flow Z13 (2023)',
                'brand' => 'ASUS',
                'description' => 'Tablet gaming yang unik dengan performa kelas atas dalam desain yang sangat portabel.',
                'processor' => 'Intel Core i9-13900H',
                'ram_gb' => 16,
                'storage_gb' => 1000,
                'storage_type' => 'SSD',
                'gpu' => 'NVIDIA GeForce RTX 4050',
                'display_size_inch' => 13.4,
                'display_resolution' => 'QHD+ (2560x1600) 165Hz',
                'price' => 28500000,
                'image' => 'https://images.unsplash.com/photo-1627850898516-724f114006c7?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=400',
                'is_active' => true,
            ],
        ];

        $now = Carbon::now();

        // Tambahkan timestamps ke setiap array produk
        $dataToInsert = array_map(function ($product) use ($now) {
            $product['created_at'] = $now;
            $product['updated_at'] = $now;
            return $product;
        }, $products);

        // Masukkan semua data ke tabel 'products'
        DB::table('products')->insert($dataToInsert);
    }
}
