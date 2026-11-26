
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password | KursusKu</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

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
            padding: 20px;
            font-family: 'DM Sans', sans-serif;
            background: linear-gradient(135deg, #eee4d8, #d9c5ad, #f6eee5);
            color: #49372e;
        }

        .card {
            width: 100%;
            max-width: 470px;
            padding: 45px;
            border-radius: 24px;
            background: #fffaf4;
            box-shadow: 0 25px 70px rgba(74, 49, 35, .18);
        }

        .brand {
            text-align: center;
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            font-weight: 700;
            color: #604235;
            margin-bottom: 30px;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            text-align: center;
            margin-bottom: 12px;
        }

        .description {
            text-align: center;
            color: #927d70;
            font-size: 13px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        input {
            width: 100%;
            padding: 15px;
            border: 1px solid #e4d6c8;
            border-radius: 11px;
            background: #fffdf9;
            outline: none;
            font-family: inherit;
            font-size: 14px;
            margin-bottom: 20px;
        }

        input:focus {
            border-color: #98745d;
            box-shadow: 0 0 0 3px rgba(152,116,93,.12);
        }

        button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 11px;
            background: linear-gradient(135deg, #604235, #98745d);
            color: white;
            font-weight: 700;
            cursor: pointer;
        }

        button:hover {
            opacity: .9;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 23px;
            color: #89644d;
            font-size: 13px;
            text-decoration: none;
            font-weight: 600;
        }

        .alert {
            padding: 12px;
            border-radius: 9px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .success {
            background: #edf5eb;
            color: #42633d;
        }

        .error {
            background: #fbeaea;
            color: #a33d3d;
        }
    </style>
</head>

<body>

<div class="card">

    <div class="brand">KursusKu.</div>

    <h1>Lupa Password?</h1>

    <p class="description">
        Masukkan alamat email yang terdaftar.
        Kami akan membantu mengirimkan tautan
        untuk mengatur ulang password akunmu.
    </p>

    @if(session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <label for="email">Alamat Email</label>

        <input
            type="email"
            id="email"
            name="email"
            placeholder="Masukkan email terdaftar"
            value="{{ old('email') }}"
            required
        >

        <button type="submit">
            KIRIM TAUTAN RESET
        </button>
    </form>

    <a href="{{ route('login') }}" class="back">
        ← Kembali ke halaman login
    </a>

</div>

</body>
</html>