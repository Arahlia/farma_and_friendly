<div class="u-padding-width-section mx-auto my-16">
    <x-slot name="header">
        <h2 class="font-semibold text-5xl py-8 text-customPurple-800 dark:text-gray-200 leading-tight">
            {{ __('Farmacias') }}
        </h2>
    </x-slot>

    <div class="my-10">

        <form class="max-w-xl mx-auto" wire:submit.prevent="searchPharmacies">
            <div class="flex">
                <div class="z-10 h-fit bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
                    <select id="field" wire:model="field" required class="flex-shrink-0 z-10 inline-flex items-center py-4 px-4 text-xl font-medium  text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                        <option value="" hidden>Elige</option>
                        <option value="name" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nombre</option>
                        <option value="city" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ciudad</option>
                        <option value="cp" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Código postal</option>
                        <option value="address" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dirección</option>
                    </select>
                </div>
                <div class="relative w-full">
                    <input type="search" id="value" wire:model="value" id="search-dropdown" required class="block p-4 w-full z-20 text-xl text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" required />
                    <button type="submit" class="absolute top-0 end-0 p-4 text-xl font-medium  text-white bg-customGreen-500 rounded-e-lg border border-customGreen-600 hover:bg-customGreen-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>


    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 p-2 ">

        @if (is_string($users))
        <p>{{ $users }}</p>
        @else
        @foreach ($users as $key=> $user)

        {{-- child --}}
        <div class="w-full bg-white border border-gray-200 rounded-lg p-5 shadow">
            <a href="{{ route('information.profile-page', ['userId' => $user->id]) }}">
                <div class="flex flex-col items-center pb-10">

                    <img src="https://source.unsplash.com/500x500?face-{{$key}}" alt="image" class="w-24 h-24 mb-4 5 rounded-full shadow-lg">

                    <h5 class="mb-1 text-2xl font-medium text-gray-900 ">
                        {{$user->name}}
                    </h5>
                    <span class="text-xl text-gray-500">{{$user->email}} </span>

                    <div class="flex mt-4 space-x-3 md:mt-6">
                        <livewire:follow.user-follow :userId="$user->id">
                            <x-primary-button wire:click="message({{$user->id}})" onclick="event.stopPropagation(); event.preventDefault();">
                                Mensaje
                            </x-primary-button>

                    </div>

                </div>
            </a>

        </div>

        @endforeach
        @endif
    </div>




</div>