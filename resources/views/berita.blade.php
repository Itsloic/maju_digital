

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Berita dan artikel Maju Digital.">

    <title>Berita & Artikel | Maju Digital</title>

    <style>

        :root {

            --navy: #153752;

            --navy-dark: #102a3e;

            --blue: #347da8;

            --gold: #c7a45e;

            --ink: #202e39;

            --muted: #71808b;

            --line: #dce2e6;

            --paper: #f3f5f6;

        }

        * { box-sizing: border-box; }

        html {

            scroll-behavior: smooth;

            scroll-padding-top: 20px;

        }

        body {

            margin: 0;

            color: var(--ink);

            background: #fff;

            font-family: Arial, Helvetica, sans-serif;

            line-height: 1.6;

        }

        a { color: inherit; text-decoration: none; }

        button, input { font: inherit; }

        button { cursor: pointer; }

        img {

            display: block;

            max-width: 100%;

        }

        .wrap {

            width: min(1260px, 92%);

            margin-inline: auto;

        }

        /* HEADER */

        .topline {

            background: var(--navy-dark);

            color: #e0e7ec;

            font-size: 10px;

            letter-spacing: .8px;

        }

        .topline-inner {

            display: flex;

            min-height: 34px;

            justify-content: space-between;

            align-items: center;

            gap: 15px;

        }

        .masthead {

            border-bottom: 1px solid var(--line);

        }

        .masthead-inner {

            display: flex;

            min-height: 105px;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

        }

        .brand {

            display: flex;

            align-items: center;

            gap: 15px;

        }

        .brand-logo {

            display: grid;

            place-items: center;

            flex: 0 0 52px;

            width: 52px;

            height: 52px;

            border: 1px solid var(--gold);

            background: var(--navy);

            color: #f2dda6;

            font: bold 21px Georgia, serif;

        }

        .brand-small {

            display: block;

            color: #96763b;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: 1.5px;

        }

        .brand-name {

            display: block;

            color: var(--navy);

            font: bold 29px/1.25 Georgia, serif;

            letter-spacing: .4px;

        }

        .brand-tagline {

            display: block;

            margin-top: 2px;

            color: var(--muted);

            font-size: 10px;

        }

        .masthead-note {

            padding-left: 15px;

            border-left: 2px solid var(--gold);

            color: var(--muted);

            font: italic 13px/1.7 Georgia, serif;

        }

        /* NAVIGASI */

        .main-nav {

            position: relative;

            z-index: 1000;

            background: var(--navy);

            border-bottom: 3px solid var(--gold);

        }

        .nav-inner {

            display: flex;

        }

        .nav-item {

            position: static;

            flex: 1 1 0;

            min-width: 0;

        }

        .nav-link {

            display: flex;

            min-height: 53px;

            justify-content: center;

            align-items: center;

            gap: 7px;

            padding: 10px;

            margin-bottom: -3px;

            border-bottom: 3px solid transparent;

            color: white;

            font-size: 11px;

            font-weight: 700;

            line-height: 1.5;

            text-align: center;

        }

        .nav-link:hover,

        .nav-link.active,

        .nav-item:hover > .nav-link,

        .nav-item:focus-within > .nav-link,

        .nav-item.is-open > .nav-link {

            background: rgba(255,255,255,.08);

            border-bottom-color: var(--gold);

        }

        .chevron { color: #f0d58f; }

        .dropdown {

            display: none;

            position: absolute;

            top: 100%;

            left: 0;

            right: 0;

            padding: 20px 0 24px;

            background: #d2d6d8;

            color: #293944;

            border-bottom: 3px solid var(--gold);

            box-shadow: 0 10px 20px rgba(0,0,0,.15);

        }

        .nav-item:hover > .dropdown,

        .nav-item:focus-within > .dropdown,

        .nav-item.is-open > .dropdown {

            display: block;

        }

        .dropdown-inner {

            display: grid;

            grid-template-columns: repeat(2, minmax(0,1fr));

            gap: 25px;

            width: min(1200px, 90%);

            margin: auto;

        }

        .dropdown-column {

            display: flex;

            flex-direction: column;

        }

        .dropdown-column a {

            padding: 8px 10px;

            font-size: 13px;

        }

        .dropdown-column a::before {

            content: "›";

            margin-right: 11px;

            font-size: 20px;

            font-weight: bold;

        }

        .dropdown-column a:hover {

            background: rgba(255,255,255,.5);

            color: var(--navy);

        }

        /* JUDUL HALAMAN */

        .ticker {

            display: flex;

            align-items: stretch;

            margin-top: 22px;

            border: 1px solid var(--line);

        }

        .ticker-label {

            display: grid;

            flex: 0 0 auto;

            place-items: center;

            padding: 9px 13px;

            background: var(--navy);

            color: white;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: .9px;

        }

        .ticker-text {

            display: flex;

            align-items: center;

            padding: 8px 13px;

            color: var(--muted);

            font-size: 11px;

        }

        .ticker-dot {

            width: 7px;

            height: 7px;

            flex: 0 0 auto;

            margin-right: 9px;

            border-radius: 50%;

            background: var(--gold);

        }

        .page-heading {

            display: flex;

            justify-content: space-between;

            align-items: end;

            gap: 20px;

            padding: 28px 0 20px;

            border-bottom: 3px solid var(--navy);

        }

        .eyebrow {

            color: #94753c;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: 1.6px;

        }

        .page-heading h1 {

            margin: 5px 0;

            color: var(--navy);

            font: bold clamp(35px, 4.7vw, 51px)/1.13 Georgia, serif;

            letter-spacing: -.8px;

        }

        .page-heading p {

            margin: 7px 0 0;

            color: var(--muted);

            font-size: 12px;

        }

        .edition {

            flex: 0 0 auto;

            padding-left: 14px;

            border-left: 2px solid var(--gold);

            color: var(--navy);

            font: 13px/1.7 Georgia, serif;

            text-align: right;

        }

        .topic-bar {

            display: flex;

            gap: 0;

            overflow-x: auto;

            border-bottom: 1px solid var(--line);

        }

        .topic-button {

            flex: 0 0 auto;

            padding: 13px 15px;

            border: 0;

            border-bottom: 3px solid transparent;

            background: white;

            color: #5b6973;

            font-size: 10px;

            font-weight: 800;

        }

        .topic-button:first-child { padding-left: 0; }

        .topic-button:hover,

        .topic-button.is-active {

            border-bottom-color: var(--gold);

            color: var(--navy);

        }

        /* SLIDER UTAMA */

        .lead-layout {

            display: grid;

            grid-template-columns: minmax(0,1.7fr) minmax(280px,.85fr);

            gap: 27px;

            margin-top: 27px;

            align-items: start;

        }

        .carousel {

            min-width: 0;

        }

        .carousel-viewport {
            display: block;
            color: inherit;
            text-decoration: none;

            position: relative;

            height: 385px;

            overflow: hidden;

            background: var(--navy-dark);
            

        }

        .hero-slide {

            position: absolute;

            inset: 0;

            opacity: 0;

            visibility: hidden;

            transition: opacity .3s ease;

        }

        .hero-slide.is-active {

            z-index: 1;

            opacity: 1;

            visibility: visible;

        }

        .hero-slide img {

            position: absolute;

            inset: 0;

            width: 100%;

            height: 100%;

            object-fit: cover;

            object-position: center;

        }

        .hero-shade {

            position: absolute;

            inset: 0;

            background: linear-gradient(

                0deg,

                rgba(10,27,40,.96) 0%,

                rgba(10,27,40,.63) 45%,

                rgba(10,27,40,.05) 100%

            );

        }

        .hero-tag {

            position: absolute;

            top: 16px;

            left: 16px;

            z-index: 2;

            padding: 7px 10px;

            background: var(--gold);

            color: var(--navy-dark);

            font-size: 9px;

            font-weight: 800;

            letter-spacing: .7px;

        }

        .hero-copy {

            position: absolute;

            right: 25px;

            bottom: 49px;

            left: 25px;

            z-index: 2;

            color: white;

        }

        .hero-kicker {

            color: #f2d99e;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: 1.2px;

        }

        .hero-copy h2 {

            max-width: 690px;

            margin: 8px 0 10px;

            color: white;

            font: bold clamp(25px, 3vw, 36px)/1.23 Georgia, serif;

            overflow-wrap: anywhere;

        }

        .hero-copy p {

            max-width: 610px;

            margin: 0;

            color: #e2e9ee;

            font-size: 12px;

            line-height: 1.75;

        }

        .carousel-controls {

            position: absolute;

            right: 16px;

            bottom: 12px;

            left: 16px;

            z-index: 5;

            display: flex;

            justify-content: space-between;

            align-items: center;

        }

        .carousel-dots,

        .carousel-arrows {

            display: flex;

            align-items: center;

            gap: 7px;

        }

        .carousel-dot {

            width: 8px;

            height: 8px;

            padding: 0;

            border: 1px solid white;

            border-radius: 50%;

            background: transparent;

        }

        .carousel-dot.is-active {

            width: 23px;

            border-color: var(--gold);

            border-radius: 6px;

            background: var(--gold);

        }

        .carousel-arrow {

            display: grid;

            width: 31px;

            height: 31px;

            place-items: center;

            border: 1px solid rgba(255,255,255,.65);

            background: rgba(10,30,45,.7);

            color: white;

            font-size: 17px;

        }

        .carousel-arrow:hover {

            background: var(--gold);

            color: var(--navy);

        }

        .lead-caption {

            display: flex;

            justify-content: space-between;

            gap: 15px;

            padding: 12px 0 16px;

            border-bottom: 1px solid var(--line);

            color: var(--muted);

            font-size: 9px;

        }

        /* BERITA TERBARU SAMPING */

        .latest-column {

            min-width: 0;

            padding-left: 20px;

            border-left: 1px solid var(--line);

        }

        .module-heading {

            display: flex;

            justify-content: space-between;

            align-items: end;

            gap: 10px;

            padding-bottom: 12px;

            border-bottom: 2px solid var(--navy);

        }

        .module-heading h2 {

            margin: 0;

            color: var(--navy);

            font: bold 23px Georgia, serif;

        }

        .module-heading span {

            color: #98763c;

            font-size: 9px;

            font-weight: bold;

        }

        .latest-item {

            display: grid;

            grid-template-columns: 82px minmax(0,1fr);

            gap: 11px;

            padding: 15px 0;

            border-bottom: 1px solid var(--line);

        }

        .latest-thumb {

            width: 82px;

            height: 75px;

            overflow: hidden;

            background: var(--paper);

        }

        .latest-thumb img {

            width: 100%;

            height: 100%;

            object-fit: cover;

        }

        .latest-copy {

            min-width: 0;

        }

        .latest-copy small {

            display: block;

            color: #95753c;

            font-size: 8px;

            font-weight: 800;

            letter-spacing: .4px;

        }

        .latest-copy h3 {

            margin: 5px 0 0;

            color: var(--navy);

            font: bold 14px/1.45 Georgia, serif;

            overflow-wrap: anywhere;

        }

        .latest-copy h3 a:hover { color: var(--blue); }

        .latest-more {

            display: flex;

            justify-content: space-between;

            padding: 13px 0;

            color: var(--blue);

            font-size: 10px;

            font-weight: 800;

        }

        /* DAFTAR BERITA */

        .articles-section {

            margin-top: 58px;

            scroll-margin-top: 20px;

        }

        .section-heading {

            display: flex;

            justify-content: space-between;

            align-items: end;

            gap: 20px;

            margin-bottom: 19px;

        }

        .section-heading h2 {

            margin: 5px 0;

            color: var(--navy);

            font: bold 31px/1.2 Georgia, serif;

        }

        .section-heading p {

            margin: 6px 0 0;

            color: var(--muted);

            font-size: 12px;

        }

        .result-count {

            flex: 0 0 auto;

            color: var(--muted);

            font-size: 10px;

        }

        .tools {

            display: flex;

            flex-direction: column;

            gap: 13px;

            padding: 15px 0;

            border-top: 1px solid var(--line);

            border-bottom: 1px solid var(--line);

        }

        .filters {

            display: flex;

            flex-wrap: wrap;

            gap: 7px;

        }

        .filter-button {

            padding: 8px 12px;

            border: 1px solid var(--line);

            background: white;

            color: #566773;

            font-size: 10px;

            font-weight: 800;

        }

        .filter-button:hover { border-color: var(--navy); }

        .filter-button.is-active {

            border-color: var(--navy);

            background: var(--navy);

            color: white;

        }

        .search-form {

            display: flex;

            width: 100%;

            max-width: 410px;

            min-height: 40px;

            margin-left: auto;

            border: 1px solid #d6dee3;

        }

        .search-form input {

            width: 100%;

            min-width: 0;

            padding: 9px 12px;

            border: 0;

            outline: 0;

            font-size: 12px;

        }

        .search-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 10px;
    width: 100%;
}

