<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="form">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-customPurple-600 shadow-sm focus:ring-customPurple-500 dark:focus:ring-customPurple-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="u-yellow text-xl">{{ __('Recuérdame') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-xl text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-customPurple-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                {{ __('¿Has olvidado tu contraseña?') }}
            </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <div class="text-xl text-center my-4">
            ¿No tienes cuenta todavía? Regístrate
            <a href="{{ route('register') }}" class="text-xl rounded-md py-2 text-customPurple-500 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                aquí!
            </a>
        </div>
    </form>
    <!-- FORM -->
    

</x-guest-layout>
<!-- <section class="u-relative">
    <h2 class="heading-secondary u-text-center">Créate una cuenta</h2>
    <form class="form" action="" method="post">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" pattern="[a-zA-Z]{3,}" minlength="3" required>

      <label for="apellidos">Apellidos:</label>
      <input type="text" id="apellidos" name="apellidos" pattern="[a-zA-Z]{3,}" minlength="3" required>

      <label for="edad">Edad:</label>
      <input type="number" id="edad" name="edad" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" pattern="[a-z._-]{3,}@[a-z.-]{3,}\.[a-z]{2,}" required>

      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" required minlength="8">

      <button class="btn--form btn__box " type="submit"><span class="btn__text">Registrarse</span></button>
    </form>
    <div class="cross u-none-mobile u-absolute">
      <img class="initiation__cross__img u-w100" src="img/cruz-verde.webp" alt="cruz verde">
    </div>
    <div class="cross--mobile cross u-block-mobile u-absolute">
      <img class="cross__img u-w100" src="img/cruz-verde-entera.webp" alt="cruz verde">
    </div>
  </section> -->
