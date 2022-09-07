<div class="px-5 py-5 flex flex-col">
    <h2 class="text-center text-xl">Da li ste sigurni da je ugovor <span class="text-red-500">{{ $ugovor->broj_ugovora }}
            ({{ $ugovor->dete->ime }}
            {{ $ugovor->dete->prezime }})</span>
        neaktivan?</h2>
    <div class="flex flex-row justify-center align-middle mt-2">
        <button wire:click="$emit('closeModal')" class="rounded py-1 px-3 bg-gray-500 mr-3 hover:bg-gray-700">Ne</button>
        <button wire:click="deaktiviraj({{ $ugovor->id }})"
            class="rounded py-1 px-3 bg-red-600 hover:bg-red-400">Da</button>
    </div>
</div>