.search-actions .search-form {
    margin-left: 0;
}

.manage-articles-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 40px;
    padding: 0 14px;
    background: var(--navy);
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    white-space: nowrap;
    text-decoration: none;
}

.manage-articles-link:hover {
    background: var(--blue);
}

@media (max-width: 520px) {
    .search-actions {
        flex-wrap: wrap;
    }

    .search-actions .search-form {
        width: 100%;
        max-width: none;
    }

    .manage-articles-link {
        width: 100%;
    }
}

        

        /* SEMUA GAMBAR KARTU MENGGUNAKAN UKURAN SERAGAM */

        .article-grid {

            display: grid;

            grid-template-columns: repeat(3, minmax(0,1fr));

            column-gap: 23px;

            row-gap: 0;

        }

        .article-card {

            display: flex;

            min-width: 0;

            flex-direction: column;

            padding: 22px 0 23px;

            border-bottom: 1px solid var(--line);

        }

        .article-card[hidden] { display: none !important; }

        .article-image {

            display: block;

            width: 100%;

            aspect-ratio: 16 / 10;

            overflow: hidden;

            background: #e8ecef;

        }

        .article-image img {

            width: 100%;

            height: 100%;

            object-fit: cover;

            object-position: center;

            transition: transform .3s ease;

        }

        .article-card:hover .article-image img {

            transform: scale(1.035);

        }

        .article-copy {

            display: flex;

            flex: 1;

            flex-direction: column;

            align-items: flex-start;

            padding-top: 13px;

            min-width: 0;

        }

        .article-category {

            color: #94743b;

            font-size: 9px;

            font-weight: 800;

            letter-spacing: .7px;

        }

        .article-title {

            margin: 7px 0 9px;

            color: var(--navy);

            font: bold 19px/1.4 Georgia, serif;

            overflow-wrap: anywhere;

        }

        .article-title a:hover { color: var(--blue); }

        .article-description {

            margin: 0 0 13px;

            color: var(--muted);

            font-size: 11px;

            line-height: 1.8;

        }

        .article-meta {

            display: flex;

            flex-wrap: wrap;

            gap: 5px 8px;

            margin-top: auto;

            color: #7b8790;

            font-size: 8px;

            letter-spacing: .35px;

        }

        .article-meta .sep { color: var(--gold); }

        .no-results {

            padding: 32px 0;

            color: var(--muted);

            text-align: center;

            font-size: 13px;

        }

        .no-results[hidden] { display: none !important; }

        /* PAGINATION, BUKAN INFINITE SCROLL */

        .pagination {

            display: flex;

            justify-content: center;

            align-items: center;

            flex-wrap: wrap;

            gap: 7px;

            margin-top: 28px;

        }

        .pagination button {

            display: grid;

            min-width: 37px;

            height: 37px;

            padding: 0 11px;

            place-items: center;

            border: 1px solid var(--line);

            background: white;

            color: #455764;

            font-size: 11px;

        }

        .pagination button:hover:not(:disabled) {

            border-color: var(--navy);

        }

        .pagination button.page-active {

            border-color: var(--navy);

            background: var(--navy);

            color: white;

        }

        .pagination button:disabled {

            opacity: .38;

            cursor: not-allowed;

        }

        #page-numbers {

            display: flex;

            gap: 6px;

        }

        /* TENTANG KAMI DI PALING BAWAH BERITA */

        .about-section {

            display: grid;

            grid-template-columns: 85px minmax(0,1fr);

            gap: 23px;

            align-items: start;

            margin-top: 65px;

            padding: 28px 0;

            border-top: 3px solid var(--navy);

            border-bottom: 1px solid var(--line);

            scroll-margin-top: 20px;

        }

        .about-logo {

            display: grid;

            width: 75px;

            height: 75px;

            place-items: center;

            background: var(--navy);

            border: 1px solid var(--gold);

            color: #f2dda6;

            font: bold 25px Georgia, serif;

        }

        .about-copy h2 {

            margin: 5px 0 9px;

            color: var(--navy);

            font: bold 27px/1.3 Georgia, serif;

        }

        .about-copy p {

            max-width: 850px;

            margin: 0;

            color: var(--muted);

            font-size: 12px;

            line-height: 1.9;

        }

        .about-copy .about-note {

            margin-top: 10px;

            color: #8a713e;

            font-size: 10px;

            font-weight: bold;

        }

        /* FOOTER BERITA */

        .site-footer {

            margin-top: 42px;

            padding: 20px 0;

            background: var(--navy-dark);

            color: #d9e2e8;

            font-size: 10px;

        }

        .footer-inner {

            display: flex;

            justify-content: space-between;

            gap: 15px;

        }

        .site-footer a:hover { color: white; }

        /* PENANDA POSISI SCROLL */

        .scroll-dots {

            position: fixed;

            top: 50%;

            right: 13px;

            z-index: 900;

            display: flex;

            flex-direction: column;

            align-items: center;

            gap: 14px;

            transform: translateY(-50%);

        }

        .scroll-dot {

            position: relative;

            display: block;

            width: 10px;

            height: 10px;

            border: 1px solid #8293a0;

            border-radius: 50%;

            background: white;

        }

        .scroll-dot.is-active {

            border-color: var(--gold);

            background: var(--gold);

            transform: scale(1.25);

        }

        .scroll-dot span {

            position: absolute;

            top: 50%;

            right: 22px;

            padding: 6px 9px;

            transform: translateY(-50%);

            background: var(--navy);

            color: white;

            font-size: 10px;

            white-space: nowrap;

            opacity: 0;

            visibility: hidden;

            pointer-events: none;

        }

        .scroll-dot:hover span,

        .scroll-dot:focus-visible span,

        .scroll-dot.is-active span {

            opacity: 1;

            visibility: visible;

        }

        /* RESPONSIF */

        @media (max-width: 1050px) {

            .lead-layout {

                grid-template-columns: minmax(0,1.35fr) minmax(240px,.85fr);

                gap: 19px;

            }

            .latest-column { padding-left: 14px; }

            .article-grid {

                grid-template-columns: repeat(3, minmax(0,1fr));

                column-gap: 17px;

            }

            .article-title { font-size: 17px; }

        }

        @media (max-width: 800px) {

            .nav-inner { flex-wrap: wrap; }

            .nav-item { flex: 1 1 33.333%; }

            .nav-link {

                min-height: 46px;

                font-size: 10px;

            }

            .lead-layout { grid-template-columns: 1fr; }

            .carousel-viewport { height: 375px; }

            .latest-column {

                padding-left: 0;

                border-left: 0;

            }

            .latest-list {

                display: grid;

                grid-template-columns: repeat(2,minmax(0,1fr));

                gap: 0 18px;

            }

            .article-grid {

                grid-template-columns: repeat(2,minmax(0,1fr));

                column-gap: 22px;

            }

            .article-title { font-size: 18px; }

        }

        @media (max-width: 520px) {

            .wrap { width: 92%; }

            .topline { font-size: 8px; }

            .masthead-inner { min-height: 90px; }

            .brand { gap: 11px; }

            .brand-logo {

                flex-basis: 43px;

                width: 43px;

                height: 43px;

                font-size: 17px;

            }

            .brand-small { font-size: 7px; letter-spacing: .8px; }

            .brand-name { font-size: 22px; }

            .brand-tagline { font-size: 9px; }

            .masthead-note { display: none; }

            .nav-item { flex-basis: 50%; }

            .dropdown-inner {

                grid-template-columns: 1fr;

                gap: 0;

            }

            .dropdown-column a { font-size: 12px; }

            .ticker-label { padding: 8px; font-size: 8px; }

            .ticker-text { padding: 8px; font-size: 9px; }

            .page-heading { padding: 23px 0 17px; }

            .page-heading h1 { font-size: 34px; }

            .page-heading p { font-size: 11px; }

            .edition { padding-left: 9px; font-size: 10px; }

            .topic-button {

                padding: 12px;

                font-size: 9px;

            }

            .carousel-viewport { height: 300px; }

            .hero-copy {

                right: 17px;

                bottom: 48px;

                left: 17px;

            }

            .hero-copy h2 { font-size: 24px; }

            .hero-copy p { font-size: 10px; }

            .latest-list { grid-template-columns: 1fr; }

            .section-heading h2 { font-size: 26px; }

            .article-grid { grid-template-columns: 1fr; }

            .article-image { aspect-ratio: 16 / 9; }

            .article-title { font-size: 22px; }

            .article-description { font-size: 12px; }

            .filters {

                flex-wrap: nowrap;

                overflow-x: auto;

                padding-bottom: 5px;

            }

            .filter-button { flex: 0 0 auto; }

            .search-form { margin-left: 0; }

            .about-section {

                grid-template-columns: 55px minmax(0,1fr);

                gap: 15px;

            }

            .about-logo {

                width: 53px;

                height: 53px;

                font-size: 18px;

            }

            .about-copy h2 { font-size: 22px; }

            .about-copy p { font-size: 11px; }

            .scroll-dots { right: 5px; gap: 12px; }

            .scroll-dot { width: 9px; height: 9px; }

            .footer-inner {

                flex-direction: column;

                gap: 6px;

            }

        }

        @media (prefers-reduced-motion: reduce) {

            *, *::before, *::after {

                scroll-behavior: auto !important;

                transition-duration: .01ms !important;

            }

        }

    </style>

