<x-app-layout>
    <div class="py-12 w-full">
        <div class="mx-auto w-full sm:px-6 lg:px-8 flex">

            <div class="bg-white w-full overflow-y-auto dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex gap-x-2 p-2 text-xl">
                    <div class="font-bold ml-2">
                        Realtime
                    </div>
                    <div class="font-bold text-slate-400">
                        Energy
                    </div>
                </div>
                <div class="w-full grid grid-cols-4 gap-4">
                    <x-card-dashboard :name="'Power Phase'" :id="'powerphase'" :satuan="'mv'"></x-card-dashboard>
                    <x-card-dashboard :name="'Power Phase'" :id="'powerphase'" :satuan="'mv'"></x-card-dashboard>
                    <x-card-dashboard :name="'Power Phase'" :id="'powerphase'" :satuan="'mv'"></x-card-dashboard>
                    <x-card-dashboard :name="'Power Phase'" :id="'powerphase'" :satuan="'mv'"></x-card-dashboard>
                    <x-card-dashboard :name="'Power Phase'" :id="'powerphase'" :satuan="'mv'"></x-card-dashboard>
                    <x-card-dashboard :name="'Power Phase'" :id="'powerphase'" :satuan="'mv'"></x-card-dashboard>
                    <x-card-dashboard :name="'Power Phase'" :id="'powerphase'" :satuan="'mv'"></x-card-dashboard>

                </div>
            </div>
        </div>
    </div>
    @if (request()->is('dashboard'))
        <script></script>
    @endif
</x-app-layout>
