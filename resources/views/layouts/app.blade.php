<!DOCTYPE html>
<!-- layouts/app.blade.php -->
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
        @vite('resources/js/hamburger.js')
    </head>
    <body>
        <div class="template-container">
            <!-- サイドバー -->
            <aside class="sidebar">
                <div class="sidebar-logo-box">
                    <div class="sidebar-logo">
                        <img src="{{ asset('HeaderLogo.png') }}" alt="HeaderLogo">
                    </div>
                </div>
                <nav>
                    <ul class="nav-ul">
                        <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="las la-shapes"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('setting.index') || request()->routeIs('setting.edit') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('setting.index') }}">
                                <i class="las la-cog"></i>
                                Setting
                            </a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}" class="nav-item">
                            @csrf
                            <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                                <i class="las la-sign-out-alt"></i>
                                logout
                            </a>
                        </form>
                    </ul>
                </nav>
            </aside>

            <!-- ハンバーガーメニュー -->
            <div class="hamburger-menu">
                <div class="hamburger-icon">
                    <img src="{{ asset('HeaderLogo.png') }}" alt="HeaderLogo">
                </div>
                <button class="hamburger-button" id="hamburger-button">
                    <i class="las la-bars"></i>
                </button>

                <nav class="slide-menu" id="slide-menu">
                    <ul>
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="las la-shapes"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('setting.index') }}">
                                <i class="las la-cog"></i>
                                Setting
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                                    <i class="las la-sign-out-alt"></i>
                                    logout
                                </a>
                            </form>
                        </li>
                    </ul>
                </nav>
                <div class="overlay" id="overlay"></div>
            </div>

            <main class="main-container">
                @yield('content')
            </main>
        </div>
    </body>
</html>