</head>

<body id="page-top">

    <div class="topline">

        <div class="wrap topline-inner">

            <span>MAJU DIGITAL / PUSAT BERITA</span>

            <span>INFORMASI UNTUK MASYARAKAT</span>

        </div>

    </div>

    <header class="masthead">

        <div class="wrap masthead-inner">

            <a href="/" class="brand">

                <span class="brand-logo">MD</span>

                <span>

                    <span class="brand-small">PORTAL RESMI INSTANSI</span>

                    <strong class="brand-name">MAJU DIGITAL</strong>

                    <span class="brand-tagline">Informasi Terbuka, Pelayanan Terpercaya</span>

                </span>

            </a>

            <div class="masthead-note">

                Informasi yang jelas.<br>Pelayanan yang terpercaya.

            </div>

        </div>

    </header>

    <nav class="main-nav" aria-label="Navigasi utama">

        <div class="wrap nav-inner">

            <div class="nav-item">

                <a href="/" class="nav-link">Beranda <span class="chevron">⌄</span></a>

                <div class="dropdown">

                    <div class="dropdown-inner">

                        <div class="dropdown-column">

                            <a href="/">Halaman Utama</a>

                            <a href="/#berita">Sorotan Berita</a>

                        </div>

                        <div class="dropdown-column">

                            <a href="/#profil">Tentang Kami</a>

                            <a href="/#kontak">Kontak</a>

                        </div>

                    </div>

                </div>

            </div>

            <div class="nav-item">

                <a href="/#profil" class="nav-link">Tentang Kami <span class="chevron">⌄</span></a>

                <div class="dropdown">

                    <div class="dropdown-inner">

                        <div class="dropdown-column">

                            <a href="/#profil">Profil Instansi</a>

                            <a href="/#profil">Visi dan Misi</a>

                        </div>

                        <div class="dropdown-column">

                            <a href="/#profil">Struktur Organisasi</a>

                            <a href="/#kontak">Kontak Instansi</a>

                        </div>

                    </div>

                </div>

            </div>

            <div class="nav-item">

                <a href="/#dokumen" class="nav-link">Dokumen Publik <span class="chevron">⌄</span></a>

                <div class="dropdown">

                    <div class="dropdown-inner">

                        <div class="dropdown-column">

                            <a href="/#dokumen">Dokumen Publik</a>

                            <a href="/#dokumen">Pengumuman</a>

                        </div>

                        <div class="dropdown-column">

                            <a href="/#dokumen">Agenda Instansi</a>

                            <a href="/#dokumen">Publikasi</a>

                        </div>

                    </div>

                </div>

            </div>

            <div class="nav-item">

                <a href="{{ route('berita.index') }}" class="nav-link active">

                    Berita & Artikel <span class="chevron">⌄</span>

                </a>

                <div class="dropdown">

                    <div class="dropdown-inner">
                        <div class="dropdown-column">
                            <a href="#article-list" data-nav-category="semua">Semua Berita</a>
                            @foreach ($articles->pluck('category')->filter()->unique('id') as $category)
                                <a href="#article-list" data-nav-category="{{ $category->slug }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                        <div class="dropdown-column">
                            <a href="#featured-news">Berita Utama</a>
                            <a href="#article-list">Daftar Berita</a>
                        </div>
                    </div>

                </div>

            </div>

            <div class="nav-item">

                <a href="/#layanan" class="nav-link">Informasi & Layanan Publik <span class="chevron">⌄</span></a>

                <div class="dropdown">

                    <div class="dropdown-inner">

                        <div class="dropdown-column">

                            <a href="/#layanan">Daftar Layanan</a>

                            <a href="/#aduan">Aduan Rakyat</a>

                        </div>

                        <div class="dropdown-column">

                            <a href="/#dokumen">Informasi Publik</a>

                            <a href="/#kontak">Bantuan</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </nav>

    <main class="wrap">

        <div class="ticker">

            <div class="ticker-label">KABAR TERKINI</div>

            <div class="ticker-text">

                <span class="ticker-dot"></span>

                Berita dan perkembangan informasi Maju Digital.

            </div>

        </div>

        <header class="page-heading">

            <div>

                <span class="eyebrow">PUSAT INFORMASI MAJU DIGITAL</span>

                <h1>Berita & Artikel</h1>

                <p>Berita utama, kabar terbaru, dan informasi terkini.</p>

            </div>

            <div class="edition">EDISI<br>DIGITAL</div>

        </header>

        <nav class="topic-bar" aria-label="Kategori berita">
            <button class="topic-button is-active" data-topic="semua" type="button">TERBARU</button>
            @foreach ($articles->pluck('category')->filter()->unique('id') as $category)
                <button class="topic-button" data-topic="{{ $category->slug }}" type="button">{{ mb_strtoupper($category->name) }}</button>
            @endforeach
        </nav>

        <!-- SLIDER BERITA UTAMA -->

        <section class="lead-layout" id="featured-news">

            <div class="carousel">

                <div class="carousel-viewport">

                    

                   
