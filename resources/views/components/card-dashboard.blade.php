<div class="w-full p-2">
    <div class="p-2 bg-white w-full h-32 border shadow-lg rounded-lg border-slate-500">
        <div class="p-2 flex justify-between items-center font-semibold">
            <div>
                {{ $name }}
            </div>
            <div class="font-thin text-xs">
                Last Update on
            </div>
        </div>
        <div class="w-full text-6xl gap-x-2 flex justify-between items-center">
            <div class="text-sm flex gap-x-1 rounded-lg ml-4 py-1 px-3 text-green-500 bg-green-200">
                <div>
                    100
                </div>
                <i class="bi bi-triangle-fill"></i>
            </div>
            <div class="flex items-end gap-x-2">
                <div class="" id="{{ strtolower($id) }}" x-text="{{ strtolower($id) }}"></div>
                <div class="text-sm">
                    {{ $satuan }}
                </div>
            </div>
        </div>
    </div>
</div>
