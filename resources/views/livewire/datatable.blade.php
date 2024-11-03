<div class="w-full h-full flex-col gap-y-1 flex">
    <div class="flex gap-x-2 p-1 text-xl">
        <div class="font-bold ml-2">
            Reporting
        </div>
        <div class="font-bold text-slate-400">
            Energy
        </div>
    </div>
    <div class="w-full  justify-between flex p-2">
        <div class="flex  " id="select">
            <div class="flex items-center gap-x-1">
                <label for="" class="text-sm">
                    Section :
                </label>
                <div class="w-40">
                    <select id="countries" wire:model.live="dataBySection"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">{{ __('---') }}</option>
                        <option value="A">{{ __('A') }}</option>
                        <option value="C">{{ __('C') }}</option>
                        <option value="Spadle">{{ __('Spadle') }}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex gap-x-2">
            <div class="flex  items-center gap-x-1" id="select">
                <div>
                    Filter By Date :
                </div>
                <div class="flex items-center gap-x-1">
                    <div id="date-range-picker" date-rangepicker class="flex items-center">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="datepicker-range-start" wire:model.live="dateStart" name="start" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date start">
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="datepicker-range-end" name="end" type="text" wire:model="dateEnd"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date end">
                        </div>

                        <div>

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search Mockups, Logos..." required />
                </div>
            </div>
        </div>
    </div>
    <div class="text-sm items-center flex p-1">
        <div class="">
            Export &nbsp; : &nbsp;
        </div>
        <div class=" flex text-xl gap-x-3">
            <div class="flex items-center gap-x-1">
                <i class="bi  bi-file-earmark-excel-fill bg-green-600 px-1.5 py-0.5 text-white rounded-md"></i>
                <div class="text-sm font-semibold text-green-400">
                    Excel
                </div>
            </div>
            <div class="flex items-center gap-x-1">
                <i class="bi  bi-file-earmark-pdf-fill bg-red-600 px-1.5 py-0.5 text-white rounded-md"></i>

                <div class="text-sm font-thin text-red-400">
                    PDF
                </div>
            </div>
        </div>
    </div>
    <div class="p-1 font-thin text-base">
        <i class="bi bi-table"></i>
        Table Power Meter
    </div>
    <div class="overflow-auto  ">

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border border-gray-300">
            <thead class="text-xs text-white uppercase bg-black dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 border border-gray-300 rounded-s-lg">No</th>
                    <th scope="col" class="px-6 py-3 border border-gray-300">Label</th>
                    <th scope="col" class="px-6 py-3 border border-gray-300">Section</th>
                    <th scope="col" class="px-6 py-3 border border-gray-300">Voltage ( V )</th>
                    <th scope="col" class="px-6 py-3 border border-gray-300">Power Phase ( kWh )</th>
                    <th scope="col" class="px-6 py-3 border border-gray-300">Power Fac ( kWh )</th>
                    <th scope="col" class="px-6 py-3 border border-gray-300">Sensor ( &deg;C )</th>
                    <th scope="col" class="px-6 py-3 border border-gray-300 rounded-e-lg">Count Session</th>
                    <th scope="col" class="px-6 py-3 border border-gray-300">Created At</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td class="px-6 py-3 border border-gray-300">{{ $index + 1 }}</td>
                        <td class="px-6 py-3 border border-gray-300">{{ $item->label }}</td>
                        <td class="px-6 py-3 border border-gray-300">{{ $item->section }}</td>
                        <td class="px-6 py-3 border border-gray-300">{{ $item->voltage }}</td>
                        <td class="px-6 py-3 border border-gray-300">{{ $item->powerphase }}</td>
                        <td class="px-6 py-3 border border-gray-300">{{ $item->powerfac }}</td>
                        <td class="px-6 py-3 border border-gray-300">{{ $item->sensor }}</td>
                        <td class="px-6 py-3 border border-gray-300">{{ $item->count_session }}</td>
                        <td class="px-6 py-3 border border-gray-300">{{ $item->created_at }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $data->links() }}
        </div>
    </div>

</div>