@php
    $heroArticles = $articles->take(3);

    $heroFallbackImages = [
        'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1400&q=85',
        'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1400&q=85',
        'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1400&q=85',
    ];
@endphp

@foreach ($heroArticles as $article)
    <a
        href="{{ route('berita.show', ['slug' => $article->slug]) }}"
        class="hero-slide {{ $loop->first ? 'is-active' : '' }}"
        aria-label="Baca {{ $article->title }}"
    >
        <img
            src="{{ $article->image
                ? asset('storage/' . $article->image)
                : $heroFallbackImages[$loop->index % count($heroFallbackImages)] }}"
            alt="{{ $article->title }}"
        >

        <div class="hero-shade"></div>

        <span class="hero-tag">
            {{ $loop->first ? 'BERITA UTAMA' : 'BERITA PILIHAN' }}
        </span>

        <div class="hero-copy">
            <span class="hero-kicker">
                {{ mb_strtoupper($article->category?->name ?? 'INFORMASI PUBLIK') }}
            </span>

            <h2>{{ $article->title }}</h2>

            <p>
                {{ $article->excerpt
                    ?: \Illuminate\Support\Str::limit(strip_tags($article->content), 180) }}
            </p>
        </div>
    </a>
@endforeach

                    <div class="carousel-controls">

                        <div 
