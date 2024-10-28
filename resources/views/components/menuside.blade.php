<a wire:navigate href="{{ route('section', ['name' => $route]) }}"
    class="flex items-center w-full {{ request()->is('dashboard/' . $route) ? 'bg-[#77CDFF] bg-opacity-15 text-sky-700' : 'hover:bg-[#77CDFF] hover:bg-opacity-15 hover:text-sky-700' }} rounded-lg gap-x-2 font-semibold px-1 py-2">
    <div class="py-1 rounded-lg text-sm px-2.5 bg-[#0D92F4] bg-opacity-50 border-2 border-sky-500">
        {{ $logo }}
    </div>
    <div>
        {{ $logo }} - Axis
    </div>
</a>
