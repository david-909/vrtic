<div class="w-4/5 mx-auto nmebitno">
    <div class="w-full flex pb-4">
        <div class="w-full mx-1">
            <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-row justify-center">
                    <label for="file"
                        class="text-sm w-1/5 text-grey-500 mr-5 py-2 px-6 rounded border-0 font-medium bg-blue-50 text-blue-700 hover:cursor-pointer hover:text-fuchsia-700">Izaberi
                        XML</label>
                    <input type="file" id="file" name="file" class="hidden">
                    <button type="submit"
                        class="block appearance-none align-middle px-4 py-2 mt-1 bg-fuchsia-600 hover:bg-fuchsia-800 text-white rounded text-xs lg:text-xs w-1/5">Uvezi
                        XML</button>
                </div>
            </form>
        </div>
    </div>
    <div class="w-full flex pb-10">
        <div class="w-4/12 mx-1">
            <input wire:model.debounce.300ms="search" type="text"
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                placeholder="Pretraži decu">
        </div>
        <div class="w-2/12 relative mx-1">
            <select wire:model="active"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value="1">Aktivni ugovori</option>
                <option value="0">Istekli ugovori</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="w-1/12 relative mx-1">
            <select wire:model="orderBy"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value="id">ID</option>
                <option value="ime">Ime</option>
                <option value="prezime">Prezime</option>
                <option value="jmbg">JMBG</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>

        <div class="w-1/6 relative mx-1">
            <select wire:model="orderAsc"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value="ASC">Rastuće</option>
                <option value="DESC">Opadajuće</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="w-1/12 relative mx-1">
            <select wire:model="perPage"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option>10</option>
                <option>15</option>
                <option>20</option>
                <option>50</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="w-1/12 mx-1 text-center">
            <button wire:click="$emit('openModal', 'insert-dete')"
                class="block appearance-none align-middle px-1 py-3 mt-1 bg-green-600 hover:bg-green-800 text-white rounded text-xs lg:text-xs w-full">Dodaj
                dete</button>
        </div>
        <div class="w-1/12 mx-1 text-center">
            <button wire:click="$emit('openModal', 'obnova-ugovora')"
                class="block appearance-none align-middle px-1 py-3 mt-1 bg-cyan-900 hover:bg-cyan-700 text-white rounded text-xs lg:text-xs w-full">Obnovi
                ugovor</button>
        </div>
    </div>

    <div class="flex flex-col mt-2">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="table-auto w-full mb-6 border-1 border-separate rounded">
                        <thead class="border-y-2">
                            <tr>
                                <th class="px-4 py-2 border-r-2 text-sm lg:text-lg">#</th>
                                <th class="px-4 py-2 border-r-2 text-sm lg:text-lg">Ime i prezime</th>
                                <th class="px-4 py-2 border-r-2 text-sm lg:text-lg">Ime roditelja</th>
                                <th class="px-4 py-2 border-r-2 text-sm lg:text-lg">JMBG</th>
                                <th class="px-4 py-2 border-r-2 text-sm lg:text-lg">Broj ugovora</th>
                                <th class="px-4 py-2 border-r-2 text-sm lg:text-lg text-center">Ukupan dug</th>
                                <th class="px-2 py-2 text-center">Opcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deca as $dete)
                                <tr class="">
                                    <td class="px-4 py-2 border-r-2 border-t-2 text-sm lg:text-lg">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-4 py-2 border-r-2 border-t-2 text-sm lg:text-lg">
                                        {{ $dete->ime }} {{ $dete->prezime }}
                                    </td>
                                    <td class="px-4 py-2 border-r-2 border-t-2 text-sm lg:text-lg ">
                                        @foreach ($dete->ugovori as $ugovor)
                                            @if ($ugovor->active == 1)
                                                {{ $ugovor->ime_nosioca }}
                                            @endif
                                        @endforeach

                                    </td>
                                    <td class="px-4 py-2 border-r-2 border-t-2 text-sm lg:text-lg">
                                        {{ $dete->jmbg }}
                                    </td>
                                    <td
                                        class="px-4 py-2 border-r-2 border-t-2 text-sm lg:text-lg flex align-middle justify-between">
                                        @foreach ($dete->ugovori as $ugovor)
                                            @if ($active == 1 || $active == '1')
                                                @if ($ugovor->active == 1)
                                                    <span class="mt-1">{{ $ugovor->broj_ugovora }}</span>
                                                    <button class="btn-crud btn-crud1"
                                                        wire:click='$emit("openModal", "edit-ugovor", @json([$ugovor]))'>
                                                        @component('components.edit-svg')
                                                        @endcomponent
                                                    </button>
                                                @endif
                                            @endif
                                            @if ($active == 0 || $active == '0')
                                                @if ($ugovor->active == 0)
                                                    {{ $ugovor->broj_ugovora }}
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="px-4 py-2 border-r-2 border-t-2 text-sm lg:text-lg text-center">
                                        @php
                                            $zaduzenje = 0;
                                            $placeno = 0;
                                        @endphp
                                        @foreach ($dete->fakture as $faktura)
                                            @php
                                                $zaduzenje += $faktura->iznos;
                                                $placeno += $faktura->placeno;
                                                
                                            @endphp
                                        @endforeach
                                        <button
                                            wire:click='$emit("openModal", "dugovi-deteta", {{ json_encode(['dete_id' => $dete->id]) }})'
                                            class="bg-red-600 hover:bg-red-800 text-white py-1 px-2 rounded w-4/5 text-sm lg:text-lg">{{ $zaduzenje - $placeno }}
                                            RSD</button>
                                    </td>
                                    <td class="px-2 py-2 border-t-2 text-center text-sm lg:text-lg">
                                        <button class="btn-crud btn-crud1"
                                            wire:click='$emit("openModal", "edit-dete", @json([$dete]))'>
                                            @component('components.edit-svg')
                                            @endcomponent
                                        </button>
                                        <button class="btn-crud btn-crud2"
                                            wire:click='$emit("openModal", "fakturisanje", {{ json_encode(['dete_id' => $dete->id]) }})'>
                                            @component('components.faktura-svg')
                                            @endcomponent
                                        </button>
                                        <button class="btn-crud btn-crud3"
                                            wire:click='$emit("openModal", "fakture-deteta", {{ json_encode(['dete_id' => $dete->id]) }})'>
                                            @component('components.viewfakture-svg')
                                            @endcomponent
                                        </button>
                                        @if ($active == 1 || $active == '1')
                                            <button class="btn-crud btn-crud4"
                                                wire:click='$emit("openModal", "delete-ugovor", {{ json_encode(['dete_id' => $dete->id]) }})'>
                                                @component('components.delete-svg')
                                                @endcomponent
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $deca->links() }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#file').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#file')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        });
    </script>
</div>
