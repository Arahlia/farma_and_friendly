<div>
    <h2 class="text-3xl mb-4">Farmacias a las que sigues</h2>
    @if(count($followingUsers) > 0)

    @foreach($followingUsers as $key=>$user)
    {{-- child --}}
    <div class="w-full max-w-4xl bg-white border border-gray-200 rounded-lg p-5 shadow mb-4">
        <a href="{{ route('information.profile-page', ['userId' => $user->id]) }}">
            <div class="flex items-center flex-col md:flex-row space-x-6 justify-evenly">

                <img src="https://source.unsplash.com/500x500?face-{{$key}}" alt="image" class="w-24 h-24 mb-2 5 rounded-full shadow-lg mr-4">

                <h5 class="text-2xl font-medium text-gray-900 ">
                    {{$user->name}}
                </h5>
                <span class="text-2xl text-gray-500">{{$user->email}} </span>

                <div class="flex items-start ml-4 space-x-3">
                    <livewire:follow.user-follow :userId="$user->id">
                        <x-primary-button wire:click="message({{$user->id}})" onclick="event.stopPropagation(); event.preventDefault();">
                            Mensaje
                        </x-primary-button>

                </div>

            </div>

        </a>
    </div>
    @endforeach

    @else
    <p class="text-2xl">No sigues a ninguna Farmacia.</p>
    @endif
</div>