@foreach ($heroArticles as $article)
    <button
        type="button"
        class="carousel-dot {{ $loop->first ? 'is-active' : '' }}"
        data-slide="{{ $loop->index }}"
        aria-label="Berita utama {{ $loop->iteration }}"
    ></button>
@endforeach


                        </div>

                        <div class="carousel-arrows">

                            <button type="button" class="carousel-arrow" data-move="-1" aria-label="Berita sebelumnya">←</button>

                            <button type="button" class="carousel-arrow" data-move="1" aria-label="Berita berikutnya">→</button>

                        </div>

                    </div>

                </div>

                <div class="lead-caption">

                    <span>EDITORIAL MAJU DIGITAL</span>

                    <span id="slide-counter">01 / 03</span>

                </div>

            </div>

            <aside class="latest-column">

                <div class="module-heading">

                    <h2>Berita Terbaru</h2>

                    <span>TERKINI</span>

                </div>

                <div class="latest-list">

                
@forelse ($articles->take(5) as $article)
    <article class="latest-item">
        <a
            class="latest-thumb"
            href="{{ route('berita.show', ['slug' => $article->slug]) }}"
        >
            <img
                src="{{ $article->image
                    ? asset('storage/' . $article->image)
                    : 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=300&q=80' }}"
                alt="{{ $article->title }}"
                loading="lazy"
            >
        </a>

        <div class="latest-copy">
            <small>
                {{ mb_strtoupper($article->category?->name ?? 'INFORMASI PUBLIK') }}
            </small>

            <h3>
                <a href="{{ route('berita.show', ['slug' => $article->slug]) }}">
                    {{ $article->title }}
                </a>
            </h3>
        </div>
    </article>
