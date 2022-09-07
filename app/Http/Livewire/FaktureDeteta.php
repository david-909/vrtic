<?php

namespace App\Http\Livewire;

use App\Models\Faktura;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\WithPagination;
use LivewireUI\Modal\ModalComponent;

class FaktureDeteta extends ModalComponent
{
    use WithPagination;

    public $amount = 10;

    public function mount($dete_id)
    {
        $this->dete_id = $dete_id;
    }
    public function render()
    {
        $fakture = Faktura::with(["dete", "mesec", "godina"])->where("dete_id", $this->dete_id)->whereRaw("iznos = placeno")->paginate(10);

        return view('livewire.fakture-deteta', ["fakture" => $fakture]);
    }

    public function loadMore()
    {
        $this->amount += 10;
    }
}
