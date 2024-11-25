<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('messages.conferences') }}</title>

        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            function updateTime() {
                var currentDate = new Date();
                var hours = currentDate.getHours().toString().padStart(2, '0');
                var minutes = currentDate.getMinutes().toString().padStart(2, '0');
                var seconds = currentDate.getSeconds().toString().padStart(2, '0');
                var timeString = hours + ":" + minutes + ":" + seconds;

                document.getElementById('time').textContent = timeString;
            }

            setInterval(updateTime, 1000);
        </script>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white">

        <header class="welcome-header">
            <div class="header-content">
                <h1>{{ __('messages.conferences') }}</h1>

                @if (Route::has('login'))
                    <nav class="nav-links">
                        @auth
                            <a href="{{ url('/dashboard') }}">{{ __('messages.dashboard') }}</a>
                        @else
                            <a href="{{ route('login') }}">{{ __('messages.login') }}</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">{{ __('messages.register') }}</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </header>

        <main class="welcome-main">
            <div class="max-w-7xl mx-auto px-6">
                <div class="welcome-table">
                    <h2>{{ __('messages.welcome_to_conference_platform') }}</h2>
                    <p>{{ __('messages.easy_registration') }}</p>
                </div>
            </div>
        </main>

        <footer class="welcome-footer">
            {{ __('messages.footer') }}
        </footer>

        <div class="flex justify-center items-center p-6 text-gray-900" style="border-radius: 0.5rem; box-shadow: 0 4px 30px green;">
            <span id="time" style="color: green; font-size: 1.25rem; font-weight: 600;">Loading time...</span>
        </div>
        
    </body>
</html>
