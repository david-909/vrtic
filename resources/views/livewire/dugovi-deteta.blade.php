<div class="w-full px-6 py-3">
    <div class="flex justify-between items-baseline">
        <h2 class="px-2 py-2 text-3xl">{{ $dete->ime }} {{ $dete->prezime }} </h2>
        <h4 class="px-2 py-2 text-xl"> JMBG: {{ $dete->jmbg }}</h4>
    </div>
    <div class="flex flex-col mt-2 py-6">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="table-auto w-full mb-6 border-1 border-separate rounded">
                        <thead class="border-y-2">
                            <tr>
                                <th class="px-4 py-2 border-r-2 text-sm lg:text-lg">#</th>
                                <th class="px-4 py-2 border-r-2 text-sm lg:text-lg">Mesec/Godina</th>
                                <th class="px-4 py-2 border-r-2 text-sm lg:text-lg">Zaduženje</th>
                                <th class="px-4 py-2 border-r-2 text-sm lg:text-lg">Uplaćeno</th>
                                <th class="px-4 py-2 text-sm lg:text-lg">Dugovanje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $ukupno = 0;
                            @endphp
                            @foreach ($dugovi as $dug)
                                <tr>
                                    <td class="px-4 py-2 border-r-2 border-t-2 text-sm lg:text-lg">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-4 py-2 border-r-2 border-t-2 text-sm lg:text-lg">
                                        {{ $dug->mesec->mesec }} {{ $dug->godina->godina }}
                                    </td>
                                    <td class="px-4 py-2 border-r-2 border-t-2 text-sm lg:text-lg">
                                        {{ explode('.', $dug->iznos)[0] }} RSD
                                    </td>
                                    <td class="px-4 py-2 border-r-2 border-t-2 text-sm lg:text-lg">
                                        {{ explode('.', $dug->placeno)[0] }} RSD
                                    </td>
                                    <td class="px-4 py-2 border-t-2 text-sm lg:text-lg flex flex-row align-middle">
                                        <span>@php $ukupno += $dug->iznos - $dug->placeno @endphp
                                            {{ $dug->iznos - $dug->placeno }} RSD</span>
                                        <button wire:click="plati({{ $dug->id }})" type="submit" class="btn-pay">
                                            @component('components.pay-svg')
                                            @endcomponent
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex w-full justify-end">
            <span class="text-xl">Ukupno: &nbsp;</span> <span
                class="text-red-500 text-xl">{{ $ukupno }}</span><span class="text-xl">&nbsp;RSD</span>
        </div>
    </div>
</div>
