<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Roboto+Serif:opsz,wght@8..144,600&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <style>
        .hidden {
            display: none;
        }

        .block {
            display: block;
        }

        #extra-fields {
            transition: max-height 1s ease;
            overflow: hidden;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js',])
    @livewireStyles
</head>

<body class="font-sans text-gray-900 antialiased">
    <header class="header container--space-between u-padding-width-section">
        <div class="header__logo-box container--space-between">
            <div class="header__logo">
                <a href="{{ route('welcome') }}" class="logo__link"><img src="{{ asset('img/logo.svg') }}" alt="logo de Farma&Friendly" class="header__logo__img"></a>
            </div>
            <h1 class="header__title"><span class="header__title--f">F</span>arma<span class="header__title--and">&</span><span class="header__title--f">F</span>riendly</h1>
        </div>
        <div x-data="{ open: false }" class="relative">
            <nav class="nav u-none-mobile">
                <ul class="nav__list container--space-between">
                    <li class="nav__item nav__item--selected"><a class="nav__link" href="{{ route('welcome') }}">Inicio
                            <hr class="nav__hr">
                        </a></li>
                    <!-- <li class="nav__item"><a class="nav__link" href="#">App</a>
                            <hr class="nav__hr">
                        </li> -->
                    <li class="nav__item"><a class="nav__link" href="#">Sobre
                            nosotros</a>
                        <hr class="nav__hr">
                    </li>
                    <li class="nav__item">
                        @if (Route::has('login'))

                        @auth
                        <a class="nav__link" href="{{ url('/dashboard') }}">{{auth()->user()->name}}
                            <hr class="nav__hr">
                        </a>
                        @else
                        <a class="nav__link nav__link--selected" href="{{ route('login') }}">Mi cuenta
                            <hr class="nav__hr">
                        </a>
                        @endauth

                        @endif
                        <img class="nav__icon" src="{{ asset('img/circle-user-solid.svg') }}" alt="icono usuario">
                    </li>
                </ul>
            </nav>

            <!-- Mobile Navigation -->
            <nav class="nav-mobile u-block-mobile sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition duration-150 ease-in-out">
                    <svg class="h-14 w-14" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </nav>
            <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link class="nav__link" :href="route('welcome')" :active="request()->routeIs('welcome')">
                        {{ __('Inicio') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link class="nav__link" :href="route('welcome')">
                        {{ __('Sobre nosotros') }}
                    </x-responsive-nav-link>
                    @if (Route::has('login'))

                    @auth
                    <x-responsive-nav-link class="nav__link" :href="url('/dashboard')">{{auth()->user()->name}}
                        <hr class="nav__hr">
                    </x-responsive-nav-link>
                    @else
                    <x-responsive-nav-link class="nav__link" :href="url('login')">Mi cuenta
                        <hr class="nav__hr">
                    </x-responsive-nav-link>
                    @endauth

                    @endif
                </div>
            </div>
        </div>
    </header>
    <div class=" flex flex-col items-center sm:pt-0 dark:bg-gray-900">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
        <div class="cross u-none-mobile u-absolute">
            <img class="initiation__cross__img u-w100" src="img/cruz-verde.webp" alt="cruz verde">
        </div>
        <div class="cross--mobile cross u-block-mobile u-absolute">
            <img class="cross__img u-w100" src="{{ asset('img/cruz-verde-entera.webp') }}" alt="cruz verde">
        </div>
    </div>
    @livewireScripts
</body>

</html>