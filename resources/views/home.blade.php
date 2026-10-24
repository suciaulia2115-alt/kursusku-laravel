<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $siteName }} | Premium Learning</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="beranda">
    <header class="navbar">
        <div class="container nav-inner">
            <a href="{{ route('home') }}" class="brand" aria-label="KursusKu Beranda">
                <span class="brand-mark">K</span>
                <span>Kursus<span class="brand-gold">Ku</span></span>
            </a>
            <nav class="nav-links" aria-label="Navigasi utama">
                <a class="nav-link active" href="{{ route('home') }}" >Beranda</a>
                <a class="nav-link" href="#kursus">Kursus</a>
                <a class="nav-link" href="#tentang">Tentang</a>
            </nav>
            <a class="nav-button" href="#kursus">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="m2 9 10-5 10 5-10 5L2 9Z"/><path d="M6 11v6c4 3 8 3 12 0v-6M22 9v8"/></svg>
                Mulai Belajar <span aria-hidden="true">→</span>
            </a>
        </div>
    </header>

    <main>
        <section class="hero" aria-labelledby="hero-title">
            <div class="container hero-inner">
                <div class="hero-copy">
                    <p class="eyebrow">— THE ART OF LEARNING —</p>
                    <h1 id="hero-title">Investasi Terbaik Adalah <em>Dirimu.</em></h1>
                    <p class="hero-description">Temukan pengalaman belajar digital yang lebih bermakna. Asah keterampilan, perluas wawasan, dan persiapkan masa depanmu bersama KursusKu.</p>
                    <div class="hero-actions">
                        <a href="#kursus" class="cta cta-primary">▣ &nbsp; Jelajahi Kursus <span aria-hidden="true">→</span></a>
                        <a href="#tentang" class="cta cta-secondary">♧ &nbsp; Kenali KursusKu</a>
                    </div>
                    <div class="benefits">
                        <div class="benefit"><span class="benefit-icon">▤</span><span><strong>Kursus Berkualitas</strong><small>Materi terstruktur</small></span></div>
                        <div class="benefit"><span class="benefit-icon">♜</span><span><strong>Instruktur Profesional</strong><small>Belajar dari ahli</small></span></div>
                        <div class="benefit"><span class="benefit-icon">▥</span><span><strong>Sertifikat Resmi</strong><small>Tingkatkan kariermu</small></span></div>
                    </div>
                </div>
                <div class="hero-visual">
                    {{-- Pilih gambar JPG jika tersedia, jika tidak gunakan PNG --}}
                    @php
                        $heroFile = file_exists(public_path('images/hero-kursus.jpg'))
                            ? 'images/hero-kursus.jpg'
                            : (file_exists(public_path('images/hero-kursus.png')) ? 'images/hero-kursus.png' : null);
                    @endphp
                    @if ($heroFile)
                        <img class="hero-image" src="{{ asset($heroFile) }}" alt="Ilustrasi belajar bersama KursusKu">
                    @else
                        <div class="hero-image-fallback">KursusKu<br>Belajar • Berkembang • Sukses</div>
                    @endif
                </div>
            </div>
        </section>

        <section id="kursus" class="courses-section">
            <div class="container">
                <div class="section-heading">
                    <span class="section-kicker">PILIHAN BELAJAR</span>
                    <h2>Kursus Unggulan</h2>
                    <p>Temukan materi yang sesuai dengan minat dan kebutuhanmu.</p>
                </div>
                <div class="courses">
                    @foreach ($featured as $course)
                        <article class="course-card">
                            <span class="course-code">{{ $course['code'] }}</span>
                            <h3>{{ $course['name'] }}</h3>
                            <p>{{ $course['description'] }}</p>
                            <a class="course-link" href="#tentang">Pelajari lebih lanjut →</a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="tentang" class="about-section">
            <div class="container about-inner">
                <span class="section-kicker">TENTANG KAMI</span>
                <h2>Belajar Lebih Nyaman Bersama KursusKu</h2>
                <p>KursusKu menghadirkan pengalaman belajar yang terstruktur, fleksibel, dan mudah diakses untuk membantu mengembangkan keterampilan digital.</p>
                <a href="#kursus" class="cta cta-primary">Lihat Kursus →</a>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-inner">
            <strong>Kursus<span style="color:#d6a65f">Ku</span></strong>
            <p>© {{ date('Y') }} KursusKu. Belajar • Berkembang • Sukses.</p>
            <a href="{{ route('home') }}">Kembali ke atas ↑</a>
        </div>
    </footer>
</body>
</html>
