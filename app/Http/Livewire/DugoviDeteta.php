<?php

namespace App\Http\Livewire;

use App\Models\Deca;
use App\Models\Faktura;
use Barryvdh\Debugbar\Facades\Debugbar;
use Flasher\Laravel\Http\Request;
use Flasher\Toastr\Laravel\Facade\Toastr;
use LivewireUI\Modal\ModalComponent;


class DugoviDeteta extends ModalComponent
{
    public $listeners = ["fakturaPlacena" => "mount", "fakturaRender" => "render"];

    public $dete_id;
    public $dete;
    public $dugovi;
    public Faktura $faktura;

    public function mount($dete_id, Faktura $faktura)
    {
        $this->faktura = $faktura;
        $this->dete = Deca::where("id", $this->dete_id)->select(["ime", "prezime", "jmbg"])->first();
        $this->dugovi = Faktura::with(["godina", "mesec"])->where("dete_id", $dete_id)->whereRaw("iznos != placeno")->get();
    }
    public function render()
    {
        return view('livewire.dugovi-deteta', ["dugovi" => $this->dugovi, "dete" => $this->dete]);
    }

    public function plati($fakturaId)
    {
        $iznos = new Fakturisanje();
        $iznos = $iznos->iznos;
        $faktura = Faktura::where("id", $fakturaId)->first();
        $faktura->placeno = $iznos;
        $faktura->save();
        Toastr::addSuccess("Faktura je plaćena.");
        $this->emitTo("deca-tabelica", "deteUpdated");
        $this->emit("fakturaRender");
        $this->emit("fakturaPlacena", $this->dete_id);
    }
}
