@php
    $bgColor = 'bg-' . $warna . '-200';
    $textColor = 'text-' . $warna . '-500';
@endphp
<div>
    <div class="w-[24rem] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $title }}</div>

        <div class="mt-4 items-center flex justify-between">
            <div
                class="{{ str_replace(' ', '', $bgColor) }} {{ str_replace(' ', '', $textColor) }} px-3 py-2 rounded-lg">
                <i class="bi {{ $logo }} text-sm"></i>

            </div>

            <div class="flex items-end gap-x-1">
                <div class="text-4xl  tracking-tight ">
                    {{ $datas }}
                </div>
                <div class="text-sm  tracking-tight font-thin">
                    {{ $satuan }}
                </div>
            </div>
        </div>



    </div>
</div>
