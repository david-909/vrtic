<div class="w-full">
    <form wire:submit.prevent="insert" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-100">
        <div class="flex flex-row">
            <div class="w-1/2 mx-1 mb-3">
                <input wire:model.debounce.300ms="search" type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Pretraži decu">
                @error('ugovor.dete_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-1/2 mx-1">
                @if (!empty($deca))
                    @foreach ($deca as $dete)
                        <div>
                            <input type="radio" name="dete_id" wire:model.defer="ugovor.dete_id"
                                id="{{ $dete->id }}{{ $dete->ime }}{{ $dete->prezime }}"
                                value="{{ $dete->id }}">
                            <label for="{{ $dete->id }}{{ $dete->ime }}{{ $dete->prezime }}">{{ $dete->ime }}
                                {{ $dete->prezime }} ({{ $dete->jmbg }})</label>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
        <div class="grid grid-cols-4 mb-2">
            <div class="mr-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="broj_ugovora">
                    Broj ugovora
                </label>
                <input wire:model.defer="ugovor.broj_ugovora"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="broj_ugovora" name="broj_ugovora" type="text">
                @error('ugovor.broj_ugovora')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mr-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="ime_nosioca">
                    Ime nosioca
                </label>
                <input wire:model.defer="ugovor.ime_nosioca"
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="ime_nosioca" name="ime_nosioca" type="text">
                @error('ugovor.ime_nosioca')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mr-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="prezime_nosioca">
                    Prezime nosioca
                </label>
                <input wire:model.defer="ugovor.prezime_nosioca"
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="prezime_nosioca" name="prezime_nosioca" type="text">
                @error('ugovor.prezime_nosioca')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mr-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="broj_licne_karte">
                    Broj lične karte
                </label>
                <input wire:model.defer="ugovor.broj_licne_karte"
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="broj_licne_karte" name="broj_licne_karte" type="text">
                @error('dete.prezime')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex items-center justify-between mt-3">
            <button
                class="bg-cyan-900 w-full hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Unesi ugovor
            </button>
        </div>
    </form>
</div>
