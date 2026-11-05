
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus | KursusKu</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="container nav-inner">

        <a href="{{ route('home') }}" class="brand">
            <span class="brand-mark">K</span>
            <span>Kursus<span class="brand-gold">Ku</span></span>
        </a>

        <div class="d-flex align-items-center gap-3">
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


<!-- DAFTAR KURSUS -->
<section class="course-management">
    <div class="container">

        <!-- HEADER -->
        <div class="course-header">
            <div>
                <span class="section-kicker">
                    KURSUSKU MANAGEMENT
                </span>

                <h1>Daftar Kursus</h1>

                <p>
                    Kelola informasi dan data kursus yang tersedia.
                </p>
            </div>

            <a href="{{ route('courses.create') }}" class="course-button">
                + Tambah Kursus
            </a>
        </div>


        <!-- PESAN BERHASIL -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <!-- TABEL KURSUS -->
        <div class="course-panel">
            <div class="table-responsive">

                <table class="course-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Kursus</th>
                            <th>Deskripsi</th>
                            <th>Biaya</th>
                            <th>Kuota</th>
                            <th>Tanggal Mulai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($courses as $course)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $course->code }}
                                </td>

                                <td>
                                    {{ $course->name }}
                                </td>

                                <td>
                                    {{ $course->description ?? '-' }}
                                </td>

                                <td>
                                    Rp {{ number_format($course->fee, 0, ',', '.') }}
                                </td>

                                <td>
                                    {{ $course->quota }}
                                </td>

                                <td>
                                    {{ $course->start_date->format('d-m-Y') }}
                                </td>

                                <td>
                                    <span class="course-badge {{ $course->status }}">
                                        {{ ucfirst($course->status) }}
                                    </span>
                                </td>

                                <!-- AKSI DETAIL, EDIT DAN HAPUS -->
                                <td>
                                    <div class="d-flex gap-2">

                                        <!-- DETAIL -->
                                        <a href="{{ route('courses.show', $course->id) }}"
                                           class="btn btn-sm btn-outline-secondary">
                                            Detail
                                        </a>

                                        <!-- EDIT -->
                                        <a href="{{ route('courses.edit', $course->id) }}"
                                           class="btn btn-sm btn-outline-warning">
                                            Edit
                                        </a>

                                        <!-- HAPUS -->
                                        <form action="{{ route('courses.destroy', $course->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Apakah kamu yakin ingin menghapus kursus ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="9" class="course-empty">
                                    Belum ada data kursus.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

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


<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
