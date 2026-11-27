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

                <!-- BERANDA -->
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                   href="{{ route('home') }}">
                    Beranda
                </a>

                <!-- KURSUS -->
                <a class="nav-link"
                   href="{{ route('home') }}#kursus">
                    Kursus
                </a>

                <!-- COURSE -->
                <a class="nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }}"
                   href="{{ route('courses.index') }}">
                    Course
                </a>

                <!-- TENTANG -->
                <a class="nav-link"
                   href="{{ route('home') }}#tentang">
                    Tentang
                </a>

                <!-- PENDAFTARAN -->
                <a class="nav-link"
                   href="{{ url('/pendaftaran') }}">
                    Pendaftaran
                </a>

                <!-- PROFIL: SELALU DITAMPILKAN -->
                <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}"
                   href="{{ route('profile') }}">
                    Profil
                </a>

            </div>
        </nav>

        <!-- TOMBOL AKSI -->
        <div class="nav-actions">

            @guest
                <!-- LOGIN -->
                <a class="nav-login-button d-none d-lg-inline-flex"
                   href="{{ route('login') }}">
                    Login
                </a>
            @else
                <!-- LOGOUT -->
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

            <!-- MULAI BELAJAR -->
            <a class="nav-button d-none d-lg-inline-flex"
               href="{{ route('courses.create') }}">
                Mulai Belajar
                <span aria-hidden="true">→</span>
            </a>

        </div>

    </div>
</header>
