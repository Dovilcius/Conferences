<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Conferences</title>

        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white">

        <header class="welcome-header">
            <div class="header-content">
                <h1>Conferences</h1>

                @if (Route::has('login'))
                    <nav class="nav-links">
                        @auth
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </header>

        <main class="welcome-main">
            <div class="max-w-7xl mx-auto px-6">
                <div class="welcome-table">
                    <h2>Welcome to the Conference Platform</h2>
                    <p>Our conferences provide an opportunity to learn about the latest trends, make new connections and participate in interactive sessions.</p>
                    <p>Registering for the conference is easy!</p>
                </div>
            </div>
        </main>

        <footer class="welcome-footer">
            Dovilė Viršilienė PIT-21-I-NT
        </footer>
        
    </body>
</html>
