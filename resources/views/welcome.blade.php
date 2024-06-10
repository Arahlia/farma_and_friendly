<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Farma&Friendly</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Roboto+Serif:opsz,wght@8..144,600&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <!-- Styles -->

    <!-- <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style> -->
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js',])
    @livewireStyles
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <section class="initiation u-relative">
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
                        <li class="nav__item nav__item--selected"><a class="nav__link nav__link--selected" href="{{ route('welcome') }}">Inicio
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
                            <a class="nav__link" href="{{ route('login') }}">Mi cuenta
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

            <!-- <nav x-data="{ open: false }" class="nav-mobile u-block-mobile">
                <button @click="open = !open" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                    <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                    <ul class="pt-2 pb-3 space-y-1">
                        <li class="nav__item"><a class="nav__link" href="{{ route('welcome') }}">Inicio</a></li>
                        <li class="nav__item"><a class="nav__link" href="#">App</a></li>
                        <li class="nav__item"><a class="nav__link" href="#">Sobre nosotros</a></li>
                        <li class="nav__item">
                            @if (Route::has('login'))
                            @auth
                            <a class="nav__link" href="{{ url('/dashboard') }}">{{ auth()->user()->name }}</a>
                            @else
                            <a class="nav__link" href="{{ route('login') }}">Mi cuenta</a>
                            @endauth
                            @endif
                        </li>
                    </ul>
                </div>
            </nav> -->
        </header>

        <div class="container--space-between u-padding-width-section">
            <div class="initiation__text-box u-w100-mobile u-padding-bottom-small-mobile">
                <h1 class="heading-primary">
                    <span class="initiation__title">Comunícate con tu</span>
                    <div class="initiation__title--2">
                        <span class="heading-primary--special ">farmacia</span>
                    </div>
                </h1>
                <p class="initiation__text">
                    Recibe notificaciones, recordatorios, consulta tu tratamiento...
                </p>
                <p class="initiation__text">¡Y mucho más! </p>
                <a href="#" class="btn">
                    <div class="btn__box container--space-between u-align-items-center">
                        <p class="btn__text">MÁS INFO</p>
                        <svg class="btn__svg" xmlns="http://www.w3.org/2000/svg" width="38" height="30" viewBox="0 0 38 30" fill="none">
                            <path d="M36.5342 16.4142C37.3153 15.6332 37.3153 14.3668 36.5342 13.5858L23.8063 0.857864C23.0252 0.0768156 21.7589 0.0768156 20.9779 0.857864C20.1968 1.63891 20.1968 2.90524 20.9779 3.68629L32.2916 15L20.9779 26.3137C20.1968 27.0948 20.1968 28.3611 20.9779 29.1421C21.7589 29.9232 23.0252 29.9232 23.8063 29.1421L36.5342 16.4142ZM0 17H35.12V13H0L0 17Z" />
                        </svg>
                    </div>
                </a>
            </div>

            <div class="initiation__mobile u-padding-bottom-small-mobile u-w100-mobile">
                <img class="initiation__mobile__img u-w100-mobile" src="{{ asset('img/composicion-inicio.png') }}" alt="movil con aplicación Farma&Friendly">
            </div>
        </div>
        <div class="initiation__cross cross u-none-mobile u-absolute">
            <img class="initiation__cross__img u-w100" src="{{ asset('img/cruz-verde.webp') }}" alt="cruz verde">
        </div>
        <div class="initiation__cross cross cross--mobile u-block-mobile u-absolute">
            <img class="initiation__cross__img u-w100" src="{{ asset('img/cruz-verde-entera.webp') }}" alt="cruz verde">
        </div>
    </section>

    <!-- CHAT SECTION -->
    <section class="chat u-relative u-padding-top-bottom">
        <div class="container--space-between u-padding-width-section u-div-reverse">
            <div class="chat__composition">
                <div class="chat__mobile u-relative u-w100">
                    <img class="chat__mobile__img u-w100" src="{{ asset('img/movil.png') }}" alt="Móvil con chat">
                </div>

            </div>
            <div class="chat__text-box u-padding-bottom-small-mobile">
                <h2 class="heading-secondary">Chatea con tu farmacia </h2>
                <p class="text">Encuentra tu farmacia de siempre, ponla en favoritos y consulta lo que
                    necesites a través del chat
                </p>
            </div>
        </div>

        <div class="chat__line-plane u-absolute">
            <img src="{{ asset('img/plane-line.webp') }}" alt="Avion volando" class="u-w100">
        </div>
    </section>

    <!-- CALENDAR SECTION -->
    <section class="calendar u-padding-top-bottom u-bottom-shadow">
        <div class="container--space-between u-padding-width-section">
            <div class="calendar__text-box u-padding-bottom-small-mobile">
                <h2 class="heading-secondary">Recuerda siempre la medicación</h2>
                <p class="text">
                    Crea recordatorios con la función calendario y recibe notificaciones para no olvidar nunca el
                    tratamiento, citas con el médico, recoger tus medicamentos en la farmacia ....
                </p>
            </div>
            <div class="calendar__composition u-relative">
                <div class="calendar__calendar-box">
                    <img class="calendar__calendar-box__img u-w100" src="{{ asset('img/calendario.png') }}" alt="calendario">
                </div>
                <div class="calendar__reminder container--space-between u-absolute">
                    <div class="calendar__reminder__title u-text-center">
                        <p>Recordatorio</p>
                        <hr>
                    </div>
                    <div class="calendar__reminder__box container--space-between u-align-items-center">
                        <p>Tratamiento</p>
                        <div class="calendar__reminder__icon">
                            <img class="calendar__reminder__icon__img u-w100" src="{{ asset('img/Polygon 5.svg') }}" alt="Desplegable">
                        </div>
                    </div>
                    <div class="calendar__reminder__box container--space-between u-align-items-center">
                        <p>Lorazepam</p>
                        <div class="calendar__reminder__icon">
                            <img class="calendar__reminder__icon__img u-w100" src="{{ asset('img/Polygon 5.svg') }}" alt="Desplegable">
                        </div>
                    </div>
                    <div class="calendar__reminder__box--large container--space-between u-align-items-center">
                        <div class="calendar__reminder__box container--space-between u-align-items-center">
                            <div class="calendar__reminder__icon">
                                <img class="calendar__reminder__icon__img u-w100" src="{{ asset('img/icon _Clock_.svg') }}" alt="Reloj">
                            </div>
                            <p>9:00 h</p>
                            <div class="calendar__reminder__icon">
                                <img class="calendar__reminder__icon__img u-w100" src="{{ asset('img/Polygon 5.svg') }}" alt="Desplegable">
                            </div>
                        </div>
                        <div class="calendar__reminder__icon">
                            <img class="calendar__reminder__icon__img u-w100" src="{{ asset('img/icon _plus_2.svg') }}" alt="Añadir">
                        </div>
                    </div>
                    <div class="calendar__reminder__box container--space-between u-align-items-center">
                        <p>Diariamente</p>
                        <div class="calendar__reminder__icon">
                            <img class="calendar__reminder__icon__img u-w100" src="{{ asset('img/Polygon 5.svg') }}" alt="Desplegable">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TREATMENT SECTION -->
    <section class="treatment u-relative u-padding-top-bottom">
        <div class="container--space-between u-padding-width-section u-div-reverse">
            <div class="treatment__composition u-w100-mobile">
                <div class="treatment__box container--space-between">
                    <div class="treatment__box__title container--space-between u-align-items-center">
                        <p>Tratamientos</p>
                        <div class="treatment__box__title__icon">
                            <img src="{{ asset('img/icon _plus_.svg') }}" alt="Añadir tratamiento" class="u-w100">
                        </div>
                    </div>
                    <div class="treatment__1 container--space-around u-align-items-center">
                        <div class="treatment__box__icon">
                            <img class="u-w100" src="{{ asset('img/icon _Tablets_.svg') }}" alt="Pastillas">
                        </div>
                        <p class="treatment__box__drug">Adiro</p>
                        <div class="treatment__box__icon">
                            <img class="u-w100" src="{{ asset('img/Polygon 6.svg') }}" alt="Desplegable">
                        </div>
                    </div>
                    <div class="treatment__2">
                        <div class="treatment__2__caption container--space-around u-align-items-center">
                            <div class="treatment__box__icon">
                                <img class="u-w100" src="{{ asset('img/icon _Capsules_.svg') }}" alt="Cápsulas">
                            </div>
                            <p class="treatment__box__drug">Fluoxetina</p>
                            <div class="treatment__box__icon">
                                <img class="u-w100" src="{{ asset('img/Polygon 6.svg') }}" alt="Desplegable">
                            </div>
                        </div>
                        <div class="treatment__2__content">
                            <div class="container--space-around u-align-items-center">
                                <div class="treatment__2__info">
                                    <p class="treatment__2__text">Dosis</p>
                                    <p class="treatment__2__text--small u-text-center">1x día</p>
                                </div>
                                <div class="treatment__2__info">
                                    <p class="treatment__2__text">Duración</p>
                                    <p class="treatment__2__text--small u-text-center">12/11 - 12/12</p>
                                </div>
                            </div>
                            <div class="treatment__features">
                                <p class="treatment__2__text">Descripción
                                    <img class="treatment__features__icon u-w100" src="{{ asset('img/Polygon 7.svg') }}" alt="Desplegable">
                                </p>
                                <p class="treatment__2__text">Vía de administración
                                    <img class="treatment__features__icon u-w100" src="{{ asset('img/Polygon 7.svg') }}" alt="Desplegable">
                                </p>
                                <p class="treatment__2__text">Efectos secundarios
                                    <img class="treatment__features__icon u-w100" src="{{ asset('img/Polygon 7.svg') }}" alt="Desplegable">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="treatment__text-box u-padding-bottom-small-mobile">
                <h2 class="heading-secondary heading-secondary--green">Consulta tu tratamiento</h2>
                <p class="text">
                    Revisa la duración y la dosis, así como los posibles efectos secundarios, la vía de administración
                    ...
                </p>
            </div>
        </div>
        <div class="treatment__cross cross container--space-between u-none-mobile u-absolute">
            <img class="treatment__cross__img u-w100" src="{{ asset('img/cruz-violeta.png') }}" alt="cruz verde">
        </div>
        <div class="cross--mobile treatment__cross--mobile treatment__cross cross container--space-between u-block-mobile u-absolute">
            <img class="treatment__cross__img u-w100" src="{{ asset('img/cruz-verde-entera.webp') }}" alt="cruz verde">
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer u-padding-top-bottom u-top-shadow">
        <div class="footer__container container--space-between u-padding-width-section u-align-items-center">
            <div class="footer__logo u-w100-mobile">
                <a href="{{ route('welcome') }}" class="logo__link">
                    <img src="{{ asset('img/logo.svg') }}" alt="logo de Farma&Friendly" class="footer__logo__img">
                </a>
            </div>
            <nav class="nav nav--footer u-w100-mobile">
                <ul class="nav__list">
                    <li class="nav__item footer__text"><a href="#" class="nav__link">App</a></li>
                    <li class="nav__item footer__text"><a href="#" class="nav__link">Sobre nosotros</a></li>
                    <li class="nav__item footer__text">
                        @if (Route::has('login'))

                        @auth
                        <a class="nav__link" href="{{ url('/dashboard') }}">{{auth()->user()->name}}
                        </a>
                        @else
                        <a class="nav__link" href="{{ route('login') }}">Mi cuenta
                        </a>
                        @endauth

                        @endif
                    </li>
                </ul>
            </nav>
            <nav class="nav nav--footer u-w100-mobile">
                <ul class="nav__list">
                    <li class="nav__item footer__text"><a href="#" class="nav__link">Términos y condiciones</a></li>
                    <li class="nav__item footer__text"><a href="#" class="nav__link">Política de privacidad</a></li>
                    <li class="nav__item footer__text"><a href="#" class="nav__link">Política de cookies</a></li>
                </ul>
            </nav>
            <div class="u-align-items-center flex-column u-w100-mobile">
                <p class="footer__text">Síguenos</p>
                <div class="container--space-between">
                    <a href="https://www.instagram.com/" target="_blank" class="footer__icon"><img src="{{ asset('img/instagram (1).svg') }}" alt=""></a>
                    <a href="https://www.facebook.com/?locale=es_ES" target="_blank" class="footer__icon"><img src="{{ asset('img/facebook (1).svg') }}" alt=""></a>
                    <a href="https://twitter.com/?lang=es" target="_blank" class="footer__icon"><img src="{{ asset('img/x-twitter (1).svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </footer>
    @livewireScripts

</body>

</html>