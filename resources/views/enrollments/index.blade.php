
@extends('layouts.app')

@section('title', 'Laporan Pendaftaran - KursusKu')

@section('content')

<section class="container py-5">

    <!-- HEADER -->
    <div class="mb-4">

        <span class="enrollment-kicker">
            — KURSUSKU REPORT —
        </span>

        <h1 class="fw-bold mt-2">
            Laporan Pendaftaran
        </h1>

        <p class="text-muted">
            Daftar peserta yang telah terdaftar pada kursus KursusKu.
        </p>

    </div>

    <!-- NOTIFIKASI -->
    @if (session('success'))
        <div class="alert alert-success rounded-4">
            ✓ {{ session('success') }}
        </div>
    @endif

    <!-- TOMBOL -->
    <div class="mb-4">
        <a href="{{ route('enrollments.create') }}"
           class="enrollment-submit text-decoration-none d-inline-block">
            + Tambah Pendaftaran
        </a>
    </div>

    <!-- TABEL LAPORAN -->
    <div class="table-responsive shadow-sm rounded-4">

        <table class="table table-hover align-middle mb-0">

            <thead class="table-light">
                <tr>
                    <th>No.</th>
                    <th>Nama Peserta</th>
                    <th>Email</th>
                    <th>Nama Kursus</th>
                    <th>Tanggal Mulai</th>
                    <th>Status Pendaftaran</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($enrollments as $enrollment)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td class="fw-semibold">
                            {{ $enrollment->participant->name }}
                        </td>

                        <td>
                            {{ $enrollment->participant->email }}
                        </td>

                        <td>
                            {{ $enrollment->course->name }}
                        </td>

                        <td>
                            @if ($enrollment->course->start_date)
                                {{ \Carbon\Carbon::parse($enrollment->course->start_date)->format('d-m-Y') }}
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            <span class="badge bg-success rounded-pill px-3 py-2">
                                {{ $enrollment->status }}
                            </span>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center py-5">

                            <h5 class="fw-bold">
                                Belum Ada Pendaftaran
                            </h5>

                            <p class="text-muted mb-0">
                                Data pendaftaran peserta akan muncul di sini.
                            </p>

                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</section>

@endsection
