<div class="u-padding-width-section">
    <div class="flex items-center gap-x-6 py-10 ">
        <!-- bg-customGreen-700/30 -->
        <div>
            <img src="{{ $user->photo ? asset('storage/' . $user->profile_image) : 'default-avatar.png' }}" alt="image" class="w-40 h-40 mb-2 5 rounded-full shadow-lg">
        </div>
        <div>
            <h1 class="heading-secondary heading-secondary--green">{{ $user->name }}</h1>
        </div>
    </div>

    @if($information)
    <div>
        @if($information->description)
        <div class="mb-8">
            <h3 class="text-6xl mb-4">Descripción</h3>
            <p class="text-3xl">{{ $information->description }}</p>
        </div>
        @endif

        @if($information->phone)
        <div class="mb-8">
            <h3 class="text-6xl mb-4">Teléfono</h3>
            <p>{{ $information->phone }}</p>
        </div>

        @endif

        @if($information->schedule)
        <div class="mb-8">
            <h3 class="text-6xl mb-4">Horario</h3>
            <ul>
                @foreach(json_decode($information->schedule, true) as $day => $time)
                @if($time)
                <li class="text-2xl font-medium mb-1">{{ ucfirst($day) }}: {{ $time }}</li>
                @endif
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    @endif
    @if ($user->address || $user->city || $user->cp)
    <div class="mb-8">
        <h3 class="text-6xl mb-4">Dirección</h3>
        <p class="text-2xl">{{ $user->address }}, {{ $user->city }}, {{ $user->cp }}</p>
    </div>
    @endif
    @if (auth()->user()->role == 'pharmacy')
    <x-primary-button wire:click="addInformation" class="mt-4">Añadir información</x-primary-button>
    @endif
</div>