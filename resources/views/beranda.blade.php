
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal berita, informasi, dan pelayanan publik Maju Digital.">
    <title>Maju Digital | Portal Informasi Publik</title>
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
</head>
<body>

    <!-- BAR INFORMASI -->
    <div class="topbar">
        <div class="container topbar-inner">
            <span>PORTAL INFORMASI DAN PELAYANAN PUBLIK</span>
            <div class="topbar-links">
                <a href="#dokumen">Informasi Publik</a>
                <a href="#kontak">Hubungi Kami</a>
            </div>
        </div>
    </div>

    <!-- IDENTITAS INSTANSI -->
    <header class="masthead">
        <div class="container masthead-inner">
            <a href="/" class="brand">
                <span class="brand-logo">MD</span>
                <span class="brand-text">
                    <span class="brand-eyebrow">PORTAL RESMI INSTANSI</span>
                    <strong>MAJU DIGITAL</strong>
                    <span class="brand-subtitle">
                        Informasi Terbuka, Pelayanan Terpercaya
                    </span>
                </span>
            </a>

            <div class="masthead-note">
                <span class="gold-line"></span>
                <span>Melayani dengan informasi.<br>Bergerak melalui inovasi.</span>
            </div>
        </div>
    </header>

    <!-- NAVIGASI DAN DROPDOWN -->
    <nav class="main-nav" aria-label="Navigasi utama">
        <div class="nav-inner">

            <div class="nav-item">
                <a href="#beranda" class="nav-link">
                    Beranda <span class="nav-arrow">⌄</span>
                </a>
                <div class="dropdown-panel">
                    <div class="dropdown-inner">
                        <div class="dropdown-column">
                            <a href="#beranda">Halaman Utama</a>
                            <a href="#berita">Sorotan Berita</a>
                            <a href="#berita">Berita Terbaru</a>
                        </div>
                        <div class="dropdown-column">
                            <a href="#dokumen">Pengumuman Instansi</a>
                            <a href="#layanan">Layanan Publik</a>
                            <a href="#kontak">Kontak Informasi</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-item">
                <a href="#profil" class="nav-link">
                    Tentang Kami <span class="nav-arrow">⌄</span>
                </a>
                <div class="dropdown-panel">
                    <div class="dropdown-inner">
                        <div class="dropdown-column">
                            <a href="#profil">Profil Instansi</a>
                            <a href="#profil">Visi dan Misi</a>
                            <a href="#profil">Tugas dan Fungsi</a>
                        </div>
                        <div class="dropdown-column">
                            <a href="#profil">Struktur Organisasi</a>
                            <a href="#profil">Informasi Kelembagaan</a>
                            <a href="#kontak">Alamat dan Kontak</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-item">
                <a href="#dokumen" class="nav-link">
                    Dokumen Publik <span class="nav-arrow">⌄</span>
                </a>
                <div class="dropdown-panel">
                    <div class="dropdown-inner">
                        <div class="dropdown-column">
                            <a href="#dokumen">Dokumen dan Publikasi</a>
                            <a href="#dokumen">Pengumuman Resmi</a>
                            <a href="#dokumen">Informasi Kebijakan</a>
                        </div>
                        <div class="dropdown-column">
                            <a href="#dokumen">Agenda Instansi</a>
                            <a href="#dokumen">Daftar Informasi Publik</a>
                            <a href="#kontak">Permintaan Informasi</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-item">
                <a href="{{ route('berita.index') }}" class="nav-link">
                    Berita & Artikel <span class="nav-arrow">⌄</span>
               </a>
                <div class="dropdown-panel">
                    <div class="dropdown-inner">
                        <div class="dropdown-column">
                            <a href="#berita">Berita Instansi</a>
                            <a href="#berita">Pelayanan Publik</a>
                            <a href="#berita">Transformasi Digital</a>
                        </div>
                        <div class="dropdown-column">
                            <a href="#berita">Artikel</a>
                            <a href="#berita">Kegiatan dan Agenda</a>
                            <a href="#berita">Berita Populer</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-item">
                <a href="#layanan" class="nav-link">
                    Informasi & Layanan Publik
                    <span class="nav-arrow">⌄</span>
                </a>
                <div class="dropdown-panel">
                    <div class="dropdown-inner">
                        <div class="dropdown-column">
                            <a href="#layanan">Daftar Layanan</a>
                            <a href="#aduan">Aduan Rakyat</a>
                            <a href="#layanan">Panduan Pelayanan</a>
                        </div>
                        <div class="dropdown-column">
                            <a href="#dokumen">Informasi Publik</a>
                            <a href="#kontak">Bantuan Masyarakat</a>
                            <a href="#kontak">Kontak Instansi</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </nav>

    <main class="container">

        <!-- INFORMASI TERKINI -->
        <div class="headline-strip">
            <span class="headline-label">INFORMASI</span>
            <span class="headline-message">
                Selamat datang di Portal Informasi Maju Digital
            </span>
        </div>

        <!-- BERITA UTAMA -->
        <section class="lead-section" id="beranda">
            <div class="section-heading lead-heading">
                <div>
                    <span class="eyebrow">KABAR MAJU DIGITAL</span>
                    <h1>Informasi Terkini</h1>
                </div>
                <span class="heading-decoration"></span>
            </div>

            <div class="lead-grid">

                <div class="hero-carousel">
                    <article class="hero-slide is-active"
                        style="background-image:url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1500&q=85')">
                        <div class="hero-shade"></div>
                        <div class="hero-content">
                            <span class="hero-category">PELAYANAN PUBLIK</span>
                            <span class="hero-kicker">INFORMASI UTAMA</span>
                            <h2>Membangun Pelayanan Publik yang Modern dan Terintegrasi</h2>
                            <p>
                                Menghadirkan informasi dan layanan yang semakin
                                mudah dijangkau oleh masyarakat.
                            </p>
                            <a href="#berita" class="hero-link">
                                Selengkapnya <span>→</span>
                            </a>
                        </div>
                    </article>

                    <article class="hero-slide"
                        style="background-image:url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1500&q=85')">
                        <div class="hero-shade"></div>
                        <div class="hero-content">
                            <span class="hero-category">INFORMASI PUBLIK</span>
                            <span class="hero-kicker">KABAR INSTANSI</span>
                            <h2>Mendorong Keterbukaan Informasi bagi Masyarakat</h2>
                            <p>
                                Menyediakan informasi mengenai program, kegiatan,
                                serta kebijakan secara terarah.
                            </p>
                            <a href="#dokumen" class="hero-link">
                                Jelajahi Informasi <span>→</span>
                            </a>
                        </div>
                    </article>

                    <article class="hero-slide"
                        style="background-image:url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1500&q=85')">
                        <div class="hero-shade"></div>
                        <div class="hero-content">
                            <span class="hero-category">TRANSFORMASI DIGITAL</span>
                            <span class="hero-kicker">INOVASI LAYANAN</span>
                            <h2>Teknologi untuk Pelayanan yang Lebih Responsif</h2>
                            <p>
                                Mengembangkan pengalaman digital yang informatif
                                dan berorientasi pada kebutuhan masyarakat.
                            </p>
                            <a href="#layanan" class="hero-link">
                                Lihat Layanan <span>→</span>
                            </a>
                        </div>
                    </article>

                    <div class="hero-controls">
                        <div class="hero-dots" aria-label="Pilih berita utama">
                            <button type="button" class="hero-dot is-active"
                                data-slide="0" aria-label="Berita utama 1"
                                aria-pressed="true"></button>
                            <button type="button" class="hero-dot"
                                data-slide="1" aria-label="Berita utama 2"
                                aria-pressed="false"></button>
                            <button type="button" class="hero-dot"
                                data-slide="2" aria-label="Berita utama 3"
                                aria-pressed="false"></button>
                        </div>

                        <div class="hero-arrows">
                            <button type="button" class="hero-arrow"
                                data-direction="-1" aria-label="Berita sebelumnya">←</button>
                            <button type="button" class="hero-arrow"
                                data-direction="1" aria-label="Berita berikutnya">→</button>
                        </div>
                    </div>
                </div>

                <!-- BERITA POPULER -->
                <aside class="popular-panel">
                    <div class="popular-heading">
                        <div>
                            <span class="eyebrow">BANYAK DIBACA</span>
                            <h2>Berita Populer</h2>
                        </div>
                        <span class="popular-count">01—05</span>
                    </div>

                    <a href="#berita" class="popular-item">
                        <span class="popular-number">01</span>
                        <span class="popular-copy">
                            <small>PELAYANAN PUBLIK</small>
                            <strong>Informasi Program Pelayanan Masyarakat</strong>
                        </span>
                    </a>

                    <a href="#berita" class="popular-item">
                        <span class="popular-number">02</span>
                        <span class="popular-copy">
                            <small>INFORMASI PUBLIK</small>
                            <strong>Mengenal Akses Dokumen Publik</strong>
                        </span>
                    </a>

                    <a href="#berita" class="popular-item">
                        <span class="popular-number">03</span>
                        <span class="popular-copy">
                            <small>TRANSFORMASI DIGITAL</small>
                            <strong>Pengembangan Layanan Digital Terpadu</strong>
                        </span>
                    </a>

                    <a href="#berita" class="popular-item">
                        <span class="popular-number">04</span>
                        <span class="popular-copy">
                            <small>KEGIATAN INSTANSI</small>
                            <strong>Agenda dan Kegiatan Maju Digital</strong>
                        </span>
                    </a>

                    <a href="#berita" class="popular-item">
                        <span class="popular-number">05</span>
                        <span class="popular-copy">
                            <small>ASPIRASI MASYARAKAT</small>
                            <strong>Kanal Aduan dan Aspirasi Masyarakat</strong>
                        </span>
                    </a>

                    <a href="#berita" class="popular-more">
                        Jelajahi semua berita <span>→</span>
                    </a>
                </aside>

            </div>
        </section>

        <!-- BERITA TERKINI: DUA BERITA PER BARIS -->
        <section class="news-section" id="berita">
            <div class="section-heading">
                <div>
                    <span class="eyebrow">KABAR DAN KEGIATAN</span>
                    <h2>Berita dan Artikel</h2>
                    <p>Ikuti informasi terbaru dari Maju Digital.</p>
                </div>
                <a href="#berita" class="text-link">Semua berita ↗</a>
            </div>

            <div class="news-grid">

                <article class="news-item">
                    <a href="#berita" class="news-image image-one"
                       aria-label="Berita pelayanan publik"></a>
                    <div class="news-copy">
                        <span class="news-category">PELAYANAN PUBLIK</span>
                        <h3>
                            <a href="#berita">Meningkatkan Kemudahan Akses Pelayanan bagi Masyarakat</a>
                        </h3>
                        <p>
                            Informasi mengenai pengembangan layanan yang lebih
                            praktis, terarah, dan mudah dijangkau.
                        </p>
                        <div class="news-meta">BERITA INSTANSI <span>•</span> 3 MENIT BACA</div>
                    </div>
                </article>

                <article class="news-item">
                    <a href="#berita" class="news-image image-two"
                       aria-label="Berita keterbukaan informasi"></a>
                    <div class="news-copy">
                        <span class="news-category">INFORMASI PUBLIK</span>
                        <h3>
                            <a href="#berita">Mendorong Informasi Publik yang Terbuka dan Akuntabel</a>
                        </h3>
                        <p>
                            Mempermudah masyarakat memperoleh informasi mengenai
                            kegiatan dan kebijakan instansi.
                        </p>
                        <div class="news-meta">BERITA INSTANSI <span>•</span> 4 MENIT BACA</div>
                    </div>
                </article>

                <article class="news-item">
                    <a href="#berita" class="news-image image-three"
                       aria-label="Berita transformasi digital"></a>
                    <div class="news-copy">
                        <span class="news-category">TRANSFORMASI DIGITAL</span>
                        <h3>
                            <a href="#berita">Inovasi Digital untuk Mendukung Pelayanan Terpadu</a>
                        </h3>
                        <p>
                            Pemanfaatan teknologi sebagai bagian dari peningkatan
                            kualitas layanan informasi.
                        </p>
                        <div class="news-meta">BERITA INSTANSI <span>•</span> 3 MENIT BACA</div>
                    </div>
                </article>

                <article class="news-item">
                    <a href="#berita" class="news-image image-four"
                       aria-label="Berita informasi masyarakat"></a>
                    <div class="news-copy">
                        <span class="news-category">KEGIATAN INSTANSI</span>
                        <h3>
                            <a href="#berita">Mengembangkan Kanal Informasi yang Mudah Diakses</a>
                        </h3>
                        <p>
                            Penyampaian informasi dan pengumuman melalui portal
                            digital yang terorganisasi.
                        </p>
                        <div class="news-meta">BERITA INSTANSI <span>•</span> 3 MENIT BACA</div>
                    </div>
                </article>

            </div>
        </section>

        <!-- INFORMASI PUBLIK -->
        <section class="information-section" id="dokumen">
            <div class="information-intro">
                <span class="eyebrow">AKSES INFORMASI</span>
                <h2>Informasi Publik dan Pengumuman</h2>
                <p>
                    Temukan informasi, dokumen, dan pengumuman instansi
                    melalui satu portal.
                </p>
                <a href="#dokumen" class="text-link">Jelajahi informasi ↗</a>
            </div>

            <div class="announcement-panel">
                <div class="announcement-heading">
                    <h3>Informasi Penting</h3>
                    <span>PUBLIKASI INSTANSI</span>
                </div>

                <a href="#dokumen" class="announcement-item">
                    <span class="announcement-number">01</span>
                    <span class="announcement-copy">
                        <strong>Informasi dan Dokumen Publik</strong>
                        <small>Dokumen dan informasi untuk masyarakat</small>
                    </span>
                    <span class="item-arrow">↗</span>
                </a>

                <a href="#dokumen" class="announcement-item">
                    <span class="announcement-number">02</span>
                    <span class="announcement-copy">
                        <strong>Pengumuman dan Agenda Instansi</strong>
                        <small>Informasi kegiatan dan pengumuman resmi</small>
                    </span>
                    <span class="item-arrow">↗</span>
                </a>

                <a href="#dokumen" class="announcement-item">
                    <span class="announcement-number">03</span>
                    <span class="announcement-copy">
                        <strong>Profil dan Informasi Organisasi</strong>
                        <small>Informasi kelembagaan Maju Digital</small>
                    </span>
                    <span class="item-arrow">↗</span>
                </a>
            </div>
        </section>

        <!-- LAYANAN PUBLIK -->
        <section class="services-section" id="layanan">
            <div class="section-heading">
                <div>
                    <span class="eyebrow">LAYANAN UNTUK MASYARAKAT</span>
                    <h2>Akses Layanan Publik</h2>
                    <p>Pilih informasi atau layanan sesuai kebutuhanmu.</p>
                </div>
            </div>

            <div class="service-grid">
                <a href="#aduan" class="service-item">
                    <span class="service-number">01</span>
                    <h3>Aduan Rakyat</h3>
                    <p>Sampaikan laporan dan pantau perkembangan penanganannya.</p>
                    <span class="service-link">Buka layanan →</span>
                </a>

                <a href="#dokumen" class="service-item">
                    <span class="service-number">02</span>
                    <h3>Dokumen Publik</h3>
                    <p>Temukan dokumen dan informasi yang tersedia untuk masyarakat.</p>
                    <span class="service-link">Lihat dokumen →</span>
                </a>

                <a href="#profil" class="service-item">
                    <span class="service-number">03</span>
                    <h3>Profil Instansi</h3>
                    <p>Kenali tugas, fungsi, dan informasi kelembagaan.</p>
                    <span class="service-link">Kenali instansi →</span>
                </a>

                <a href="#kontak" class="service-item">
                    <span class="service-number">04</span>
                    <h3>Kontak Informasi</h3>
                    <p>Temukan saluran informasi dan kontak instansi.</p>
                    <span class="service-link">Lihat kontak →</span>
                </a>
            </div>
        </section>

        <!-- ADUAN RAKYAT -->
        <section class="complaint-banner" id="aduan">
            <div class="complaint-emblem">MD</div>
            <div class="complaint-copy">
                <span class="eyebrow">ASPIRASI MASYARAKAT</span>
                <h2>Aduan Rakyat Maju Digital</h2>
                <p>
                    Sampaikan laporan, pantau status, dan lihat perkembangan
                    penanganan aduan melalui portal.
                </p>
            </div>
            <a href="#aduan" class="complaint-button">Jelajahi Aduan →</a>
        </section>

        <!-- PROFIL -->
        <section class="profile-section" id="profil">
            <div class="profile-emblem">MD</div>
            <div class="profile-copy">
                <span class="eyebrow">TENTANG MAJU DIGITAL</span>
                <h2>Informasi Terbuka, Pelayanan Terpercaya</h2>
                <p>
                    Maju Digital merupakan proyek demonstrasi portal informasi
                    dan pelayanan publik yang berfokus pada berita, keterbukaan
                    informasi, serta aspirasi masyarakat.
                </p>
            </div>
            <a href="#profil" class="profile-link">Profil Instansi ↗</a>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="site-footer" id="kontak">
        <div class="container">
            <div class="footer-main">
                <div class="footer-brand">
                    <div class="footer-brand-heading">
                        <span class="brand-logo footer-logo">MD</span>
                        <strong>MAJU DIGITAL</strong>
                    </div>
                    <p>
                        Portal informasi, berita, dan pelayanan publik.
                        Informasi disusun agar mudah diakses masyarakat.
                    </p>
                </div>

                <div class="footer-column">
                    <h3>Navigasi</h3>
                    <a href="#berita">Berita dan Artikel</a>
                    <a href="#profil">Profil Instansi</a>
                    <a href="#dokumen">Dokumen Publik</a>
                </div>

                <div class="footer-column">
                    <h3>Layanan</h3>
                    <a href="#aduan">Aduan Rakyat</a>
                    <a href="#layanan">Layanan Publik</a>
                    <a href="#kontak">Kontak Informasi</a>
                </div>
            </div>

            <div class="footer-bottom">
                <span>© 2026 Maju Digital. Proyek demonstrasi portofolio.</span>
                <span>Informasi Terbuka, Pelayanan Terpercaya</span>
            </div>
        </div>
    </footer>

    <!-- TITIK NAVIGASI SCROLL -->
    <nav class="section-dots" aria-label="Navigasi posisi halaman">
        <a class="section-dot is-active" href="#beranda"
           data-target="beranda" aria-label="Beranda">
            <span>Beranda</span>
        </a>
        <a class="section-dot" href="#berita"
           data-target="berita" aria-label="Berita">
            <span>Berita</span>
        </a>
        <a class="section-dot" href="#dokumen"
           data-target="dokumen" aria-label="Informasi publik">
            <span>Informasi Publik</span>
        </a>
        <a class="section-dot" href="#layanan"
           data-target="layanan" aria-label="Layanan publik">
            <span>Layanan Publik</span>
        </a>
        <a class="section-dot" href="#profil"
           data-target="profil" aria-label="Profil instansi">
            <span>Profil Instansi</span>
        </a>
        <a class="section-dot" href="#kontak"
           data-target="kontak" aria-label="Kontak">
            <span>Kontak</span>
        </a>
    </nav>

    <!-- FUNGSI SLIDER, DROPDOWN, DAN NAVIGASI SCROLL -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Slider berita utama
            const slides = Array.from(document.querySelectorAll('.hero-slide'));
            const dots = Array.from(document.querySelectorAll('.hero-dot'));
            const arrows = Array.from(document.querySelectorAll('.hero-arrow'));
            let currentSlide = 0;

            function showSlide(index) {
                if (!slides.length) return;

                currentSlide = (index + slides.length) % slides.length;

                slides.forEach(function (slide, i) {
                    slide.classList.toggle('is-active', i === currentSlide);
                    slide.setAttribute('aria-hidden', String(i !== currentSlide));
                });

                dots.forEach(function (dot, i) {
                    dot.classList.toggle('is-active', i === currentSlide);
                    dot.setAttribute('aria-pressed', String(i === currentSlide));
                });
            }

            dots.forEach(function (dot, index) {
                dot.addEventListener('click', function () {
                    showSlide(index);
                });
            });

            arrows.forEach(function (arrow) {
                arrow.addEventListener('click', function () {
                    showSlide(currentSlide + Number(arrow.dataset.direction));
                });
            });

            showSlide(0);

            // Dropdown: mouse dan keyboard
            const menuItems = Array.from(document.querySelectorAll('.main-nav .nav-item'));

            menuItems.forEach(function (item) {
                item.addEventListener('mouseenter', function () {
                    menuItems.forEach(function (other) {
                        if (other !== item) other.classList.remove('is-open');
                    });
                    item.classList.add('is-open');
                });

                item.addEventListener('mouseleave', function () {
                    item.classList.remove('is-open');
                });

                item.addEventListener('focusin', function () {
                    item.classList.add('is-open');
                });

                item.addEventListener('focusout', function (event) {
                    if (!item.contains(event.relatedTarget)) {
                        item.classList.remove('is-open');
                    }
                });
            });

            // Titik di sisi kanan mengikuti bagian halaman
            const sectionLinks = Array.from(document.querySelectorAll('.section-dot'));
            const trackedSections = sectionLinks
                .map(function (link) {
                    return document.getElementById(link.dataset.target);
                })
                .filter(Boolean);

            function updateSectionDots() {
                const marker = window.scrollY + window.innerHeight * 0.38;
                let activeSection = trackedSections[0];

                trackedSections.forEach(function (section) {
                    if (section.getBoundingClientRect().top + window.scrollY <= marker) {
                        activeSection = section;
                    }
                });

                if (!activeSection) return;

                sectionLinks.forEach(function (link) {
                    const isActive = link.dataset.target === activeSection.id;
                    link.classList.toggle('is-active', isActive);

                    if (isActive) {
                        link.setAttribute('aria-current', 'location');
                    } else {
                        link.removeAttribute('aria-current');
                    }
                });
            }

            window.addEventListener('scroll', updateSectionDots, { passive: true });
            window.addEventListener('resize', updateSectionDots);
            updateSectionDots();
        });
    </script>

</body>
</html>
