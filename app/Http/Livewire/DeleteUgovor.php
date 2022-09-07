<?php

namespace App\Http\Livewire;

use App\Models\Ugovor;
use Flasher\Toastr\Laravel\Facade\Toastr;
use LivewireUI\Modal\ModalComponent;

class DeleteUgovor extends ModalComponent
{
    public $dete_id;
    public Ugovor $ugovor;

    public function mount($dete_id, Ugovor $ugovor)
    {
        $this->dete_id = $dete_id;
        $this->ugovor = $ugovor->with(["dete"])->where("dete_id", $this->dete_id)->where("active", 1)->first();
    }
    public function render()
    {
        return view('livewire.delete-ugovor', ["ugovor" => $this->ugovor]);
    }

    public function deaktiviraj($ugovorId)
    {
        try {
            $ugovor = Ugovor::find($ugovorId);
            $ugovor->active = 0;
            $ugovor->save();
            Toastr::addSuccess("Uspešno ste deaktivirali ugovor.");
            $this->closeModalWithEvents([
                DecaTabelica::getName() => "deteUpdated"
            ]);
        } catch (\Throwable $th) {
            Toastr::addSuccess("Došlo je do greške.");
            $this->closeModalWithEvents([
                DecaTabelica::getName() => "deteUpdated"
            ]);
        }
    }
}
