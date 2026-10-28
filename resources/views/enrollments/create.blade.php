
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
            
@if (session('registration_result'))

    @php
        $result = session('registration_result');
    @endphp

    <div class="alert alert-success rounded-4 p-4 mb-4">

        <h4 class="fw-bold mb-3">
            ✓ Hasil Pendaftaran
        </h4>

        <p class="mb-2">
            <strong>Nama:</strong>
            {{ $result['name'] }}
        </p>

        <p class="mb-2">
            <strong>Email:</strong>
            {{ $result['email'] }}
        </p>

        <p class="mb-2">
            <strong>Kursus:</strong>
            {{ $result['course'] }}
        </p>

        <hr>

        <p class="mb-0">
            Formulir berhasil divalidasi.
            Data belum disimpan ke database.
        </p>

    </div>

@endif


            <span class="enrollment-kicker">
                FORMULIR PENDAFTARAN
            </span>

            <h2>Mulai Belajar</h2>

            <p class="enrollment-subtitle">
                Isi informasi berikut untuk memilih
                kursus yang ingin kamu ikuti.
            </p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Periksa kembali data:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST"
                  action="{{ route('enrollments.preview') }}">

                @csrf

                <!-- NAMA -->
                <div class="mb-4">
                    <label for="name" class="form-label">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        placeholder="Masukkan nama lengkap"
                        value="{{ old('name') }}"
                        required
                    >
                </div>

                <!-- EMAIL -->
                <div class="mb-4">
                    <label for="email" class="form-label">
                        Alamat Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        placeholder="nama@email.com"
                        value="{{ old('email') }}"
                        required
                    >
                </div>

                <!-- PILIH KURSUS -->
                <div class="mb-3">
                    <label for="course_id" class="form-label">
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

                        @foreach ($courses as $id => $course)
                            <option
                                value="{{ $id }}"
                                @selected(old('course_id') == $id)
                            >
                                {{ $course['name'] }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- HASIL AJAX -->
                <div
                    id="availability"
                    class="alert alert-secondary enrollment-availability"
                >
                    Pilih kursus untuk melihat sisa kursi.
                </div>

                <!-- TOMBOL -->
                <button
                    type="submit"
                    class="enrollment-submit"
                >
                    Kirim Pendaftaran →
                </button>

                <p class="enrollment-note">
                    Data formulir akan divalidasi sebelum
                    proses pendaftaran dilanjutkan.
                </p>

            </form>

        </div>

    </div>

</section>

@endsection
