<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-row m-5 uppercase">
                <button wire:click.prevent='openMenu' class="{{ $isMenu ? 'text-indigo-600' : 'text-gray-400' }} font-bold py-2 px-4 mr-3 uppercase">
                    Menu
                </button>
                <button wire:click.prevent='openBoard' class="{{ $isBoard ? 'text-indigo-600' : 'text-gray-400' }} font-bold py-2 px-4 mr-3 uppercase">
                    Board
                </button>
                <button wire:click.prevent='openCategory' class="{{ $isCategory ? 'text-indigo-600' : 'text-gray-400' }} font-bold py-2 px-4 mr-3 uppercase">
                    Category
                </button>
            </div>
            @if($isMenu)
            @include('livewire.menu.sands.menu.list')
            @endif
            @if ($isCategory)
                <livewire:menu.sands.category>
            @endif
            @if ($isBoard)
                <span>this is board</span>
            @endif
        </div>
    </div>
</div>

