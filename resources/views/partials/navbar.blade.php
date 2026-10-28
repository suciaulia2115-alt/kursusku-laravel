
<header class="navbar navbar-expand-lg">
    <div class="container nav-inner">
        <a href="{{ route('home') }}"
           class="brand"
           aria-label="KursusKu Beranda">

            <span class="brand-mark">K</span>

            <span>
                Kursus<span class="brand-gold">Ku</span>
            </span>
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar"
            aria-controls="mainNavbar"
            aria-expanded="false"
            aria-label="Buka menu navigasi">

            <span class="navbar-toggler-icon"></span>
        </button>

        <nav id="mainNavbar"
             class="collapse navbar-collapse kursusku-menu"
             aria-label="Navigasi utama">

            <div class="nav-links ms-lg-auto">
                <a class="nav-link active"
                   href="{{ route('home') }}">
                    Beranda
                </a>

                <a class="nav-link"
                   href="{{ route('home') }}#kursus">
                    Kursus
                </a>

                <a class="nav-link"
                   href="{{ route('home') }}#tentang">
                    Tentang
                </a>

                <a class="nav-link"
                   href="{{ url('/pendaftaran') }}">
                    Pendaftaran
                </a>
            </div>
        </nav>

        <a class="nav-button d-none d-lg-inline-flex"
           href="{{ route('home') }}#kursus">
            Mulai Belajar
            <span aria-hidden="true">→</span>
        </a>
    </div>
</header>
