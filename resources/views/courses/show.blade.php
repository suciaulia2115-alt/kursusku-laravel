
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Kursus | KursusKu</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --mocha-dark: #38271f;
            --mocha: #594438;
            --mocha-medium: #80634f;
            --gold: #c69b61;
            --gold-light: #ead4ae;
            --cream: #f8f3eb;
            --ivory: #fffdf9;
            --text: #49382e;
            --muted: #8a796c;
            --border: #eadfd1;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
        }

        /* NAVBAR */
        .navbar {
            background: var(--mocha-dark);
            box-shadow: 0 8px 25px rgba(56, 39, 31, 0.12);
        }

        .nav-inner {
            min-height: 90px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #fffaf2;
            font-size: 25px;
            font-weight: 700;
        }

        .brand-mark {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border: 1px solid var(--gold);
            border-radius: 13px;
            color: var(--gold-light);
            font-family: 'Playfair Display', serif;
            font-size: 25px;
        }

        .brand-gold {
            color: var(--gold-light);
        }

        .navbar .nav-button {
            color: #f8eade;
        }

        .navbar .course-button {
            color: var(--mocha-dark);
            background: linear-gradient(135deg, #f1d9ad, #c69b61);
            border-radius: 10px;
            padding: 12px 18px;
            font-weight: 700;
        }

        /* MAIN */
        .detail-section {
            min-height: 85vh;
            padding: 65px 0 85px;
            background:
                radial-gradient(circle at top right, #ead9c5 0, transparent 32%),
                linear-gradient(135deg, #fbf7f0, #f0e5d7);
        }

        .detail-container {
            width: min(1150px, 90%);
            margin: auto;
        }

        /* BREADCRUMB */
        .breadcrumb-custom {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 25px;
            color: var(--muted);
            font-size: 13px;
        }

        .breadcrumb-custom a {
            color: var(--mocha-medium);
            font-weight: 600;
        }

        /* HEADER */
        .detail-heading {
            margin-bottom: 30px;
        }

        .detail-kicker {
            display: inline-block;
            margin-bottom: 12px;
            color: #a27a48;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .detail-heading h1 {
            margin: 0;
            color: var(--mocha-dark);
            font-family: 'Playfair Display', serif;
            font-size: clamp(32px, 5vw, 46px);
            font-weight: 700;
        }

        .detail-heading p {
            margin-top: 12px;
            color: var(--muted);
            font-size: 15px;
        }

        /* DETAIL CARD */
        .detail-card {
            overflow: hidden;
            background: var(--ivory);
            border: 1px solid var(--border);
            border-radius: 24px;
            box-shadow: 0 22px 60px rgba(79, 55, 38, 0.10);
        }

        .detail-card-header {
            position: relative;
            padding: 35px 40px;
            background:
                radial-gradient(circle at 90% 20%, rgba(229, 194, 139, 0.22), transparent 28%),
                linear-gradient(120deg, #38271f, #594438, #765a43);
            color: white;
        }

        .detail-card-header::after {
            content: "";
            position: absolute;
            right: -35px;
            bottom: -100px;
            width: 230px;
            height: 230px;
            border: 1px solid rgba(234, 212, 174, 0.25);
            border-radius: 50%;
        }

        .header-label {
            color: var(--gold-light);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .detail-card-header h2 {
            position: relative;
            z-index: 1;
            margin: 12px 0;
            font-family: 'Playfair Display', serif;
            font-size: clamp(25px, 4vw, 34px);
        }

        .course-code {
            display: inline-block;
            padding: 7px 13px;
            border: 1px solid rgba(234, 212, 174, 0.45);
            border-radius: 30px;
            color: var(--gold-light);
            font-size: 12px;
            letter-spacing: 1px;
        }

        .detail-card-body {
            padding: 38px 40px;
        }

        .section-title {
            margin-bottom: 25px;
            color: var(--mocha-dark);
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 700;
        }

        /* INFORMATION GRID */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .info-item {
            min-height: 105px;
            padding: 20px;
            background: #fbf7f1;
            border: 1px solid #eee3d6;
            border-radius: 15px;
            transition: 0.25s ease;
        }

        .info-item:hover {
            transform: translateY(-3px);
            border-color: #d9bd94;
            box-shadow: 0 8px 20px rgba(79, 55, 38, 0.07);
        }

        .info-label {
            display: block;
            margin-bottom: 10px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .info-value {
            display: block;
            color: var(--mocha-dark);
            font-size: 16px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .description-item {
            grid-column: 1 / -1;
            min-height: 100px;
        }

        .fee-value {
            color: #a4773d;
            font-size: 21px;
        }

        /* STATUS */
        .status-label {
            display: inline-block;
            padding: 7px 15px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-open {
            background: #e5f1e7;
            color: #3c7650;
        }

        .status-draft {
            background: #f8edd9;
            color: #9b7132;
        }

        .status-closed {
            background: #f6e3e1;
            color: #a74c45;
        }

        /* ACTIONS */
        .detail-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 13px;
            margin-top: 35px;
            padding-top: 28px;
            border-top: 1px solid var(--border);
        }

        .btn-edit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 13px 25px;
            border: none;
            border-radius: 11px;
            background: linear-gradient(135deg, #d9b47c, #b8894e);
            color: #38271f;
            font-weight: 700;
            text-decoration: none;
            transition: 0.25s ease;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(184, 137, 78, 0.25);
            color: #38271f;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 13px 25px;
            border: 1px solid #d8c8b7;
            border-radius: 11px;
            background: white;
            color: var(--mocha);
            font-weight: 700;
            text-decoration: none;
            transition: 0.25s ease;
        }

        .btn-back:hover {
            background: var(--mocha-dark);
            color: white;
        }

        /* FOOTER */
        .footer {
            padding: 30px 0;
            background: var(--mocha-dark);
            color: #f8eade;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .footer strong {
            color: var(--gold-light);
            font-size: 20px;
        }

        .footer p {
            margin: 0;
            color: #d8c7b8;
            font-size: 13px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .nav-inner {
                flex-wrap: wrap;
                padding: 15px 0;
            }

            .detail-section {
                padding: 40px 0 60px;
            }

            .detail-card-header {
                padding: 28px 23px;
            }

            .detail-card-body {
                padding: 25px 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .description-item {
                grid-column: auto;
            }

            .detail-actions {
                flex-direction: column;
            }

            .detail-actions a {
                width: 100%;
            }

            .footer-inner {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="container nav-inner">

        <a href="{{ route('home') }}" class="brand">
            <span class="brand-mark">K</span>
            <span>Kursus<span class="brand-gold">Ku</span></span>
        </a>

        <div class="d-flex align-items-center gap-3 flex-wrap">
            <a href="{{ route('home') }}" class="nav-button">
                Beranda
            </a>

            <a href="{{ route('courses.index') }}" class="nav-button">
                Kelola Kursus
            </a>

            <a href="{{ route('courses.create') }}" class="course-button">
                + Tambah Kursus
            </a>
        </div>

    </div>
</nav>


<!-- DETAIL SECTION -->
<section class="detail-section">

    <div class="detail-container">

        <!-- BREADCRUMB -->
        <div class="breadcrumb-custom">
            <a href="{{ route('home') }}">Beranda</a>
            <span>/</span>
            <a href="{{ route('courses.index') }}">Daftar Kursus</a>
            <span>/</span>
            <span>Detail</span>
        </div>


        <!-- PAGE HEADING -->
        <div class="detail-heading">

            <span class="detail-kicker">
                KURSUSKU MANAGEMENT
            </span>

            <h1>Informasi Kursus</h1>

            <p>
                Kenali lebih lengkap informasi dan fasilitas kursus pilihanmu.
            </p>

        </div>


        <!-- DETAIL CARD -->
        <div class="detail-card">

            <!-- CARD HEADER -->
            <div class="detail-card-header">

                <span class="header-label">
                    COURSE INFORMATION
                </span>

                <h2>{{ $course->name }}</h2>

                <span class="course-code">
                    KODE: {{ $course->code }}
                </span>

            </div>


            <!-- CARD BODY -->
            <div class="detail-card-body">

                <h3 class="section-title">
                    Informasi Lengkap
                </h3>

                <div class="info-grid">

                    <!-- KODE -->
                    <div class="info-item">
                        <span class="info-label">Kode Kursus</span>
                        <span class="info-value">
                            {{ $course->code }}
                        </span>
                    </div>

                    <!-- NAMA -->
                    <div class="info-item">
                        <span class="info-label">Nama Kursus</span>
                        <span class="info-value">
                            {{ $course->name }}
                        </span>
                    </div>

                    <!-- DESKRIPSI -->
                    <div class="info-item description-item">
                        <span class="info-label">Deskripsi Kursus</span>
                        <span class="info-value">
                            {{ $course->description ?: 'Belum ada deskripsi kursus.' }}
                        </span>
                    </div>

                    <!-- BIAYA -->
                    <div class="info-item">
                        <span class="info-label">Biaya Kursus</span>
                        <span class="info-value fee-value">
                            Rp {{ number_format($course->fee, 0, ',', '.') }}
                        </span>
                    </div>

                    <!-- KUOTA -->
                    <div class="info-item">
                        <span class="info-label">Kuota Peserta</span>
                        <span class="info-value">
                            {{ $course->quota }} Peserta
                        </span>
                    </div>

                    <!-- TANGGAL -->
                    <div class="info-item">
                        <span class="info-label">Tanggal Mulai</span>
                        <span class="info-value">
                            {{ $course->start_date->format('d F Y') }}
                        </span>
                    </div>

                    <!-- STATUS -->
                    <div class="info-item">
                        <span class="info-label">Status Kursus</span>

                        <span class="info-value">
                            <span class="status-label status-{{ $course->status }}">
                                {{ ucfirst($course->status) }}
                            </span>
                        </span>
                    </div>

                </div>


                <!-- BUTTON ACTIONS -->
                <div class="detail-actions">

                    <a href="{{ route('courses.edit', $course->id) }}"
                       class="btn-edit">
                        Edit Informasi Kursus
                    </a>

                    <a href="{{ route('courses.index') }}"
                       class="btn-back">
                        ← Kembali ke Daftar Kursus
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- FOOTER -->
<footer class="footer">

    <div class="container footer-inner">

        <strong>KursusKu</strong>

        <p>
            © {{ date('Y') }} KursusKu. All Rights Reserved.
        </p>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
