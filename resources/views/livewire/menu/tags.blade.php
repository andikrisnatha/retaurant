<div class="p-4">
    <ul class="w-full max-w-md grid gap-4 mx-auto">
        @foreach ($menuTags as $tag)
        <li class="flex gap-2 dark:text-white items-center">
            {{ $tag->title }}
            <code class="bg-neutral-300 text-neutral-800 dark:bg-neutral-600 dark:text-neutral-300">{{ $tag->slug }}</code>
            <div class="flex-1"></div>
            <div class="flex gap-2">
                <button class="bg-indigo-600 text-white font-bold rounded py-2 px-4" wire:click.prevent="edit({{ $tag->id }})" href="#">Update</button>
                <button class="bg-indigo-600 text-white font-bold rounded py-2 px-4" wire:click.prevent="delete({{ $tag->id }})" href="#">Delete</button>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="w-full max-w-sm mx-auto mt-12">
    @if (!$editMode)
        <form class="grid gap-2" action="" wire:submit.prevent="store">
            <input class="dark:bg-neutral-800 dark:text-neutral-300 outline-none py-2 px-4 rounded-sm" type="text" wire:model="title">
            <button class="dark:bg-indigo-600 dark:text-white font-bold rounded py-2 px-4" type="submit">Submit</button>
        </form>
    @else
        <form class="grid gap-2" action="" wire:submit.prevent="update">
            <input class="dark:bg-neutral-800 dark:text-neutral-300 outline-none py-2 px-4 rounded-sm" type="text" wire:model="title">
            <button class="dark:bg-indigo-600 dark:text-white font-bold rounded py-2 px-4" type="submit">Update</button>
        </form>
    @endif
    </div>
</div>
