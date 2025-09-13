<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Line Awesome -->
        <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >

        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('OmniPanelLogo.png') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div class="guest-container">
            <header class="header-container">
                <h1>
                    <a href="/">
                        <img src="{{ asset('HeaderLogo.png') }}" alt="HeaderLogo">
                    </a>
                </h1>
            </header>
            <main class="guest-main-container">
                @yield('content')
            </main>
            <footer class="footer-container">
                <p class="copyright">&copy; 2025 shaneron.com</p>
            </footer>
        </div>
        @stack('scripts')
    </body>
</html>
