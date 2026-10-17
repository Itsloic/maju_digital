<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maju Digital — Portal Informasi Publik</title>
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
</head>
<body>

    <div class="topbar">
        PORTAL RESMI INSTANSI MAJU DIGITAL
    </div>

    <header class="header">
        <a href="/" class="brand">
            <span class="brand-mark">MD</span>
            <span>
                <strong>MAJU DIGITAL</strong>
                <small>Informasi • Pelayanan • Transparansi</small>
            </span>
        </a>

        <nav>
            <a href="#beranda">Beranda</a>
            <a href="#berita">Berita</a>
            <a href="#profil">Profil Instansi</a>
            <a href="#dokumen">Dokumen Publik</a>
            <a href="#aduan">Aduan Rakyat</a>
        </nav>
    </header>

    <main class="container" id="beranda">
        <div class="section-label">
            <span class="dot"></span>
            INFORMASI TERKINI
        </div>

        <div class="main-grid">
            <section class="featured">
                <div class="featured-content">
                    <span class="category">PELAYANAN PUBLIK</span>
                    <h1>Membangun Pelayanan Publik yang Modern dan Terintegrasi</h1>
                    <p>
                        Informasi mengenai program, kebijakan, dan perkembangan
                        pelayanan untuk masyarakat.
                    </p>
                    <a class="read-button" href="#berita">
                        Baca Berita <span>→</span>
                    </a>
                </div>
            </section>

            <aside class="popular">
                <div class="section-heading">
                    <h2>Berita Populer</h2>
                    <span>01 — 05</span>
                </div>

                <a href="#berita" class="popular-item">
                    <span class="number">01</span>
                    <span>Informasi Program Pelayanan Masyarakat</span>
                </a>

                <a href="#berita" class="popular-item">
                    <span class="number">02</span>
                    <span>Transparansi Informasi dan Dokumen Publik</span>
                </a>

                <a href="#berita" class="popular-item">
                    <span class="number">03</span>
                    <span>Pengembangan Layanan Digital Terpadu</span>
                </a>

                <a href="#berita" class="popular-item">
                    <span class="number">04</span>
                    <span>Informasi Kegiatan dan Agenda Instansi</span>
                </a>

                <a href="#berita" class="popular-item">
                    <span class="number">05</span>
                    <span>Kanal Pengaduan dan Aspirasi Masyarakat</span>
                </a>
            </aside>
        </div>

        <section class="news-section" id="berita">
            <div class="section-heading">
                <div>
                    <span class="eyebrow">KABAR TERBARU</span>
                    <h2>Berita Terkini</h2>
                </div>
                <a href="#berita" class="more-link">Lihat semua →</a>
            </div>

            <div class="news-grid">
                <article class="news-card">
                    <div class="news-image image-one"></div>
                    <div class="news-body">
                        <span class="category-text">Pelayanan Publik</span>
                        <h3>Informasi Pelayanan untuk Masyarakat</h3>
                        <p>Contoh konten berita untuk pengembangan portal Maju Digital.</p>
                        <span class="date">14 Oktober 2026 · 3 menit baca</span>
                    </div>
                </article>

                <article class="news-card">
                    <div class="news-image image-two"></div>
                    <div class="news-body">
                        <span class="category-text">Informasi Instansi</span>
                        <h3>Mendorong Keterbukaan Informasi Publik</h3>
                        <p>Contoh konten berita yang nantinya diambil dari database.</p>
                        <span class="date">13 Oktober 2026 · 4 menit baca</span>
                    </div>
                </article>

                <article class="news-card">
                    <div class="news-image image-three"></div>
                    <div class="news-body">
                        <span class="category-text">Transformasi Digital</span>
                        <h3>Pengembangan Pelayanan Berbasis Digital</h3>
                        <p>Contoh konten untuk menguji tata letak halaman berita.</p>
                        <span class="date">12 Oktober 2026 · 3 menit baca</span>
                    </div>
                </article>
            </div>
        </section>

        <section class="service-section" id="aduan">
            <div>
                <span class="eyebrow">SUARA MASYARAKAT</span>
                <h2>Aduan Rakyat Maju Digital</h2>
                <p>Sampaikan laporan dan pantau perkembangan penanganannya melalui satu portal.</p>
            </div>
            <a href="#aduan" class="read-button">Masuk ke Aduan →</a>
        </section>

        <footer id="profil">
            <strong>MAJU DIGITAL</strong>
            <p>Portal informasi dan pelayanan publik.</p>
            <span id="dokumen">© 2026 Maju Digital. Seluruh hak cipta dilindungi.</span>
        </footer>
    </main>

</body>
</html>