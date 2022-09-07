<div class="w-full flex justify-center items-center mb-10">
    <form wire:submit.prevent="insert" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-100">
        <div class="grid grid-cols-2 mb-2">
            <div class="mb-1 mr-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="ime">
                    Ime
                </label>
                <input wire:model.defer="dete.ime"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="ime" name="ime" type="text">
                @error('dete.ime')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-1">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="prezime">
                    Prezime
                </label>
                <input wire:model.defer="dete.prezime"
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="prezime" name="prezime" type="text">
                @error('dete.prezime')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>


        </div>
        <div class="grid grid-cols-3">

            <div class="mb-1 mr-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="adresa">
                    Adresa
                </label>
                <input wire:model.defer="dete.adresa"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="adresa" name="adresa" type="text">
                @error('dete.adresa')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-1 mr-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="jmbg">
                    JMBG
                </label>
                <input wire:model.defer="dete.jmbg"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="jmbg" name="jmbg" type="text">
                @error('dete.jmbg')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-1">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="broj_ugovora">
                    Broj ugovora
                </label>
                <input wire:model.defer="dete.broj_ugovora"
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="broj_ugovora" name="broj_ugovora" type="text">
                @error('dete.broj_ugovora')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-3">

            <div class="mb-1 mr-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="ime_roditelja">
                    Ime roditelja
                </label>
                <input wire:model.defer="dete.ime_roditelja"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="ime_roditelja" name="ime_roditelja" type="text">
                @error('dete.ime_roditelja')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-1 mr-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="prezime_roditelja">
                    Prezime roditelja
                </label>
                <input wire:model.defer="dete.prezime_roditelja"
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="prezime_roditelja" name="prezime_roditelja" type="text">
                @error('dete.prezime_roditelja')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-1">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="broj_licne_karte">
                    Broj lične karte
                </label>
                <input wire:model.defer="dete.broj_licne_karte"
                    class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="broj_licne_karte" name="broj_licne_karte" type="text">
                @error('dete.broj_licne_karte')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex items-center justify-between mt-3">
            <button
                class="bg-green-600 w-full hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Unesi
            </button>
        </div>
    </form>
</div>
