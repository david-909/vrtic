<div class="w-full">
    <form wire:submit.prevent="update" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-100">
        <div class="grid grid-cols-4 mb-2">
            <div class="mr-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="broj_ugovora">
                    Broj ugovora
                </label>
                <input wire:model.defer="ugovor.broj_ugovora"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="broj_ugovora" name="broj_ugovora" type="text" value="{{ $ugovor->broj_ugovora }}">
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
                    id="ime_nosioca" name="ime_nosioca" type="text" value="{{ $ugovor->ime_nosioca }}">
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
                    id="prezime_nosioca" name="prezime_nosioca" type="text" value="{{ $ugovor->prezime_nosioca }}">
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
                    id="broj_licne_karte" name="broj_licne_karte" type="text" value="{{ $ugovor->broj_licne_karte }}">
                @error('dete.prezime')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex items-center justify-between mt-3">
            <button
                class="bg-orange-500 w-full hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Izmeni
            </button>
        </div>
    </form>
</div>
