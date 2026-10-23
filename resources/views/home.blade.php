<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $siteName }} | Premium Learning</title>

    <meta name="description" content="Kembangkan kemampuan digital bersama KursusKu.">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="ambient ambient-one"></div>
    <div class="ambient ambient-two"></div>

    <header class="navbar">
        <div class="container nav-inner">
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-mark">K</span>
                <span>Kursus<span class="brand-gold">Ku</span></span>
            </a>

            <nav class="nav-links">
                <a href="#beranda" class="nav-link active">Beranda</a>
                <a href="#kursus" class="nav-link">Kursus</a>
                <a href="#tentang" class="nav-link">Tentang</a>
            </nav>

            <a href="#kursus" class="nav-button">
                Mulai Belajar <span>↗</span>
            </a>
        </div>
    </header>

    <main>
        <section class="hero container" id="beranda">
            <div class="hero-content">
                <div class="eyebrow">
                    <span class="eyebrow-line"></span>
                    <span>THE ART OF LEARNING</span>
                    <span class="eyebrow-line"></span>
                </div>

                <h1>
                    Investasi Terbaik<br>
                    Adalah <span class="gold-text">Dirimu.</span>
                </h1>

                <p class="hero-description">
                    Temukan pengalaman belajar digital yang lebih bermakna.
                    Asah keterampilan, perluas wawasan, dan persiapkan
                    masa depanmu bersama KursusKu.
                </p>

                <div class="hero-actions">
                    <a href="#kursus" class="button-primary">
                        Jelajahi Kursus <span>↗</span>
                    </a>

                    <a href="#tentang" class="button-secondary">
                        Kenali KursusKu
                    </a>
                </div>

                <div class="hero-note">
                    <span class="note-dot"></span>
                    Belajar dengan tujuan. Berkembang dengan percaya diri.
                </div>
            </div>
            <div class="hero-image">
    <img
        src="{{ asset('images/hero-kursus.png') }}"
        alt="Suasana belajar digital KursusKu"
    >   
            </div>
            <div class="hero-decoration" aria-hidden="true">
                <div class="orbit orbit-one"></div>
                <div class="orbit orbit-two"></div>
                <div class="orbit orbit-three"></div>
                <div class="orbit-core">
                    <span class="core-k">K</span>
                    <span class="core-caption">LEARN · GROW · EXCEL</span>
                </div>
                <span class="spark spark-one">✦</span>
                <span class="spark spark-two">✧</span>
                <span class="spark spark-three">✦</span>
            </div>

            <div class="hero-bottom-line">
                <span>KNOWLEDGE IS YOUR GREATEST ASSET</span>
                <span>EST. KURSUSKU</span>
            </div>
        </section>

        <section class="courses-section" id="kursus">
            <div class="container">
                <div class="section-heading">
                    <div>
                        <span class="section-kicker">PILIH JALUR BELAJARMU</span>
                        <h2>Kursus <span class="gold-text">Unggulan.</span></h2>
                    </div>

                    <p>
                        Langkah kecil hari ini, kemampuan besar di masa depan.
                    </p>
                </div>

                <div class="courses">
                    @foreach ($featured as $course)
                        <article class="course-card">
                            <div class="card-top">
                                <span class="course-code">
                                    {{ $course['code'] }}
                                </span>
                                <span class="card-arrow">↗</span>
                            </div>

                            <div class="card-symbol" aria-hidden="true">
                                @if ($course['code'] === 'WEB-01')
                                    &lt;/&gt;
                                @elseif ($course['code'] === 'PHP-01')
                                    { }
                                @else
                                    ✧
                                @endif
                            </div>

                            <h3>{{ $course['name'] }}</h3>

                            <p>{{ $course['description'] }}</p>

                            <a href="#tentang" class="course-link">
                                Kenali Materi <span>→</span>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="about-section" id="tentang">
            <div class="container about-inner">
                <span class="section-kicker">LEARN WITH PURPOSE</span>

                <h2>
                    Bukan sekadar belajar.<br>
                    <span class="gold-text">Saatnya bertumbuh.</span>
                </h2>

                <p>
                    KursusKu hadir sebagai ruang untuk membangun pengetahuan
                    dan keterampilan digital secara bertahap, terarah,
                    dan berkelanjutan.
                </p>

                <a href="#kursus" class="button-primary">
                    Temukan Kursusmu <span>↗</span>
                </a>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-inner">
            <a href="{{ route('home') }}" class="brand footer-brand">
                <span class="brand-mark">K</span>
                <span>Kursus<span class="brand-gold">Ku</span></span>
            </a>

            <p>
                &copy; {{ date('Y') }} {{ $siteName }}.
                Belajar, bertumbuh, dan melangkah lebih jauh.
            </p>

            <a href="#beranda" class="back-top">Kembali ke atas ↑</a>
        </div>
    </footer>

</body>
</html>
