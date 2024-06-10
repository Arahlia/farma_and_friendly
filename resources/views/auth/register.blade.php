<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="form">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <div class="flex items-center mt-2">
                <label class="mr-4">
                    <input type="radio" name="role" value="pharmacy" {{ old('role') == 'pharmacy' ? 'checked' : '' }} required onchange="toggleFields()" class="focus:ring-customPurple-500 dark:focus:ring-customPurple-600 dark:focus:ring-offset-gray-800">
                    {{ __('Farmacia') }}
                </label>
                <label>
                    <input type="radio" name="role" value="normal_user" {{ old('role') == 'normal_user' ? 'checked' : '' }} required onchange="toggleFields()" class="focus:ring-customPurple-500 dark:focus:ring-customPurple-600 dark:focus:ring-offset-gray-800">
                    {{ __('Usuario') }}
                </label>
            </div>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Address -->
        <div id="extra-fields" class="hidden mt-4">
            <div class="mt-4">
                <x-input-label for="address" :value="__('Dirección')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- City -->
            <div class="mt-4">
                <x-input-label for="city" :value="__('Ciudad')" />
                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" autocomplete="city" />
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <!-- CP -->
            <div class="mt-4">
                <x-input-label for="cp" :value="__('Código Postal')" />
                <x-text-input id="cp" class="block mt-1 w-full" type="text" name="cp" :value="old('cp')" autocomplete="postal-code" />
                <x-input-error :messages="$errors->get('cp')" class="mt-2" />
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirma Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-xl text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('¿Ya registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        function toggleFields() {
            const extraFields = document.getElementById('extra-fields');
            const pharmacyRadio = document.querySelector('input[name="role"][value="pharmacy"]');
            if (pharmacyRadio.checked) {
                extraFields.classList.remove('hidden');
                extraFields.classList.add('block');
            } else {
                extraFields.classList.remove('block');
                extraFields.classList.add('hidden');
            }
        }

        // Call the function on page load in case of validation errors and the user had selected "pharmacy"
        document.addEventListener('DOMContentLoaded', function() {
            toggleFields();
        });
    </script>
    <!-- <style>
        .hidden {
            display: none;
        }

        .block {
            display: block;
        }

        #extra-fields {
            transition: max-height 0.5s ease;
            overflow: hidden;
        }
    </style> -->

</x-guest-layout>
