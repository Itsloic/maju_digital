<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::table('artikel')->count() > 0) {
            $this->command->info('Artikel sudah ada, seeder dihentikan.');

            return;
        }

        $kategoriId = DB::table('categories')->pluck('id', 'name');
        $penulisId = DB::table('users')->pluck('id', 'name');

        // Validasi lookup
        $requiredKategori = ['Pemerintahan', 'Pendidikan', 'Pelayanan Publik', 'Kesehatan', 'Infrastruktur'];
        $requiredPenulis = [
            'Rina Wulandari', 'Dedi Hartono', 'Siti Marlina', 'Maya Anggraini',
            'Wahyu Nugroho', 'Agus Prasetyo', 'Dewi Kartika', 'Hendra Gunawan',
            'Eko Susilo', 'Bambang Setiawan',
        ];

        foreach ($requiredKategori as $k) {
            if (! isset($kategoriId[$k])) {
                throw new \Exception("Kategori '$k' tidak ditemukan di tabel categories");
            }
        }
        foreach ($requiredPenulis as $p) {
            if (! isset($penulisId[$p])) {
                throw new \Exception("Penulis '$p' tidak ditemukan di tabel users");
            }
        }

        // 25 artikel (5 per kategori). Distribusi penulis akhir:
        // Rina Wulandari: 4, Dedi Hartono: 4, Siti Marlina: 4, Maya Anggraini: 1,
        // Wahyu Nugroho: 2, Agus Prasetyo: 1, Dewi Kartika: 3, Hendra Gunawan: 2,
        // Eko Susilo: 3, Bambang Setiawan: 1
        // Catatan: Artikel "Pendaftaran Beasiswa..." dipindah dari Maya Anggraini ke Bambang Setiawan
        // agar semua 10 user punya minimal 1 artikel.
        $data = [
            // Pemerintahan (5)
            ['Pemerintahan', 'Transparansi Informasi Publik Mendukung Kepercayaan Masyarakat', 'transparansi-informasi-publik-mendukung-kepercayaan-masyarakat', 'Keterbukaan informasi membantu masyarakat memahami program dan pelayanan pemerintah.', 'Pemerintah Kabupaten Maju Digital terus memperkuat keterbukaan informasi publik. Seluruh program, anggaran, dan hasil kegiatan perangkat daerah kini dipublikasikan melalui portal resmi sehingga dapat dibaca oleh masyarakat kapan saja.\n\nMenurut Kepala Dinas Komunikasi dan Informatika, Hendra Gunawan, keterbukaan ini bertujuan agar warga bisa ikut mengawasi jalannya pembangunan. Warga yang membutuhkan data tambahan dapat mengajukan permohonan informasi melalui loket layanan atau situs majudigital.go.id.', 'Rina Wulandari', '2026-10-17 08:00:00'],
            ['Pemerintahan', 'Musyawarah Perencanaan Pembangunan Tahun 2027 Digelar di Kecamatan', 'musyawarah-perencanaan-pembangunan-2027-digelar-di-kecamatan', 'Warga dan perangkat desa menyampaikan usulan program pembangunan untuk tahun anggaran 2027.', 'Musyawarah Perencanaan Pembangunan (Musrenbang) tingkat kecamatan untuk tahun 2027 digelar di Aula Kecamatan Sukamaju. Kegiatan ini dihadiri kepala desa, tokoh masyarakat, perwakilan pemuda, dan perangkat daerah terkait.\n\nDalam kegiatan tersebut, peserta menyampaikan sejumlah usulan, antara lain perbaikan jalan desa, penambahan fasilitas kesehatan, dan bantuan sarana belajar. Seluruh usulan akan dibahas lebih lanjut pada musyawarah tingkat kabupaten sebelum ditetapkan dalam rencana kerja tahun depan.', 'Dedi Hartono', '2026-09-22 09:30:00'],
            ['Pemerintahan', 'Bupati Lantik Pejabat Baru di Lingkungan Sekretariat Daerah', 'bupati-lantik-pejabat-baru-di-lingkungan-sekretariat-daerah', 'Pelantikan dilakukan untuk mengisi jabatan yang kosong agar pelayanan kepada masyarakat tetap berjalan lancar.', 'Bupati Maju Digital melantik sejumlah pejabat baru di lingkungan Sekretariat Daerah dalam acara yang berlangsung di Pendopo Kabupaten. Pejabat yang dilantik mengisi posisi yang kosong akibat pensiun dan mutasi.\n\nDalam sambutannya, Bupati meminta para pejabat baru segera menyesuaikan diri dan mengutamakan pelayanan kepada masyarakat. Ia juga menekankan pentingnya kerja sama antarperangkat daerah agar program pemerintah berjalan tepat waktu.', 'Siti Marlina', '2026-08-14 10:15:00'],
            ['Pemerintahan', 'Laporan Keuangan Daerah Tahun 2025 Raih Opini Wajar', 'laporan-keuangan-daerah-2025-raih-opini-wajar', 'Pemerintah Kabupaten Maju Digital memperoleh opini wajar atas laporan keuangan daerah tahun anggaran 2025.', 'Laporan keuangan Pemerintah Kabupaten Maju Digital tahun anggaran 2025 memperoleh opini wajar dari tim pemeriksa. Opini ini menunjukkan bahwa laporan keuangan disusun sesuai aturan dan disajikan secara jelas.\n\nKepala Badan Pengelola Keuangan Daerah, Agus Prasetyo, menyampaikan bahwa capaian ini menjadi dorongan untuk terus tertib dalam mengelola anggaran. Pemerintah daerah akan menindaklanjuti catatan dari tim pemeriksa agar pengelolaan keuangan tahun berikutnya lebih baik.', 'Agus Prasetyo', '2026-07-08 13:00:00'],
            ['Pemerintahan', 'Pemerintah Kabupaten Buka Kanal Aduan Warga secara Online', 'pemerintah-kabupaten-buka-kanal-aduan-warga-secara-online', 'Warga kini dapat menyampaikan keluhan dan saran melalui kanal aduan online tanpa harus datang ke kantor.', 'Pemerintah Kabupaten Maju Digital membuka kanal aduan warga secara online melalui portal resmi. Dengan layanan ini, warga dapat menyampaikan keluhan, saran, atau laporan tentang pelayanan publik tanpa harus datang ke kantor.\n\nSetiap aduan yang masuk akan dicatat dan diteruskan ke perangkat daerah yang berwenang. Pelapor dapat memantau perkembangan aduannya, dan pemerintah menargetkan aduan ditanggapi paling lambat lima hari kerja.', 'Rina Wulandari', '2026-06-18 08:45:00'],

            // Pendidikan (5)
            ['Pendidikan', 'Informasi Pendidikan untuk Masyarakat', 'informasi-pendidikan-untuk-masyarakat', 'Panduan bagi masyarakat untuk memperoleh informasi pendidikan dan mendukung proses belajar.', 'Dinas Pendidikan Kabupaten Maju Digital menyediakan panduan informasi pendidikan bagi masyarakat. Panduan ini memuat jadwal penerimaan siswa baru, persyaratan pendaftaran, daftar sekolah negeri, serta informasi bantuan pendidikan yang dapat diakses orang tua dan pelajar.\n\nKepala Dinas Pendidikan, Bambang Setiawan, mengatakan informasi yang jelas akan membantu orang tua mengambil keputusan dengan tepat. Warga yang masih bingung dapat bertanya langsung di kantor dinas atau melalui kontak resmi yang tersedia di portal majudigital.go.id.', 'Maya Anggraini', '2026-10-17 08:00:00'],
            ['Pendidikan', 'Pendaftaran Beasiswa Pelajar Berprestasi Resmi Dibuka', 'pendaftaran-beasiswa-pelajar-berprestasi-resmi-dibuka', 'Pemerintah kabupaten membuka beasiswa bagi pelajar berprestasi dari keluarga kurang mampu.', 'Pemerintah Kabupaten Maju Digital resmi membuka pendaftaran beasiswa bagi pelajar berprestasi tingkat SMP dan SMA. Beasiswa ini ditujukan bagi siswa yang berprestasi namun berasal dari keluarga kurang mampu.\n\nPendaftar harus melampirkan rapor, surat keterangan tidak mampu dari desa, dan fotokopi kartu keluarga. Pendaftaran dilakukan di sekolah masing-masing dan ditutup pada akhir bulan ini. Hasil seleksi akan diumumkan melalui portal resmi pemerintah kabupaten.', 'Bambang Setiawan', '2026-09-29 09:00:00'], // Dipindah dari Maya Anggraini ke Bambang Setiawan
            ['Pendidikan', 'Renovasi Ruang Kelas di 12 Sekolah Dasar Mulai Dikerjakan', 'renovasi-ruang-kelas-di-12-sekolah-dasar-mulai-dikerjakan', 'Dua belas sekolah dasar menerima perbaikan ruang kelas yang rusak agar kegiatan belajar lebih nyaman.', 'Pemerintah Kabupaten Maju Digital mulai merenovasi ruang kelas di 12 sekolah dasar yang tersebar di beberapa kecamatan. Perbaikan meliputi atap, lantai, dinding, dan pintu yang rusak.\n\nMenurut Dinas Pendidikan, pekerjaan ditargetkan selesai sebelum semester genap dimulai. Selama renovasi, kegiatan belajar tetap berjalan dengan memanfaatkan ruangan lain yang masih layak digunakan.', 'Dedi Hartono', '2026-08-25 10:30:00'],
            ['Pendidikan', 'Pelatihan Guru Penggunaan Teknologi dalam Pembelajaran', 'pelatihan-guru-penggunaan-teknologi-dalam-pembelajaran', 'Puluhan guru mengikuti pelatihan penggunaan teknologi untuk menunjang kegiatan belajar mengajar di kelas.', 'Sebanyak 60 guru dari berbagai sekolah di Kabupaten Maju Digital mengikuti pelatihan penggunaan teknologi dalam pembelajaran. Pelatihan berlangsung selama tiga hari dan mencakup cara membuat materi digital, memakai aplikasi kelas daring, dan mengelola nilai siswa.\n\nPara peserta diharapkan dapat menerapkan hasil pelatihan di sekolah masing-masing dan membagikan ilmunya kepada rekan guru yang belum mengikuti kegiatan ini.', 'Siti Marlina', '2026-07-21 13:30:00'],
            ['Pendidikan', 'Perpustakaan Keliling Menjangkau Sekolah di Desa Terpencil', 'perpustakaan-keliling-menjangkau-sekolah-di-desa-terpencil', 'Mobil perpustakaan keliling membawa ribuan buku ke sekolah-sekolah yang jauh dari pusat kota.', 'Dinas Perpustakaan dan Kearsipan mengoperasikan perpustakaan keliling untuk menjangkau sekolah di desa-desa terpencil. Mobil ini membawa lebih dari 2.000 buku, mulai dari buku cerita anak hingga buku pengetahuan umum.\n\nPerpustakaan keliling berkunjung ke setiap desa sesuai jadwal mingguan. Siswa dapat membaca di tempat maupun meminjam buku untuk dibawa pulang selama dua minggu.', 'Rina Wulandari', '2026-06-30 08:15:00'],

            // Pelayanan Publik (5)
            ['Pelayanan Publik', 'Panduan Menyiapkan Dokumen untuk Layanan Administrasi', 'panduan-menyiapkan-dokumen-untuk-layanan-administrasi', 'Persiapan dokumen membantu masyarakat menjalani proses administrasi dengan lebih tertib.', 'Pemerintah Kabupaten Maju Digital mengimbau masyarakat menyiapkan dokumen sebelum mengurus layanan administrasi. Dokumen yang paling sering dibutuhkan antara lain kartu tanda penduduk, kartu keluarga, dan surat pengantar dari RT atau desa.\n\nKepala Bagian Pelayanan, Wahyu Nugroho, menjelaskan bahwa dokumen yang lengkap membuat proses lebih cepat dan mengurangi risiko berkas dikembalikan. Daftar persyaratan setiap layanan dapat dilihat di loket pelayanan atau di portal majudigital.go.id.', 'Wahyu Nugroho', '2026-10-17 08:00:00'],
            ['Pelayanan Publik', 'Layanan Perizinan Usaha Kini Bisa Diurus Online', 'layanan-perizinan-usaha-kini-bisa-diurus-online', 'Pelaku usaha dapat mengajukan izin usaha melalui portal tanpa harus datang ke kantor pelayanan.', 'Dinas Penanaman Modal dan Pelayanan Terpadu membuka layanan perizinan usaha secara online. Pelaku usaha kecil maupun menengah kini dapat mengajukan izin melalui portal resmi dengan mengunggah dokumen yang dibutuhkan.\n\nSetelah berkas diperiksa, pemohon akan menerima pemberitahuan melalui email. Bagi pemohon yang belum terbiasa memakai komputer, petugas di loket pelayanan siap membantu proses pendaftaran.', 'Dedi Hartono', '2026-09-26 09:15:00'],
            ['Pelayanan Publik', 'Pelayanan Administrasi Kependudukan Buka Hingga Sore Hari', 'pelayanan-administrasi-kependudukan-buka-hingga-sore-hari', 'Jam layanan kependudukan diperpanjang agar warga yang bekerja tetap bisa mengurus dokumen.', 'Dinas Kependudukan dan Pencatatan Sipil memperpanjang jam pelayanan administrasi kependudukan hingga pukul 16.00 pada hari kerja. Kebijakan ini dibuat agar warga yang bekerja pada pagi hari tetap bisa mengurus dokumen.\n\nLayanan yang tersedia meliputi pembuatan kartu keluarga, perubahan data penduduk, dan pengurusan surat pindah. Warga disarankan membawa dokumen asli beserta fotokopinya.', 'Siti Marlina', '2026-08-19 10:00:00'],
            ['Pelayanan Publik', 'Cara Mengurus Akta Kelahiran Tanpa Antre Lama', 'cara-mengurus-akta-kelahiran-tanpa-antre-lama', 'Orang tua dapat mendaftar lebih dulu secara online agar pengurusan akta kelahiran tidak memakan waktu lama.', 'Orang tua yang ingin mengurus akta kelahiran anak kini dapat mendaftar lebih dulu melalui portal resmi untuk mendapatkan jadwal kunjungan. Dengan cara ini, warga tidak perlu menunggu lama di kantor.\n\nDokumen yang perlu dibawa adalah surat keterangan lahir dari bidan atau rumah sakit, kartu keluarga, serta kartu tanda penduduk kedua orang tua. Akta kelahiran biasanya selesai dalam beberapa hari kerja.', 'Rina Wulandari', '2026-07-28 13:45:00'],
            ['Pelayanan Publik', 'Loket Layanan Terpadu Tersedia di Setiap Kecamatan', 'loket-layanan-terpadu-tersedia-di-setiap-kecamatan', 'Warga dapat mengurus berbagai layanan di satu tempat tanpa harus datang ke pusat kabupaten.', 'Pemerintah Kabupaten Maju Digital menyediakan loket layanan terpadu di setiap kecamatan. Warga dapat mengurus berbagai keperluan, seperti administrasi kependudukan dan surat keterangan, di satu tempat.\n\nDengan adanya loket ini, warga di daerah yang jauh tidak perlu lagi menempuh perjalanan ke pusat kabupaten. Petugas loket juga memberikan informasi tentang syarat dan alur setiap layanan.', 'Wahyu Nugroho', '2026-06-24 08:30:00'],

            // Kesehatan (5)
            ['Kesehatan', 'Posyandu Balita Digelar Serentak di Seluruh Kecamatan', 'posyandu-balita-digelar-serentak-di-seluruh-kecamatan', 'Posyandu serentak memantau berat badan dan tumbuh kembang balita di seluruh kecamatan.', 'Dinas Kesehatan Kabupaten Maju Digital menggelar kegiatan posyandu balita secara serentak di seluruh kecamatan. Dalam kegiatan ini, petugas menimbang berat badan, mengukur tinggi badan, dan memantau tumbuh kembang balita.\n\nOrang tua juga mendapat penyuluhan tentang gizi seimbang dan pemberian makanan tambahan bagi balita yang membutuhkan. Warga diimbau membawa buku kesehatan anak agar hasil pemeriksaan dapat dicatat.', 'Dewi Kartika', '2026-10-10 08:00:00'],
            ['Kesehatan', 'Imunisasi Lanjutan untuk Anak Sekolah Mulai Dilaksanakan', 'imunisasi-lanjutan-untuk-anak-sekolah-mulai-dilaksanakan', 'Petugas puskesmas memberikan imunisasi lanjutan kepada siswa sekolah dasar secara bertahap.', 'Dinas Kesehatan mulai melaksanakan imunisasi lanjutan bagi siswa sekolah dasar di Kabupaten Maju Digital. Kegiatan dilakukan di sekolah masing-masing oleh petugas puskesmas secara bertahap.\n\nSebelum pelaksanaan, pihak sekolah menyampaikan informasi kepada orang tua agar anak sarapan terlebih dahulu dan dalam kondisi sehat. Imunisasi ini bertujuan melindungi anak dari penyakit yang dapat dicegah.', 'Dewi Kartika', '2026-09-15 09:30:00'],
            ['Kesehatan', 'Puskesmas Tambah Jam Layanan untuk Ibu Hamil', 'puskesmas-tambah-jam-layanan-untuk-ibu-hamil', 'Puskesmas memperpanjang jam pemeriksaan kehamilan agar ibu hamil lebih mudah mendapat layanan.', 'Sejumlah puskesmas di Kabupaten Maju Digital menambah jam layanan pemeriksaan bagi ibu hamil. Pemeriksaan kini tersedia hingga sore hari agar ibu hamil yang memiliki kegiatan pada pagi hari tetap dapat berkunjung.\n\nLayanan meliputi pemeriksaan tekanan darah, pemantauan berat badan, dan konsultasi dengan bidan. Ibu hamil dianjurkan memeriksakan diri secara rutin untuk menjaga kesehatan ibu dan janin.', 'Hendra Gunawan', '2026-08-12 10:00:00'],
            ['Kesehatan', 'Pemeriksaan Kesehatan Gratis untuk Lansia di Balai Desa', 'pemeriksaan-kesehatan-gratis-untuk-lansia-di-balai-desa', 'Lansia dapat memeriksakan tekanan darah dan gula darah tanpa biaya di balai desa terdekat.', 'Pemerintah Kabupaten Maju Digital menyelenggarakan pemeriksaan kesehatan gratis bagi warga lanjut usia di balai desa. Pemeriksaan mencakup tekanan darah, kadar gula darah, dan konsultasi dengan tenaga kesehatan.\n\nWarga lansia cukup membawa kartu tanda penduduk. Bagi yang kesulitan datang, keluarga dapat menghubungi kader desa agar dibantu pengaturan jadwal dan transportasi.', 'Hendra Gunawan', '2026-07-17 13:00:00'],
            ['Kesehatan', 'Kampanye Cuci Tangan dan Hidup Bersih Menyasar Sekolah', 'kampanye-cuci-tangan-dan-hidup-bersih-menyasar-sekolah', 'Siswa diajak membiasakan cuci tangan dan menjaga kebersihan lingkungan sekolah.', 'Dinas Kesehatan bersama sekolah-sekolah menggelar kampanye cuci tangan pakai sabun dan perilaku hidup bersih. Petugas mengajarkan langkah cuci tangan yang benar kepada siswa melalui peragaan dan permainan.\n\nSekolah juga diminta menyediakan sabun dan air mengalir di dekat toilet dan ruang kelas. Dengan kebiasaan ini, siswa diharapkan lebih terlindungi dari penyakit menular.', 'Dewi Kartika', '2026-06-20 08:45:00'],

            // Infrastruktur (5)
            ['Infrastruktur', 'Pembangunan Jembatan Penghubung Dua Desa Dimulai', 'pembangunan-jembatan-penghubung-dua-desa-dimulai', 'Jembatan baru akan memudahkan warga dua desa menuju pasar, sekolah, dan puskesmas.', 'Pemerintah Kabupaten Maju Digital memulai pembangunan jembatan yang menghubungkan Desa Sukamaju dan Desa Karangsari. Selama ini warga harus memutar cukup jauh karena sungai di antara kedua desa belum memiliki jembatan yang layak.\n\nKepala Dinas Pekerjaan Umum, Eko Susilo, mengatakan pembangunan ditargetkan selesai dalam enam bulan. Jembatan ini diharapkan memudahkan warga menuju pasar, sekolah, dan puskesmas.', 'Eko Susilo', '2026-10-05 08:00:00'],
            ['Infrastruktur', 'Perbaikan Jalan Kabupaten Ruas Utara Ditargetkan Rampung Akhir Tahun', 'perbaikan-jalan-kabupaten-ruas-utara-ditargetkan-rampung-akhir-tahun', 'Perbaikan jalan rusak di ruas utara dilakukan bertahap agar arus kendaraan tetap berjalan.', 'Dinas Pekerjaan Umum mulai memperbaiki jalan kabupaten ruas utara yang mengalami kerusakan berupa lubang dan retakan. Pekerjaan dilakukan bertahap agar arus kendaraan tetap dapat berjalan.\n\nPengendara diimbau berhati-hati dan mengikuti petunjuk petugas di lokasi. Perbaikan ditargetkan selesai sebelum akhir tahun.', 'Eko Susilo', '2026-09-08 09:00:00'],
            ['Infrastruktur', 'Saluran Irigasi Baru Dibangun untuk Lahan Sawah Warga', 'saluran-irigasi-baru-dibangun-untuk-lahan-sawah-warga', 'Saluran irigasi baru membantu petani mengairi sawah, terutama saat musim kemarau.', 'Pemerintah Kabupaten Maju Digital membangun saluran irigasi baru sepanjang dua kilometer untuk mengairi lahan sawah warga. Saluran ini dibuat agar petani tetap memperoleh air, terutama pada musim kemarau.\n\nKelompok tani setempat dilibatkan dalam pengawasan pekerjaan dan akan bertanggung jawab merawat saluran setelah selesai dibangun.', 'Dedi Hartono', '2026-08-05 10:30:00'],
            ['Infrastruktur', 'Lampu Penerangan Jalan Dipasang di Permukiman Padat', 'lampu-penerangan-jalan-dipasang-di-permukiman-padat', 'Penambahan lampu jalan membuat lingkungan permukiman lebih terang dan aman pada malam hari.', 'Dinas Perhubungan memasang lampu penerangan jalan di sejumlah permukiman padat yang sebelumnya gelap pada malam hari. Penambahan lampu ini diharapkan membuat warga lebih aman saat beraktivitas.\n\nWarga dapat melaporkan lampu yang rusak atau mati melalui kanal aduan online di portal majudigital.go.id agar segera diperbaiki petugas.', 'Siti Marlina', '2026-07-10 13:15:00'],
            ['Infrastruktur', 'Normalisasi Sungai Dilakukan untuk Mengurangi Risiko Banjir', 'normalisasi-sungai-dilakukan-untuk-mengurangi-risiko-banjir', 'Pengerukan dan pelebaran sungai dilakukan agar aliran air lancar saat musim hujan.', 'Pemerintah Kabupaten Maju Digital melakukan normalisasi sungai dengan mengeruk endapan lumpur dan merapikan tepian sungai. Langkah ini dilakukan menjelang musim hujan untuk mengurangi risiko banjir.\n\nWarga sekitar diimbau tidak membuang sampah ke sungai agar aliran air tetap lancar dan hasil pengerukan dapat bertahan lebih lama.', 'Eko Susilo', '2026-06-15 08:30:00'],
        ];

        foreach ($data as $item) {
            DB::table('artikel')->insert([
                'kategori' => $item[0],          // kolom teks legacy
                'judul' => $item[1],
                'slug' => $item[2],
                'ringkasan' => $item[3],
                'isi' => $item[4],
                'penulis' => $item[5],          // kolom teks legacy
                'tanggal_publikasi' => $item[6],
                'kategori_id' => $kategoriId[$item[0]],
                'penulis_id' => $penulisId[$item[5]],
                'gambar' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
