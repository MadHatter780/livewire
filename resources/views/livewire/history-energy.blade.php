<div class="py-12 w-full h-full">
    <div class="mx-auto w-full h-full sm:px-6 lg:px-8 flex">
        <div class="bg-white p-1 w-full h-full border-2 dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col h-full">
                <div class="flex gap-x-2 p-1 text-xl">
                    <div class="font-bold ml-2">
                        Reporting
                    </div>
                    <div class="font-bold text-slate-400">
                        Power
                    </div>
                </div>
                <div class=" text-sm p-2 justify-between">
                    <div class="text-xl w-full border-b-2 font-mono border-slate-400 font-bold text-slate-400 p-1 ">
                        Filter
                    </div>
                    <div class="mt-2">
                        <div class="w-full flex gap-x-3">
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
                            <div class="flex" id="select">
                                <div class="flex items-center gap-x-1">
                                    <label for="" class="text-sm">
                                        Time Filter :
                                    </label>
                                    <div class="w-40">
                                        <select id="tf" wire:model.live="timeFilter"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected value="">{{ __('---') }}</option>
                                            <option value="week">{{ __('Week') }}</option>
                                            <option value="month">{{ __('Month') }}</option>
                                            <option value="year">{{ __('Year') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-2 mt-2 relative h-full ">

                    <div class="text-3xl border-b-4 text-slate-500 mt-4 font-semibold font-mono">
                        Section {{ $dataBySection ? '' : '' }}
                    </div>
                    <div class="flex mt-10 p-2  flex-row gap-x-2 h-full  justify-around">
                        <x-kotak logo="bi-lightning-charge-fill" warna="green" title="Energy Consumption"
                            datas="{{ $energy }}" satuan="kwh" />
                        <x-kotak logo="bi-currency-dollar" warna="blue" title="Cost" datas="{{ $cost }}"
                            satuan="kwh" />
                        <x-kotak logo="bi-buildings" warna="orange" title="Carbon" datas="{{ $carbon }}"
                            satuan="kwh" />

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
