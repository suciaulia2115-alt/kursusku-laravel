<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KursusKu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            font-family: 'DM Sans', sans-serif;
            background:
                radial-gradient(circle at top left, #eee0d0, transparent 40%),
                linear-gradient(135deg, #f8f1e9, #e8d8c7);
            color: #49372c;
        }

        .login-container {
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            width: 100%;
            max-width: 1000px;
            min-height: 610px;
            overflow: hidden;
            border-radius: 25px;
            background: #fffdf9;
            box-shadow: 0 25px 70px rgba(75, 49, 34, 0.18);
        }

        .brand-panel {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 55px 45px;
            overflow: hidden;
            color: #fff8ef;
            background:
                radial-gradient(circle at 90% 10%, rgba(220, 188, 150, 0.22), transparent 35%),
                linear-gradient(145deg, #594132, #34241d);
        }

        .brand-panel::before,
        .brand-panel::after {
            content: "";
            position: absolute;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 50%;
        }

        .brand-panel::before {
            width: 320px;
            height: 320px;
            right: -140px;
            top: -100px;
        }

        .brand-panel::after {
            width: 240px;
            height: 240px;
            left: -120px;
            bottom: -100px;
        }

        .brand-content {
            position: relative;
            z-index: 1;
        }

        .brand-label {
            display: inline-block;
            padding: 8px 15px;
            margin-bottom: 30px;
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 30px;
            color: #e9d2b6;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .brand-title {
            margin-bottom: 18px;
            font-family: 'Playfair Display', serif;
            font-size: 47px;
            line-height: 1.2;
        }

        .brand-title span {
            color: #d9b88f;
        }

        .brand-description {
            max-width: 330px;
            color: #e5d8ca;
            font-size: 14px;
            line-height: 1.9;
        }

        .brand-decoration {
            margin-top: 55px;
            color: #d9b88f;
            font-family: 'Playfair Display', serif;
            font-size: 19px;
            font-style: italic;
        }

        .form-panel {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 55px 65px;
        }

        .form-heading {
            margin-bottom: 35px;
        }

        .form-heading h2 {
            margin-bottom: 10px;
            font-family: 'Playfair Display', serif;
            font-size: 34px;
            color: #49372c;
        }

        .form-heading p {
            color: #99877a;
            font-size: 14px;
            line-height: 1.7;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            color: #5b4536;
            font-size: 13px;
            font-weight: 700;
        }

        .form-group input {
            width: 100%;
            height: 49px;
            padding: 0 15px;
            border: 1px solid #e6d9cd;
            border-radius: 10px;
            outline: none;
            background: #fcf9f5;
            color: #49372c;
            font-family: inherit;
            font-size: 13px;
            transition: 0.2s;
        }

        .form-group input:focus {
            border-color: #98765c;
            box-shadow: 0 0 0 3px rgba(152, 118, 92, 0.12);
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 85px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 13px;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #92745d;
            cursor: pointer;
            font-family: inherit;
            font-size: 11px;
            font-weight: 700;
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 27px;
            font-size: 12px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #806d5f;
            cursor: pointer;
        }

        .remember input {
            accent-color: #72523e;
        }

        .forgot-link {
            color: #8b684e;
            text-decoration: none;
            font-weight: 600;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            height: 51px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #73523d, #493326);
            color: white;
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 8px 18px rgba(73, 51, 38, 0.18);
            transition: 0.25s;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 22px rgba(73, 51, 38, 0.25);
        }

        /* TOMBOL KEMBALI KE BERANDA */
        .back-home-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            width: 100%;
            height: 48px;
            margin-top: 13px;
            border: 1px solid #b99a79;
            border-radius: 10px;
            background: transparent;
            color: #76543c;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .back-home-button:hover {
            background: #f2e6d8;
            color: #493024;
            border-color: #8a6549;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(73, 51, 38, 0.09);
        }

        .back-home-button span {
            font-size: 17px;
        }

        .alert {
            padding: 12px 14px;
            margin-bottom: 20px;
            border-radius: 9px;
            font-size: 12px;
            line-height: 1.6;
        }

        .alert-success {
            border: 1px solid #c9dfcc;
            background: #edf7ed;
            color: #35633b;
        }

        .alert-error {
            border: 1px solid #ebcccc;
            background: #fff0f0;
            color: #a33b3b;
        }

        .error {
            display: block;
            margin-top: 7px;
            color: #b54747;
            font-size: 11px;
        }

        .footer-text {
            margin-top: 35px;
            color: #aa9a8d;
            text-align: center;
            font-size: 11px;
        }

        @media (max-width: 760px) {
            body {
                padding: 15px;
            }

            .login-container {
                grid-template-columns: 1fr;
                max-width: 480px;
            }

            .brand-panel {
                min-height: 250px;
                padding: 35px;
            }

            .brand-title {
                font-size: 35px;
            }

            .brand-decoration {
                margin-top: 25px;
            }

            .form-panel {
                padding: 40px 30px;
            }
        }

        @media (max-width: 380px) {
            .form-options {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <!-- PANEL BRAND -->
        <section class="brand-panel">
            <div class="brand-content">

                <div class="brand-label">
                    Welcome to KursusKu
                </div>

                <h1 class="brand-title">
                    Belajar Lebih Mudah,
                    <span>Raih Masa Depan.</span>
                </h1>

                <p class="brand-description">
                    Selamat datang di KursusKu. Platform pembelajaran
                    untuk membantu kamu mengembangkan kemampuan,
                    memperluas pengetahuan, dan meraih impian.
                </p>

                <div class="brand-decoration">
                    "Setiap langkah kecil adalah awal dari kesuksesan."
                </div>

            </div>
        </section>

        <!-- PANEL FORM LOGIN -->
        <section class="form-panel">

            <div class="form-heading">
                <h2>Selamat Datang</h2>
                <p>
                    Silakan masuk ke akun KursusKu untuk melanjutkan
                    perjalanan belajarmu.
                </p>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <!-- USERNAME / EMAIL -->
                <div class="form-group">
                    <label for="login">Username / Email</label>

                    <input
                        type="text"
                        id="login"
                        name="login"
                        value="{{ old('login') }}"
                        placeholder="Masukkan username atau email"
                        autocomplete="username"
                        required
                        autofocus
                    >

                    @error('login')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div class="form-group">
                    <label for="password">Password</label>

                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            id="togglePassword"
                        >
                            LIHAT
                        </button>
                    </div>

                    @error('password')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>

                <!-- INGAT SAYA DAN LUPA PASSWORD -->
                <div class="form-options">

                    <label class="remember">
                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            {{ old('remember') ? 'checked' : '' }}
                        >
                        Ingat Saya
                    </label>

                    <a
                        href="{{ route('password.request') }}"
                        class="forgot-link"
                    >
                        Lupa Password?
                    </a>

                </div>

                <!-- TOMBOL MASUK -->
                <button type="submit" class="login-button">
                    Masuk ke Akun
                </button>

                <!-- TOMBOL KEMBALI KE BERANDA -->
                <a href="{{ route('home') }}" class="back-home-button">
                    <span aria-hidden="true">←</span>
                    Kembali ke Beranda
                </a>

            </form>

            <div class="footer-text">
                &copy; {{ date('Y') }} KursusKu. All Rights Reserved.
            </div>

        </section>

    </div>

    <!-- SCRIPT LIHAT / SEMBUNYIKAN PASSWORD -->
    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePassword.textContent = 'SEMBUNYI';
            } else {
                passwordInput.type = 'password';
                togglePassword.textContent = 'LIHAT';
            }
        });
    </script>

</body>
</html>
