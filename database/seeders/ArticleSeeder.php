<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'category_slug' => 'pendidikan',
                'title' => 'Informasi Pendidikan untuk Masyarakat',
                'slug' => 'informasi-pendidikan-untuk-masyarakat',
                'excerpt' => 'Panduan bagi masyarakat untuk memperoleh informasi pendidikan dan mendukung proses belajar.',
                'content' => 'Informasi pendidikan membantu masyarakat memahami berbagai hal yang berkaitan dengan kegiatan belajar. Orang tua dapat berperan dengan mendampingi anak belajar, menjalin komunikasi dengan pihak sekolah, serta memperhatikan perkembangan kemampuan anak. Pelajar juga perlu membangun kebiasaan membaca, mengatur waktu belajar, dan menggunakan teknologi secara bertanggung jawab. Informasi mengenai jadwal, persyaratan, dan program pendidikan sebaiknya diperiksa melalui sumber resmi dari sekolah atau instansi terkait.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'pemerintahan',
                'title' => 'Transparansi Informasi Publik Mendukung Kepercayaan Masyarakat',
                'slug' => 'transparansi-informasi-publik',
                'excerpt' => 'Keterbukaan informasi membantu masyarakat memahami program dan pelayanan pemerintah.',
                'content' => 'Transparansi informasi publik merupakan bagian penting dalam membangun hubungan yang baik antara pemerintah dan masyarakat. Informasi yang jelas dan mudah diakses membantu warga memahami program, kebijakan, serta pelayanan yang tersedia. Masyarakat juga perlu memeriksa sumber informasi untuk memastikan bahwa informasi yang diterima berasal dari saluran resmi. Melalui keterbukaan informasi dan komunikasi yang baik, partisipasi masyarakat dalam pembangunan dapat ditingkatkan.',
            ],
            [
                'category_slug' => 'pelayanan-publik',
                'title' => 'Panduan Menyiapkan Dokumen untuk Layanan Administrasi',
                'slug' => 'panduan-layanan-administrasi',
                'excerpt' => 'Persiapan dokumen membantu masyarakat menjalani proses administrasi dengan lebih tertib.',
                'content' => 'Sebelum mengurus layanan administrasi, masyarakat sebaiknya mencari informasi mengenai persyaratan dari instansi yang berwenang. Dokumen identitas dan berkas pendukung perlu diperiksa agar sesuai dengan ketentuan layanan yang diperlukan. Warga juga dapat mencatat jadwal pelayanan, lokasi, serta prosedur pengajuan. Apabila terdapat persyaratan yang belum jelas, tanyakan langsung kepada petugas melalui saluran resmi agar proses pengurusan tidak terkendala.',
            ],
            [
                'category_slug' => 'pembangunan',
                'title' => 'Perencanaan Infrastruktur Perlu Memperhatikan Kebutuhan Warga',
                'slug' => 'perencanaan-infrastruktur-kebutuhan-warga',
                'excerpt' => 'Perencanaan infrastruktur yang baik perlu mempertimbangkan aksesibilitas, keselamatan, dan manfaat bagi masyarakat.',
                'content' => 'Infrastruktur mempunyai peran penting dalam menunjang kegiatan masyarakat. Dalam merencanakan pembangunan jalan, saluran air, fasilitas umum, maupun sarana transportasi, kebutuhan warga perlu menjadi salah satu pertimbangan utama. Kajian kondisi lingkungan dan masukan masyarakat dapat membantu mengidentifikasi prioritas. Perencanaan juga perlu memperhatikan aspek keselamatan, pemeliharaan, serta pemanfaatan anggaran secara bertanggung jawab agar fasilitas yang dibangun dapat digunakan dalam jangka panjang.',
            ],
            [
                'category_slug' => 'pendidikan',
                'title' => 'Literasi Digital Membantu Pelajar Menilai Informasi',
                'slug' => 'literasi-digital-membantu-pelajar',
                'excerpt' => 'Kemampuan memeriksa sumber dan membandingkan informasi penting dalam kegiatan belajar di era digital.',
                'content' => 'Internet menyediakan banyak sumber informasi yang dapat dimanfaatkan oleh pelajar. Namun, tidak semua informasi yang beredar memiliki sumber yang jelas atau isi yang dapat dipercaya. Pelajar perlu memeriksa siapa penerbit informasi, kapan informasi diterbitkan, dan apakah isinya didukung oleh sumber lain yang kredibel. Kebiasaan ini membantu pelajar menghindari informasi keliru sekaligus menggunakan teknologi secara lebih bertanggung jawab untuk mendukung pembelajaran.',
            ],
            [
                'category_slug' => 'kesehatan',
                'title' => 'Kebiasaan Hidup Bersih Mendukung Kesehatan Keluarga',
                'slug' => 'hidup-bersih-kesehatan-keluarga',
                'excerpt' => 'Menjaga kebersihan diri dan lingkungan merupakan kebiasaan penting dalam kehidupan sehari-hari.',
                'content' => 'Kebersihan diri dan lingkungan dapat dimulai dari kebiasaan sederhana di rumah. Mencuci tangan dengan sabun pada waktu yang tepat, menjaga kebersihan tempat penyimpanan makanan, serta memastikan lingkungan tidak menjadi tempat berkembangnya hama merupakan langkah yang dapat dilakukan setiap hari. Anggota keluarga juga dapat bekerja sama membersihkan area rumah dan membuang sampah pada tempatnya. Untuk mendapatkan saran kesehatan yang sesuai dengan kondisi tertentu, masyarakat dapat berkonsultasi dengan tenaga kesehatan.',
            ],
            [
                'category_slug' => 'ekonomi',
                'title' => 'UMKM Dapat Memperluas Pasar melalui Pemasaran Digital',
                'slug' => 'umkm-pemasaran-digital',
                'excerpt' => 'Media digital dapat membantu pelaku usaha memperkenalkan produk dan berkomunikasi dengan pelanggan.',
                'content' => 'Pelaku usaha mikro, kecil, dan menengah dapat memanfaatkan media digital sebagai salah satu sarana pemasaran. Foto produk yang jelas, deskripsi yang akurat, informasi harga, dan tanggapan yang baik kepada pelanggan dapat membantu membangun kepercayaan. Pemilihan platform sebaiknya disesuaikan dengan kebutuhan usaha dan karakteristik calon pembeli. Pelaku UMKM juga perlu menjaga kualitas produk, mengelola pesanan, serta mencatat pemasukan dan pengeluaran agar kegiatan usaha dapat dievaluasi dengan baik.',
            ],
            [
                'category_slug' => 'lingkungan',
                'title' => 'Pemilahan Sampah dari Rumah Memudahkan Pengelolaan Lingkungan',
                'slug' => 'pemilahan-sampah-dari-rumah',
                'excerpt' => 'Memisahkan sampah berdasarkan jenisnya membantu proses pengumpulan dan pengolahan.',
                'content' => 'Pengelolaan sampah dapat dimulai dari rumah dengan memisahkan sampah berdasarkan jenisnya. Sampah organik, seperti sisa sayuran dan buah, dapat dikelola melalui metode pengomposan yang sesuai. Sementara itu, bahan tertentu yang dapat didaur ulang sebaiknya dipisahkan dalam keadaan bersih sesuai ketentuan tempat pengumpulan. Sampah yang tidak dapat dimanfaatkan kembali perlu ditangani sesuai prosedur yang berlaku. Kebiasaan memilah sampah akan lebih mudah diterapkan apabila seluruh anggota keluarga ikut berpartisipasi.',
            ],
            [
                'category_slug' => 'pengumuman',
                'title' => 'Cara Memeriksa Informasi Resmi dari Instansi Pemerintah',
                'slug' => 'memeriksa-informasi-resmi-pemerintah',
                'excerpt' => 'Masyarakat perlu memeriksa sumber dan tanggal publikasi sebelum mempercayai informasi pelayanan.',
                'content' => 'Informasi mengenai layanan, kebijakan, dan pengumuman pemerintah sebaiknya diperiksa melalui situs atau saluran komunikasi resmi instansi terkait. Perhatikan alamat situs, nama instansi penerbit, tanggal publikasi, serta rincian informasi yang disampaikan. Jika informasi hanya ditemukan melalui pesan berantai atau unggahan media sosial yang tidak mencantumkan sumber, jangan langsung menyebarkannya. Masyarakat dapat menghubungi instansi yang bersangkutan untuk meminta konfirmasi apabila terdapat informasi yang meragukan.',
            ],
            [
                'category_slug' => 'ekonomi',
                'title' => 'Pengembangan Keterampilan Membantu Kesiapan Memasuki Dunia Kerja',
                'slug' => 'pengembangan-keterampilan-kesiapan-kerja',
                'excerpt' => 'Keterampilan teknis dan kemampuan berkomunikasi dapat mendukung kesiapan seseorang menghadapi dunia kerja.',
                'content' => 'Persiapan memasuki dunia kerja tidak hanya berkaitan dengan pendidikan formal, tetapi juga pengembangan keterampilan yang sesuai dengan bidang pekerjaan. Kemampuan menggunakan teknologi, berkomunikasi, bekerja sama, dan menyelesaikan masalah dapat menjadi bekal yang berguna. Calon tenaga kerja dapat mengembangkan kemampuan melalui latihan, proyek, pelatihan, atau pengalaman kerja yang relevan. Selain itu, membuat portofolio dan mempelajari persyaratan lowongan membantu seseorang menyesuaikan persiapan dengan kebutuhan pekerjaan yang dituju.',
            ],
            [
                'category_slug' => 'pelayanan-publik',
                'title' => 'Pelayanan Digital Memudahkan Akses Informasi Warga',
                'slug' => 'pelayanan-digital-akses-informasi-warga',
                'excerpt' => 'Pemanfaatan teknologi dapat membantu masyarakat memperoleh informasi layanan dengan lebih praktis.',
                'content' => 'Pelayanan digital memberikan alternatif bagi masyarakat untuk memperoleh informasi tanpa harus selalu datang langsung ke kantor pelayanan. Melalui situs resmi, warga dapat mempelajari persyaratan, prosedur, jadwal, dan informasi lain yang diperlukan. Informasi yang disajikan perlu menggunakan bahasa yang jelas dan mudah dipahami. Instansi juga perlu memperbarui informasi secara berkala agar masyarakat tidak menerima petunjuk yang sudah tidak berlaku.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'pembangunan',
                'title' => 'Musyawarah Warga Membantu Menentukan Prioritas Pembangunan',
                'slug' => 'musyawarah-warga-prioritas-pembangunan',
                'excerpt' => 'Masukan masyarakat dapat membantu menentukan pembangunan yang sesuai dengan kebutuhan lingkungan.',
                'content' => 'Pembangunan lingkungan perlu mempertimbangkan kebutuhan masyarakat yang akan menggunakan fasilitas tersebut. Musyawarah warga menjadi salah satu cara untuk menyampaikan usulan, mengenali masalah, dan menentukan prioritas. Jalan rusak, saluran air, penerangan, dan fasilitas umum dapat dibahas berdasarkan tingkat kebutuhan. Proses pengambilan keputusan yang terbuka membantu masyarakat memahami alasan penentuan prioritas dan mendorong partisipasi dalam menjaga hasil pembangunan.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'pendidikan',
                'title' => 'Keamanan Akun Digital Perlu Diajarkan Sejak Dini',
                'slug' => 'keamanan-akun-digital-sejak-dini',
                'excerpt' => 'Pelajar perlu memahami cara menjaga kata sandi dan melindungi informasi pribadi saat menggunakan internet.',
                'content' => 'Penggunaan perangkat digital dalam kegiatan belajar perlu disertai pemahaman mengenai keamanan akun. Pelajar sebaiknya menggunakan kata sandi yang kuat dan berbeda untuk akun penting, mengaktifkan verifikasi tambahan jika tersedia, serta tidak membagikan kode keamanan kepada orang lain. Tautan yang mencurigakan perlu diperiksa sebelum dibuka. Sekolah dan keluarga dapat bekerja sama membangun kebiasaan digital yang aman dan bertanggung jawab.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'ekonomi',
                'title' => 'Pencatatan Keuangan Membantu UMKM Mengelola Usaha',
                'slug' => 'pencatatan-keuangan-umkm',
                'excerpt' => 'Catatan pemasukan dan pengeluaran membantu pelaku UMKM mengevaluasi kondisi usahanya.',
                'content' => 'Pelaku usaha mikro, kecil, dan menengah perlu mengetahui arus uang yang masuk dan keluar selama menjalankan usaha. Pencatatan sederhana dapat dimulai dengan memisahkan uang pribadi dan uang usaha, mencatat transaksi setiap hari, serta menyimpan bukti pembelian. Data tersebut membantu pemilik usaha menghitung biaya, memperkirakan keuntungan, dan merencanakan kebutuhan modal. Evaluasi keuangan secara rutin juga dapat membantu menentukan langkah usaha berikutnya.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'lingkungan',
                'title' => 'Penghematan Air Dapat Dimulai dari Rumah',
                'slug' => 'penghematan-air-dari-rumah',
                'excerpt' => 'Kebiasaan sederhana dalam penggunaan air membantu mengurangi pemborosan kebutuhan sehari-hari.',
                'content' => 'Air merupakan kebutuhan penting dalam kehidupan sehari-hari sehingga penggunaannya perlu diperhatikan. Keluarga dapat menghemat air dengan menutup keran ketika tidak digunakan, segera memperbaiki kebocoran, dan menggunakan air secukupnya saat membersihkan rumah. Penampungan air hujan juga dapat dimanfaatkan untuk keperluan tertentu apabila dilakukan dengan cara yang aman. Kebiasaan tersebut membantu meningkatkan kesadaran terhadap pentingnya menjaga ketersediaan air.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'kesehatan',
                'title' => 'Aktivitas Fisik Rutin Mendukung Kesehatan Tubuh',
                'slug' => 'aktivitas-fisik-rutin-kesehatan',
                'excerpt' => 'Bergerak secara teratur merupakan bagian dari kebiasaan hidup yang mendukung kesehatan.',
                'content' => 'Aktivitas fisik dapat dilakukan melalui kegiatan sederhana, seperti berjalan kaki, bersepeda, melakukan peregangan, atau berolahraga sesuai kemampuan. Kebiasaan bergerak secara teratur membantu mengurangi waktu yang dihabiskan untuk duduk terlalu lama. Masyarakat dapat memilih aktivitas yang disukai agar lebih mudah dilakukan secara konsisten. Waktu istirahat yang cukup, pola makan seimbang, dan penyesuaian aktivitas dengan kondisi tubuh juga perlu diperhatikan.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'pendidikan',
                'title' => 'Kebiasaan Membaca Membantu Meningkatkan Pengetahuan Pelajar',
                'slug' => 'kebiasaan-membaca-pengetahuan-pelajar',
                'excerpt' => 'Membaca secara rutin membantu pelajar memperoleh wawasan dan memahami informasi baru.',
                'content' => 'Kebiasaan membaca memberikan kesempatan kepada pelajar untuk mengenal pengetahuan dari berbagai bidang. Kegiatan ini dapat dimulai dengan menyediakan waktu khusus setiap hari dan memilih bacaan sesuai minat. Setelah membaca, pelajar dapat mencatat gagasan utama atau mendiskusikan isi bacaan untuk memperkuat pemahaman. Perpustakaan sekolah, perpustakaan umum, dan sumber digital yang tepercaya dapat menjadi tempat memperoleh bahan bacaan.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'pemerintahan',
                'title' => 'Partisipasi Masyarakat Mendukung Pembangunan Daerah',
                'slug' => 'partisipasi-masyarakat-pembangunan-daerah',
                'excerpt' => 'Keterlibatan warga membantu menyampaikan kebutuhan dan mengevaluasi program pembangunan.',
                'content' => 'Masyarakat dapat berpartisipasi dalam pembangunan daerah melalui berbagai cara, mulai dari menyampaikan usulan dalam forum warga hingga mengikuti konsultasi publik. Masukan yang disertai penjelasan masalah dan kebutuhan dapat membantu pihak terkait memahami kondisi di lapangan. Warga juga dapat memantau informasi program melalui saluran resmi dan memberikan tanggapan secara tertib. Kerja sama yang baik antara pemerintah dan masyarakat mendukung pelaksanaan program yang lebih sesuai kebutuhan.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'pelayanan-publik',
                'title' => 'Pengaduan Pelayanan Perlu Disampaikan dengan Informasi Jelas',
                'slug' => 'pengaduan-pelayanan-informasi-jelas',
                'excerpt' => 'Informasi yang lengkap membantu petugas memahami dan menindaklanjuti pengaduan masyarakat.',
                'content' => 'Ketika mengalami kendala dalam memperoleh pelayanan, masyarakat dapat menggunakan saluran pengaduan resmi yang tersedia. Pengaduan sebaiknya memuat penjelasan masalah, waktu kejadian, jenis layanan, serta bukti pendukung yang relevan jika tersedia. Pelapor perlu menyampaikan informasi secara jelas dan tidak menyebarkan data pribadi yang tidak diperlukan. Nomor laporan atau bukti penerimaan sebaiknya disimpan agar perkembangan penanganan dapat diperiksa kembali.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'ekonomi',
                'title' => 'Kemasan Produk Membantu Meningkatkan Daya Tarik UMKM',
                'slug' => 'kemasan-produk-daya-tarik-umkm',
                'excerpt' => 'Kemasan yang sesuai dapat membantu melindungi produk sekaligus menyampaikan informasi kepada pembeli.',
                'content' => 'Kemasan merupakan salah satu unsur yang dapat diperhatikan pelaku UMKM ketika memasarkan produk. Selain menarik perhatian, kemasan perlu sesuai dengan jenis produk dan mampu melindunginya selama penyimpanan atau pengiriman. Informasi seperti nama produk, identitas usaha, petunjuk penggunaan, dan keterangan lain yang diwajibkan perlu dicantumkan sesuai ketentuan. Pelaku usaha juga perlu mempertimbangkan biaya kemasan agar tetap sesuai dengan harga jual dan kemampuan usaha.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'lingkungan',
                'title' => 'Menanam Pohon Membantu Menjaga Lingkungan Permukiman',
                'slug' => 'menanam-pohon-lingkungan-permukiman',
                'excerpt' => 'Penanaman dan perawatan tanaman dapat mendukung lingkungan yang lebih nyaman.',
                'content' => 'Tanaman dapat memberikan manfaat bagi lingkungan permukiman apabila dipilih dan dirawat dengan tepat. Pohon yang sesuai dengan kondisi lahan dapat memberikan keteduhan, sedangkan tanaman lain bisa memperindah halaman dan ruang terbuka. Sebelum menanam, masyarakat perlu mempertimbangkan ukuran tanaman ketika tumbuh, kebutuhan air, serta jaraknya dari bangunan dan saluran. Perawatan berkala diperlukan agar tanaman tetap sehat dan tidak mengganggu fasilitas di sekitarnya.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'pengumuman',
                'title' => 'Masyarakat Perlu Memeriksa Informasi Lowongan Kerja',
                'slug' => 'memeriksa-informasi-lowongan-kerja',
                'excerpt' => 'Pemeriksaan identitas perusahaan dan persyaratan membantu pencari kerja mengenali lowongan yang meragukan.',
                'content' => 'Pencari kerja sebaiknya memeriksa informasi lowongan sebelum mengirimkan dokumen pribadi atau mengikuti proses seleksi. Nama perusahaan, alamat, uraian pekerjaan, persyaratan, dan saluran komunikasi perlu diteliti melalui sumber yang dapat dipercaya. Masyarakat perlu waspada apabila pihak yang menawarkan pekerjaan meminta pembayaran yang tidak jelas atau data sensitif secara tidak wajar. Jika menemukan informasi mencurigakan, pencari kerja dapat meminta konfirmasi melalui kontak resmi perusahaan.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'pembangunan',
                'title' => 'Fasilitas Pejalan Kaki Mendukung Keselamatan di Jalan',
                'slug' => 'fasilitas-pejalan-kaki-keselamatan-jalan',
                'excerpt' => 'Trotoar dan penyeberangan yang terawat membantu warga bergerak dengan lebih aman.',
                'content' => 'Fasilitas pejalan kaki merupakan bagian penting dari lingkungan jalan yang aman dan mudah diakses. Trotoar yang tidak terhalang, penyeberangan yang terlihat jelas, serta penerangan yang memadai dapat mendukung perjalanan warga. Perencanaan fasilitas juga perlu memperhatikan anak-anak, lansia, dan penyandang disabilitas. Masyarakat dapat membantu menjaga fasilitas tetap berfungsi dengan menggunakan ruang pejalan kaki sebagaimana mestinya dan melaporkan kerusakan melalui saluran yang tersedia.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'pendidikan',
                'title' => 'Kerja Sama Orang Tua dan Sekolah Mendukung Perkembangan Siswa',
                'slug' => 'kerja-sama-orang-tua-sekolah',
                'excerpt' => 'Komunikasi yang baik antara keluarga dan sekolah membantu memantau kebutuhan belajar siswa.',
                'content' => 'Perkembangan siswa dipengaruhi oleh pengalaman belajar di sekolah dan dukungan di rumah. Orang tua dapat berkomunikasi dengan guru untuk mengetahui kemajuan belajar, kebiasaan yang perlu diperbaiki, dan dukungan yang dibutuhkan anak. Di rumah, keluarga dapat menyediakan waktu belajar yang teratur serta memberikan ruang bagi anak untuk bertanya. Kerja sama yang positif membantu menyelaraskan pendampingan dan membangun lingkungan belajar yang mendukung.',
                'is_featured' => false,
            ],
            [
                'category_slug' => 'pemerintahan',
                'title' => 'Data yang Akurat Membantu Peningkatan Pelayanan Publik',
                'slug' => 'data-akurat-peningkatan-pelayanan-publik',
                'excerpt' => 'Pengelolaan data yang baik mendukung perencanaan layanan dan pengambilan keputusan.',
                'content' => 'Data yang akurat membantu instansi memahami kebutuhan masyarakat dan mengevaluasi pelaksanaan layanan. Informasi perlu dicatat secara konsisten, diperiksa kebenarannya, dan diperbarui ketika terjadi perubahan. Penggunaan data juga harus memperhatikan keamanan serta perlindungan informasi pribadi. Dengan pengelolaan yang tertib, data dapat menjadi dasar dalam menentukan prioritas, mengidentifikasi kendala, dan memperbaiki kualitas pelayanan kepada masyarakat.',
                'is_featured' => false,
            ],
        ];

        foreach ($articles as $item) {
            $category = Category::where(
                'slug',
                $item['category_slug']
            )->firstOrFail();

            Article::firstOrCreate(
                ['slug' => $item['slug']],
                [
                    'category_id' => $category->id,
                    'user_id' => null,
                    'title' => $item['title'],
                    'excerpt' => $item['excerpt'],
                    'content' => $item['content'],
                    'image' => null,
                    'status' => 'published',
                    'is_featured' => false,
                    'published_at' => now(),
                ]
            );
        }
    }
}
