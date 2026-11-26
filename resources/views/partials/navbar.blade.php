<header class="navbar navbar-expand-lg">
    <div class="container nav-inner">

        <!-- LOGO KURSUSKU -->
        <a href="{{ route('home') }}"
           class="brand"
           aria-label="KursusKu Beranda">

            <span class="brand-mark">K</span>

            <span>
                Kursus<span class="brand-gold">Ku</span>
            </span>
        </a>

        <!-- TOMBOL MENU HP -->
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

        <!-- MENU NAVIGASI -->
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
                   href="{{ route('courses.index') }}">
                    Course
                </a>

                <a class="nav-link"
                   href="{{ route('home') }}#tentang">
                    Tentang
                </a>

                <a class="nav-link"
                   href="{{ url('/pendaftaran') }}">
                    Pendaftaran
                </a>

                @auth
                    <a class="nav-link"
                       href="{{ route('profile') }}">
                        Profil
                    </a>
                @endauth

            </div>
        </nav>

        <!-- TOMBOL LOGIN, PROFIL, LOGOUT DAN MULAI BELAJAR -->
        <div class="nav-actions">

            @guest
                <a class="nav-login-button d-none d-lg-inline-flex"
                   href="{{ route('login') }}">
                    Login
                </a>
            @else
                <a class="nav-login-button d-none d-lg-inline-flex"
                   href="{{ route('profile') }}">
                    Profil
                </a>

                <form action="{{ route('logout') }}"
                      method="POST"
                      class="d-none d-lg-inline-flex">
                    @csrf

                    <button type="submit"
                            class="nav-login-button border-0">
                        Logout
                    </button>
                </form>
            @endguest

            <a class="nav-button d-none d-lg-inline-flex"
               href="{{ route('courses.create') }}">
                Mulai Belajar
                <span aria-hidden="true">→</span>
            </a>

        </div>

    </div>
</header>
