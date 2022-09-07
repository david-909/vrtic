<?php

namespace App\Http\Livewire;

use App\Models\Deca;
use App\Models\Ugovor;
use App\Rules\BrojUgovoraRule;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditUgovor extends ModalComponent
{
    public Ugovor $ugovor;

    public function mount(Ugovor $ugovor)
    {
        $this->ugovor = $ugovor;
    }
    public function render()
    {
        Debugbar::info($this->ugovor);
        return view('livewire.edit-ugovor', ["ugovor" => $this->ugovor]);
    }
    public function update()
    {
        $this->validate();
        $this->ugovor->save();
        toastr()->addSuccess('Uspešno promenjeni podaci o ugovoru.');
        $this->closeModalWithEvents([
            DecaTabelica::getName() => "deteUpdated"
        ]);
    }
    public function rules()
    {
        return [

            "ugovor.ime_nosioca" => ["required"],
            "ugovor.prezime_nosioca" => ["required"],
            "ugovor.broj_licne_karte" => ["required", "digits:9"],
            "ugovor.broj_ugovora" => ["required", new BrojUgovoraRule()]
        ];
    }
    public function messages()
    {
        return [
            "ugovor.ime_nosioca.required" => "Ime je obazeno",
            "ugovor.prezime_nosioca.required" => "Prezime je obazeno",
            "ugovor.broj_licne_karte.required" => "Broj lične karte je obavezan",
            "ugovor.broj_licne_karte.digits" => "Broj lične karte mora sadržati tačno 9 cifara",
            "ugovor.broj_ugovora.required" => "Broj ugovora je obavezan",
        ];
    }
}
