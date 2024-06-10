<div>
    @empty($following)
        <button class="inline-flex items-center px-4 py-2 text-xl font-semibold uppercase border border-transparent rounded-md text-white bg-green-600 hover:bg-green-500 transition ease-in-out duration-150" wire:click.prevent="follow">Follow</button>
    @else
        <button class="inline-flex items-center px-4 py-2 text-xl font-semibold uppercase border border-transparent rounded-md text-white bg-red-600  hover:bg-red-500 transition ease-in-out duration-150" wire:click.prevent="follow">Unfollow</button>
    @endempty
</div>