@empty
    <p>Belum ada berita yang diterbitkan.</p>
@endforelse


                </div>

                <a href="#article-list" class="latest-more">Lihat semua berita <span>→</span></a>

            </aside>

        </section>

        <!-- DAFTAR ARTIKEL -->

        <section class="articles-section" id="article-list">

            <div class="section-heading">

                <div>

                    <span class="eyebrow">LIPUTAN MAJU DIGITAL</span>

                    <h2>Jelajahi Berita</h2>

                    <p>Semua artikel disusun berdasarkan kategori.</p>

                </div>

                <span class="result-count" id="result-count">Halaman 1</span>

            </div>

            <div class="tools">

                <div class="filters">
                    <button type="button" class="filter-button is-active" data-category="semua">Semua</button>
                    @foreach ($articles->pluck('category')->filter()->unique('id') as $category)
                        <button type="button" class="filter-button" data-category="{{ $category->slug }}">{{ $category->name }}</button>
                    @endforeach
                </div>

                <div class="search-actions">
    <form class="search-form" id="search-form">
        <input
            id="search-input"
            type="search"
            placeholder="Cari berita..."
            aria-label="Cari berita"
        >
        <button type="submit" aria-label="Cari">⌕</button>
    </form>

    <a
        href="{{ route('admin.artikel.index') }}"
        class="manage-articles-link"
    >
        ⚙ Kelola Artikel
    </a>
