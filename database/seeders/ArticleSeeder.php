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
        ];

        foreach ($articles as $item) {
            $category = Category::where(
                'slug',
                $item['category_slug']
            )->firstOrFail();

            Article::updateOrCreate(
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