@extends('layouts.app')

@section('title', 'Pendaftaran Kursus - KursusKu')

@section('content')

<section class="enrollment-page">

    <div class="enrollment-wrapper">

        <!-- BAGIAN INFORMASI -->
        <div class="enrollment-intro">

            <span class="enrollment-kicker">
                — YOUR LEARNING JOURNEY —
            </span>

            <h1>
                Langkah Awal
                Menuju <em>Masa Depan.</em>
            </h1>

            <p>
                Setiap keterampilan baru membuka peluang
                yang lebih luas. Mulailah perjalanan
                belajarmu bersama KursusKu.
            </p>

            <div class="enrollment-benefits">

                <div class="enrollment-benefit">
                    <span class="enrollment-benefit-icon">✓</span>
                    Materi pembelajaran terstruktur
                </div>

                <div class="enrollment-benefit">
                    <span class="enrollment-benefit-icon">✓</span>
                    Pilihan kursus keterampilan digital
                </div>

                <div class="enrollment-benefit">
                    <span class="enrollment-benefit-icon">✓</span>
                    Proses pendaftaran yang mudah
                </div>

            </div>

        </div>

        <!-- BAGIAN FORMULIR -->
        <div class="enrollment-form-area">

            <span class="enrollment-kicker">
                FORMULIR PENDAFTARAN
            </span>

            <h2>Mulai Belajar</h2>

            <p class="enrollment-subtitle">
                Pilih identitas peserta dan kursus
                yang ingin kamu ikuti.
            </p>

            <!-- NOTIFIKASI BERHASIL -->
            @if (session('success'))

                <div class="alert alert-success rounded-4 p-3 mb-4">
                    <strong>✓ Berhasil!</strong>
                    {{ session('success') }}

                    <div class="mt-2">
                        <a href="{{ route('enrollments.index') }}">
                            Lihat laporan pendaftaran
                        </a>
                    </div>
                </div>

            @endif

            <!-- NOTIFIKASI ERROR -->
            @if ($errors->any())

                <div class="alert alert-danger rounded-4 p-3 mb-4">

                    <strong>Periksa kembali data:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif

            <!-- FORM PENDAFTARAN -->
            <form
                method="POST"
                action="{{ route('enrollments.store') }}"
            >

                @csrf

                <!-- PILIH PESERTA -->
                <div class="mb-4">

                    <label
                        for="participant_id"
                        class="form-label"
                    >
                        Nama Peserta
                    </label>

                    <select
                        id="participant_id"
                        name="participant_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            -- Pilih Peserta --
                        </option>

                        @foreach ($participants as $participant)

                            <option
                                value="{{ $participant->id }}"
                                @selected(old('participant_id') == $participant->id)
                            >
                                {{ $participant->name }}
                                ({{ $participant->email }})
                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- PILIH KURSUS -->
                <div class="mb-4">

                    <label
                        for="course_id"
                        class="form-label"
                    >
                        Pilih Kursus
                    </label>

                    <select
                        id="course_id"
                        name="course_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            -- Pilih Kursus --
                        </option>

                        @foreach ($courses as $course)

                            <option
                                value="{{ $course->id }}"
                                @selected(old('course_id') == $course->id)
                            >
                                {{ $course->name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- INFORMASI STATUS -->
                <div class="alert alert-secondary enrollment-availability">

                    Status pendaftaran akan otomatis disimpan
                    sebagai <strong>registered</strong>.

                </div>

                <!-- TOMBOL SIMPAN -->
                <button
                    type="submit"
                    class="enrollment-submit"
                >
                    Daftarkan Peserta →
                </button>

                <p class="enrollment-note">

                    Pastikan peserta dan kursus yang dipilih
                    sudah benar sebelum mengirim pendaftaran.

                </p>

            </form>

        </div>

    </div>

</section>

@endsection
