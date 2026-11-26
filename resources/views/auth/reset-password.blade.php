<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | KursusKu</title>

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
            padding: 30px 15px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eadbc9, #d8c2aa);
        }

        .reset-card {
            width: 100%;
            max-width: 606px;
            padding: 60px 58px;
            background: #fffaf5;
            border-radius: 32px;
            box-shadow: 0 15px 45px rgba(76, 52, 37, 0.12);
        }

        .brand {
            text-align: center;
            color: #654637;
            font-family: Georgia, serif;
            font-size: 38px;
            font-weight: bold;
            margin-bottom: 42px;
        }

        h1 {
            text-align: center;
            color: #49362c;
            font-family: Georgia, serif;
            font-size: 34px;
            margin-bottom: 20px;
        }

        .description {
            text-align: center;
            color: #987c6b;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            color: #49382e;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 18px;
            border: 1px solid #e4d3c2;
            border-radius: 15px;
            background: #fff;
            font-size: 16px;
            outline: none;
        }

        input:focus {
            border-color: #98725b;
            box-shadow: 0 0 0 3px rgba(152, 114, 91, 0.12);
        }

        .error {
            color: #c0392b;
            font-size: 13px;
            margin-top: 7px;
        }

        .alert {
            padding: 14px;
            margin-bottom: 20px;
            border-radius: 12px;
            background: #fbe9e7;
            color: #b23b32;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 18px;
            border: none;
            border-radius: 15px;
            background: linear-gradient(110deg, #674637, #98745e);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(103, 70, 55, 0.2);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 28px;
            color: #79543e;
            text-decoration: none;
        }

        .back-link:hover {
            color: #b18459;
        }

        @media (max-width: 600px) {
            .reset-card {
                padding: 40px 25px;
            }

            .brand {
                font-size: 32px;
            }

            h1 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

    <div class="reset-card">

        <div class="brand">KursusKu.</div>

        <h1>Reset Password</h1>

        <p class="description">
            Silakan buat password baru untuk akun KursusKu.
            Pastikan password mudah kamu ingat dan aman.
        </p>

        @if ($errors->any())
            <div class="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">Alamat Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $email) }}"
                    required
                    readonly
                >
            </div>

            <div class="form-group">
                <label for="password">Password Baru</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password baru"
                    minlength="8"
                    required
                >

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Ulangi password baru"
                    minlength="8"
                    required
                >
            </div>

            <button type="submit">
                UBAH PASSWORD
            </button>

        </form>

        <a href="{{ route('login') }}" class="back-link">
            ← Kembali ke halaman login
        </a>

    </div>

</body>
</html>
