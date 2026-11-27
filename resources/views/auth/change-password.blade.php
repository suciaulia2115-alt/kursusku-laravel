@extends('layouts.app')

@section('title', 'Ubah Password - KursusKu')

@section('content')

<style>
    .password-page {
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 55px 20px;
        background:
            radial-gradient(circle at top left, #eadbc9 0, transparent 38%),
            linear-gradient(135deg, #f8f3ed, #eee2d5, #f7f0e8);
    }

    .password-card {
        width: 100%;
        max-width: 470px;
        padding: 42px 38px;
        background: rgba(255, 252, 247, 0.96);
        border: 1px solid #e5d4c1;
        border-radius: 25px;
        box-shadow: 0 18px 50px rgba(75, 48, 31, 0.13);
    }

    .password-icon {
        width: 76px;
        height: 76px;
        margin: 0 auto 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 23px;
        background: linear-gradient(145deg, #684936, #38251d);
        color: #f4d9a5;
        font-size: 32px;
        box-shadow: 0 8px 20px rgba(67, 42, 29, 0.22);
    }

    .password-heading {
        color: #493225;
        font-size: 28px;
        font-weight: 750;
        text-align: center;
        margin-bottom: 10px;
    }

    .password-description {
        color: #897466;
        font-size: 14px;
        line-height: 1.7;
        text-align: center;
        margin-bottom: 28px;
    }

    .password-label {
        display: block;
        color: #5a4030;
        font-size: 14px;
        font-weight: 650;
        margin-bottom: 9px;
    }

    .password-input {
        width: 100%;
        padding: 13px 15px;
        border: 1px solid #dfcbbb;
        border-radius: 12px;
        background: #fffdf9;
        color: #493225;
        outline: none;
        transition: 0.25s;
    }

    .password-input:focus {
        border-color: #a77b52;
        box-shadow: 0 0 0 3px rgba(167, 123, 82, 0.13);
    }

    .password-group {
        margin-bottom: 21px;
    }

    .password-submit {
        width: 100%;
        padding: 14px;
        margin-top: 7px;
        border: none;
        border-radius: 12px;
        background: linear-gradient(135deg, #76543c, #493024);
        color: #fff8ed;
        font-size: 15px;
        font-weight: 700;
        letter-spacing: 0.3px;
        cursor: pointer;
        box-shadow: 0 7px 17px rgba(73, 48, 36, 0.2);
        transition: 0.25s;
    }

    .password-submit:hover {
        transform: translateY(-2px);
        background: linear-gradient(135deg, #8a6549, #5a3a29);
        box-shadow: 0 10px 22px rgba(73, 48, 36, 0.25);
    }

    .password-back {
        display: block;
        margin-top: 23px;
        color: #8b674c;
        text-align: center;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .password-back:hover {
        color: #493024;
    }

    .password-alert {
        padding: 13px 15px;
        border-radius: 11px;
        font-size: 13px;
        margin-bottom: 20px;
    }

    .password-alert.error {
        background: #f9e9e5;
        color: #9b4438;
        border: 1px solid #edc9c0;
    }

    .password-alert.success {
        background: #edf3e8;
        color: #526b43;
        border: 1px solid #d1dfc5;
    }

    @media (max-width: 576px) {
        .password-page {
            padding: 35px 15px;
        }

        .password-card {
            padding: 32px 23px;
        }

        .password-heading {
            font-size: 24px;
        }
    }
</style>

<div class="password-page">
    <div class="password-card">

        <div class="password-icon">
            <i class="bi bi-shield-lock"></i>
        </div>

        <h2 class="password-heading">Ubah Password</h2>

        <p class="password-description">
            Buat password baru untuk akun KursusKu Anda.
            Pastikan password mudah diingat dan tetap aman.
        </p>

        @if (isset($errors) && $errors->any())
            <div class="password-alert error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="password-alert success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('password.local.update') }}" method="POST">
            @csrf

            <input type="hidden" name="email" value="{{ old('email', $email) }}">

            <div class="password-group">
                <label for="password" class="password-label">
                    Password Baru
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    class="password-input"
                    placeholder="Masukkan password baru"
                    minlength="8"
                    autocomplete="new-password"
                    required
                >
            </div>

            <div class="password-group">
                <label for="password_confirmation" class="password-label">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    class="password-input"
                    placeholder="Ulangi password baru"
                    minlength="8"
                    autocomplete="new-password"
                    required
                >
            </div>

            <button type="submit" class="password-submit">
                <i class="bi bi-check-circle me-2"></i>
                Simpan Password
            </button>
        </form>

        <a href="{{ route('login') }}" class="password-back">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Halaman Login
        </a>

    </div>
</div>

@endsection