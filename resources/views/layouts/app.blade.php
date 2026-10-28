
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'KursusKu')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Mempertahankan desain premium -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('partials.navbar')

    @if (session('success'))
        <div class="container mt-4">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <main>
        @yield('content')
    </main>

</body>
</html>
