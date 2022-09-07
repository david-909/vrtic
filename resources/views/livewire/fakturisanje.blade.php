<div class="w-full flex justify-center items-center mb-10">
    <form wire:submit.prevent="insert" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-100">
        <div class="grid grid-cols-2">
            <div class="mb-1 mr-4 relative">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="adresa">
                    Mesec
                </label>
                <select wire:model.defer="faktura.mesec_id"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="0">Izaberi</option>
                    @foreach ($meseci as $mesec)
                        <option value="{{ $mesec->id }}">{{ $mesec->mesec }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex mt-4 items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </div>
                @error('faktura.mesec_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-1 mr-4 relative">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="jmbg">
                    Godina
                </label>
                <select wire:model.defer="faktura.godina_id"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="0">Izaberi</option>
                    @foreach ($godine as $godina)
                        <option value="{{ $godina->id }}">{{ $godina->godina }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 mt-4 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </div>
                @error('faktura.godina_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-1">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="jmbg">
                Email
            </label>
            <input type="text" wire:model.defer="faktura.mail"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                placeholder="Na ovaj mejl će stići faktura">
            @error('faktura.mail')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-between mt-3">
            <button
                class="bg-green-600 w-full hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Unesi fakturu
            </button>
        </div>
    </form>
</div>
