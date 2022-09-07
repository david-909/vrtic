@if (count($fakture) == 0)
    <div>Nema plaćenih faktura</div>
@else
    <div class="w-full px-6 py-3">
        <style>
            .viewpdf svg {
                transition: ease .2s
            }

            .viewpdf svg:hover {
                fill: #2c457a !important;
            }
        </style>

        <div class="flex justify-between items-baseline">
            <h2 class="px-2 py-2 text-3xl">{{ $fakture[0]->dete->ime }} {{ $fakture[0]->dete->prezime }} </h2>
            <h4 class="px-2 py-2 text-xl"> JMBG: {{ $fakture[0]->dete->jmbg }}</h4>
        </div>
        <div class="flex flex-col mt-2 py-6">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="table-auto w-full mb-6 border-1 border-separate rounded">
                            <thead class="border-y-2">
                                <tr>
                                    <th class="px-4 py-2 border-r-2 text-sm lg:text-lg">#</th>
                                    <th class="px-4 py-2 border-r-2 text-sm lg:text-lg">Broj fakture</th>
                                    <th class="px-4 py-2 border-r-2 text-sm lg:text-lg">Uplaćeno</th>
                                    <th class="px-4 py-2 border-r-2 text-sm lg:text-lg">Datum</th>
                                    <th class="px-4 py-2 text-sm lg:text-lg">Faktura</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fakture as $faktura)
                                    <tr>
                                        <td class="px-4 py-2 border-r-2 border-t-2 text-sm lg:text-lg">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-4 py-2 border-r-2 border-t-2 text-sm lg:text-lg">
                                            {{ $faktura->broj_fakture }}
                                        </td>
                                        <td class="px-4 py-2 border-r-2 border-t-2 text-sm lg:text-lg">
                                            {{ $faktura->placeno }} RSD
                                        </td>
                                        <td class="px-4 py-2 border-r-2 border-t-2 text-sm lg:text-lg">
                                            {{ date('d.m.Y', strtotime(explode(' ', $faktura->updated_at)[0])) }}
                                        </td>
                                        <td class="px-4 py-2 border-t-2 text-sm lg:text-lg">
                                            <a href="{{ $faktura->putanja }}" target="_blank" class="viewpdf">
                                                @component('components.view-pdf')
                                                @endcomponent
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $fakture->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
