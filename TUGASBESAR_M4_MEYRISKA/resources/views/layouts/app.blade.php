<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Klinik Rawat Jalan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <div class="header-content">
            <div class="header-left">
                <a href="{{ route('pasiens.index') }}" class="brand">KLINIK RAWAT JALAN</a>
                <a href="{{ route('pasiens.index') }}" class="nav-link">Dashboard</a>
            </div>

            @auth
                <div class="account-menu">
                    <span class="user-badge">{{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})</span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-button">Keluar</button>
                    </form>
                </div>
            @endauth
        </div>
    </header>

    <main>
        @if (session('success'))
            <p class="auth-message is-success">{{ session('success') }}</p>
        @endif

        @yield('content')
    </main>
</body>
</html>
