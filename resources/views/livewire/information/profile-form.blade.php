<div class="u-padding-width-section">
    <x-slot name="header">
        <h2 class="font-semibold text-5xl py-8 text-customPurple-800 dark:text-gray-200 leading-tight">
            {{ __('Información de perfil') }}
        </h2>
    </x-slot>
    <form wire:submit.prevent="save" class="py-16 max-w-3xl mx-auto">
        <div class="mb-4">
            <label for="description">Descripción</label>
            <textarea id="description" wire:model="description" rows="5" class='mt-1 block w-full text-2xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-customPurple-500 dark:focus:border-customPurple-600 focus:ring-customPurple-500 dark:focus:ring-customPurple-600 rounded-md shadow-sm'></textarea>
            <div>
                @error('description') <span class="error text-lg text-red-600 font-bold">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="phone">Teléfono</label>
            <input type="text" id="phone" wire:model="phone" class="mt-1 block w-full text-2xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-customPurple-500 dark:focus:border-customPurple-600 focus:ring-customPurple-500 dark:focus:ring-customPurple-600 rounded-md shadow-sm">
            <div>
                @error('phone') <span class="error text-lg text-red-600 font-bold">{{ $message }}</span> @enderror
            </div>
        </div>
<p class="mb-4 text-customPurple-800">Horas de apertura y de cierre</p>
        @foreach($schedule as $day => $time)
        <div class="mb-4">
            <label for="{{ $day }}">{{ ucfirst($day) }}</label>
            <input type="text" id="{{ $day }}" wire:model="schedule.{{ $day }}" class="mt-1 block w-full text-2xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-customPurple-500 dark:focus:border-customPurple-600 focus:ring-customPurple-500 dark:focus:ring-customPurple-600 rounded-md shadow-sm">
        </div>
        @endforeach

        <div>
            @error('schedule') <span class="error text-lg text-red-600 font-bold">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end mt-4 gap-x-4">
            <x-primary-button type="submit">Guardar</x-primary-button>
            <button type="button" wire:click="cancel" class="inline-flex items-center px-4 py-2 text-xl font-semibold uppercase border border-transparent rounded-md text-white bg-red-600 hover:bg-red-500 transition ease-in-out duration-150">Cancelar</button>
        </div>
    </form>
</div>