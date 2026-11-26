
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya | KursusKu</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f3ece4;
            color: #4b382e;
            min-height: 100vh;
        }

        .navbar {
            background: #4a3028;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff8ef;
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 27px;
            font-weight: 700;
        }

        .logout-button {
            background: #a27b61;
            color: white;
            border: none;
            padding: 11px 22px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
        }

        .logout-button:hover {
            background: #b38d70;
        }

        .container {
            max-width: 1050px;
            margin: 55px auto;
            padding: 0 22px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-family: 'Playfair Display', serif;
            font-size: 34px;
            color: #4a3028;
            margin-bottom: 9px;
        }

        .welcome p {
            color: #927d70;
        }

        .profile-card {
            background: #fffaf4;
            padding: 40px;
            border-radius: 22px;
            box-shadow: 0 15px 40px rgba(74,49,35,.09);
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .avatar {
            width: 105px;
            height: 105px;
            background: linear-gradient(135deg, #604235, #b18a6d);
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            flex-shrink: 0;
        }

        .profile-info h2 {
            font-family: 'Playfair Display', serif;
            font-size: 25px;
            margin-bottom: 7px;
        }

        .role {
            display: inline-block;
            background: #eadbca;
            color: #765344;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 35px;
        }

        .detail-box {
            background: #fffaf4;
            padding: 22px;
            border-radius: 15px;
            border: 1px solid #eadbca;
        }

        .detail-box span {
            color: #a18c7e;
            font-size: 12px;
            display: block;
            margin-bottom: 9px;
        }

        .detail-box strong {
            color: #594438;
            font-size: 15px;
        }

        .actions {
            margin-top: 30px;
        }

        .course-button {
            display: inline-block;
            background: #765344;
            color: white;
            padding: 13px 23px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
        }

        .course-button:hover {
            background: #604235;
        }

        .alert {
            padding: 13px 18px;
            background: #e8f2e5;
            color: #42633d;
            border-radius: 10px;
            margin-bottom: 22px;
        }

        @media(max-width: 600px) {
            .profile-card {
                flex-direction: column;
                text-align: center;
            }

            .details {
                grid-template-columns: 1fr;
            }

            .welcome h1 {
                font-size: 27px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="brand">KursusKu.</div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-button">
            Keluar
        </button>
    </form>
</nav>

<main class="container">

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="welcome">
        <h1>Profil Saya</h1>
        <p>Selamat datang di halaman profil KursusKu.</p>
    </div>

    <section class="profile-card">

        <div class="avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        <div class="profile-info">
            <h2>{{ auth()->user()->name }}</h2>
            <p>{{ '@' . auth()->user()->username }}</p>
            <br>
            <span class="role">
                {{ auth()->user()->role }}
            </span>
        </div>

    </section>

    <section class="details">

        <div class="detail-box">
            <span>Nama Lengkap</span>
            <strong>{{ auth()->user()->name }}</strong>
        </div>

        <div class="detail-box">
            <span>Username</span>
            <strong>{{ auth()->user()->username }}</strong>
        </div>

        <div class="detail-box">
            <span>Email</span>
            <strong>{{ auth()->user()->email }}</strong>
        </div>

        <div class="detail-box">
            <span>Jenis Akun</span>
            <strong>{{ ucfirst(auth()->user()->role) }}</strong>
        </div>

    </section>

    <div class="actions">
        <a href="{{ route('courses.index') }}" class="course-button">
            Lihat Daftar Kursus
        </a>
    </div>

</main>

</body>
</html>