</div>

            </div>

            <div class="article-grid" id="article-grid"></div>

            <p class="no-results" id="no-results" hidden>

                Tidak ada berita yang sesuai. Coba kata kunci atau kategori lainnya.

            </p>

            <div class="pagination" aria-label="Halaman berita">

                <button type="button" id="prev-page" disabled>← Sebelumnya</button>

                <div id="page-numbers"></div>

                <button type="button" id="next-page">Selanjutnya →</button>

            </div>

        </section>

        <!-- TENTANG KAMI DI BAGIAN PALING BAWAH -->

        <section class="about-section" id="about-us">

            <div class="about-logo">MD</div>

            <div class="about-copy">

                <span class="eyebrow">TENTANG KAMI</span>

                <h2>Mengenal Maju Digital</h2>

                <p>

                    Maju Digital merupakan proyek demonstrasi portal informasi instansi

                    yang dikembangkan untuk menyajikan berita, artikel, dan perkembangan

                    pelayanan publik dalam satu tempat. Portal ini dirancang dengan

                    mengutamakan keterbacaan, struktur informasi yang jelas, serta

                    kemudahan masyarakat menemukan berita berdasarkan topik.

                </p>

                <p class="about-note">

                    Informasi dan artikel yang tampil saat ini merupakan konten contoh untuk pengembangan portofolio.

                </p>

            </div>

        </section>

    </main>

    <footer class="site-footer">

        <div class="wrap footer-inner">

            <span>© 2026 Maju Digital — Proyek demonstrasi portofolio.</span>

            <a href="/">Kembali ke Beranda ↑</a>

        </div>

    </footer>

    <nav class="scroll-dots" aria-label="Posisi halaman">

        <a href="#page-top" class="scroll-dot is-active" data-target="page-top"><span>Atas halaman</span></a>

        <a href="#featured-news" class="scroll-dot" data-target="featured-news"><span>Berita utama</span></a>

        <a href="#article-list" class="scroll-dot" data-target="article-list"><span>Daftar berita</span></a>

        <a href="#about-us" class="scroll-dot" data-target="about-us"><span>Tentang kami</span></a>

    </nav>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /* SLIDER BERITA UTAMA */

            const slides = Array.from(document.querySelectorAll('.hero-slide'));

            const dots = Array.from(document.querySelectorAll('.carousel-dot'));

            const slideCounter = document.getElementById('slide-counter');

            let currentSlide = 0;

            function showSlide(index) {

                currentSlide = (index + slides.length) % slides.length;

                slides.forEach(function (slide, i) {

                    slide.classList.toggle('is-active', i === currentSlide);

                });

                dots.forEach(function (dot, i) {

                    dot.classList.toggle('is-active', i === currentSlide);

                });

                slideCounter.textContent =

                    String(currentSlide + 1).padStart(2, '0') +

                    ' / ' + String(slides.length).padStart(2, '0');

            }

            dots.forEach(function (dot, index) {

                dot.addEventListener('click', function () {

                    showSlide(index);

                });

            });

            document.querySelectorAll('[data-move]').forEach(function (button) {

                button.addEventListener('click', function () {

                    showSlide(currentSlide + Number(button.dataset.move));

                });

            });

            /* NAVIGASI DROPDOWN */

            const navItems = document.querySelectorAll('.nav-item');

            navItems.forEach(function (item) {

                item.addEventListener('mouseenter', function () {

                    navItems.forEach(function (other) {

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

            /* DATA BERITA: DIAMBIL DARI DATABASE LARAVEL */
            const imageList = [
                'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=700&q=80',
                'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=700&q=80',
                'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=700&q=80',
                'https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=700&q=80',
                'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=700&q=80',
                'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=700&q=80'
            ];

            const articles = [
                @foreach ($articles as $article)
                {
                    title: @json($article->title),
                    category: @json($article->category?->slug ?? 'informasi'),
                    label: @json(mb_strtoupper($article->category?->name ?? 'INFORMASI PUBLIK')),
                    date: @json($article->published_at?->format('d M Y') ?? 'BELUM TERBIT'),
                    image: @json($article->image ? asset('storage/' . $article->image) : ''),
                    excerpt: @json($article->excerpt ?? ''),
                   url: @json(route('berita.show', ['slug' => $article->slug]))
                },
                @endforeach
            ];

            articles.forEach(function (article, i) {
                if (!article.image) {
                    article.image = imageList[i % imageList.length];
                }
            });

            const grid = document.getElementById('article-grid');

            const searchInput = document.getElementById('search-input');

            const searchForm = document.getElementById('search-form');

            const filters = document.querySelectorAll('.filter-button');

            const topicButtons = document.querySelectorAll('.topic-button');

            const countLabel = document.getElementById('result-count');

            const noResults = document.getElementById('no-results');

            const prevButton = document.getElementById('prev-page');

            const nextButton = document.getElementById('next-page');

            const pageNumbers = document.getElementById('page-numbers');

            const itemsPerPage = 9;

            let activeCategory = 'semua';

            let currentPage = 1;

            function escapeHTML(value) {

                return String(value).replace(/[&<>"']/g, function (character) {

                    return {

                        '&': '&amp;',

                        '<': '&lt;',

                        '>': '&gt;',

                        '"': '&quot;',

                        "'": '&#039;'

                    }[character];

                });

            }

            function getFilteredArticles() {

                const query = searchInput.value.trim().toLocaleLowerCase('id');

                return articles.filter(function (article) {

                    const matchesCategory =

                        activeCategory === 'semua' ||

                        article.category === activeCategory;

                    const matchesText =

                        !query ||

                        (article.title + ' ' + article.excerpt + ' ' + article.label)

                            .toLocaleLowerCase('id').includes(query);

                    return matchesCategory && matchesText;

                });

            }

            function renderArticles() {

                const results = getFilteredArticles();

                const totalPages = Math.max(1, Math.ceil(results.length / itemsPerPage));

                currentPage = Math.min(currentPage, totalPages);

                const start = (currentPage - 1) * itemsPerPage;

                const visibleArticles = results.slice(start, start + itemsPerPage);

                grid.innerHTML = visibleArticles.map(function (article) {

                    return `

                        <article class="article-card">

                           <a href="${escapeHTML(article.url)}" class="article-image">
                                <img src="${escapeHTML(article.image)}"

                                     alt="${escapeHTML(article.title)}"

                                     loading="lazy">

                            </a>

                            <div class="article-copy">

                                <span class="article-category">${escapeHTML(article.label)}</span>

                                <h3 class="article-title">

                                    <a href="${escapeHTML(article.url)}">${escapeHTML(article.title)}</a>

                                </h3>

                                <p class="article-description">${escapeHTML(article.excerpt)}</p>

                                <div class="article-meta">

                                    <span>${escapeHTML(article.date)}</span>

                                    <span class="sep">•</span>

                                    <span>BERITA MAJU DIGITAL</span>

                                </div>

                            </div>

                        </article>

                    `;

                }).join('');

                countLabel.textContent =

                    'Halaman ' + currentPage + ' dari ' + totalPages +

                    ' · ' + results.length + ' berita';

                noResults.hidden = results.length !== 0;

                pageNumbers.innerHTML = '';

                for (let i = 1; i <= totalPages; i++) {

                    const button = document.createElement('button');

                    button.type = 'button';

                    button.textContent = i;

                    button.className = i === currentPage ? 'page-active' : '';

                    if (i === currentPage) {

                        button.setAttribute('aria-current', 'page');

                    }

                    button.addEventListener('click', function () {

                        currentPage = i;

                        renderArticles();

                        document.getElementById('article-list').scrollIntoView({

                            behavior: 'smooth',

                            block: 'start'

                        });

                    });

                    pageNumbers.appendChild(button);

                }

                prevButton.disabled = currentPage <= 1;

                nextButton.disabled = currentPage >= totalPages;

            }

            function applyCategory(category) {

                activeCategory = category;

                currentPage = 1;

                filters.forEach(function (button) {

                    button.classList.toggle(

                        'is-active',

                        button.dataset.category === category

                    );

                });

                topicButtons.forEach(function (button) {

                    button.classList.toggle(

                        'is-active',

                        button.dataset.topic === category

                    );

                });

                renderArticles();

            }

            filters.forEach(function (button) {

                button.addEventListener('click', function () {

                    applyCategory(button.dataset.category);

                });

            });

            topicButtons.forEach(function (button) {

                button.addEventListener('click', function () {

                    applyCategory(button.dataset.topic);

                });

            });

            document.querySelectorAll('[data-nav-category]').forEach(function (link) {

                link.addEventListener('click', function () {

                    applyCategory(link.dataset.navCategory);

                });

            });

            searchForm.addEventListener('submit', function (event) {

                event.preventDefault();

                currentPage = 1;

                renderArticles();

            });

            searchInput.addEventListener('input', function () {

                currentPage = 1;

                renderArticles();

            });

            prevButton.addEventListener('click', function () {

                if (currentPage > 1) {

                    currentPage--;

                    renderArticles();

                    document.getElementById('article-list').scrollIntoView({

                        behavior: 'smooth',

                        block: 'start'

                    });

                }

            });

            nextButton.addEventListener('click', function () {

                const pages = Math.max(

                    1,

                    Math.ceil(getFilteredArticles().length / itemsPerPage)

                );

                if (currentPage < pages) {

                    currentPage++;

                    renderArticles();

                    document.getElementById('article-list').scrollIntoView({

                        behavior: 'smooth',

                        block: 'start'

                    });

                }

            });

            /* NAVIGASI TITIK SCROLL */

            const scrollDots = document.querySelectorAll('.scroll-dot');

            const trackedSections = Array.from(scrollDots).map(function (dot) {

                return document.getElementById(dot.dataset.target);

            }).filter(Boolean);

            function updateDots() {

                const marker = window.scrollY + window.innerHeight * .38;

                let active = trackedSections[0];

                trackedSections.forEach(function (section) {

                    const top = section.id === 'page-top'

                        ? 0

                        : section.getBoundingClientRect().top + window.scrollY;

                    if (top <= marker) active = section;

                });

                scrollDots.forEach(function (dot) {

                    dot.classList.toggle(

                        'is-active',

                        dot.dataset.target === active.id

                    );

                });

            }

            window.addEventListener('scroll', updateDots, { passive: true });

            window.addEventListener('resize', updateDots);

            renderArticles();

            showSlide(0);

            updateDots();

        });

    </script>

</body>

</html>
