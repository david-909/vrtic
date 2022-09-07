<?php

namespace App\Http\Livewire;

use App\Models\Deca;
use App\Models\Ugovor;
use App\Rules\BrojUgovoraRule;
use LivewireUI\Modal\ModalComponent;

class EditDete extends ModalComponent
{
    public Deca $dete;
    public Ugovor $ugovor;

    public function mount(Deca $dete, Ugovor $ugovor)
    {
        $this->dete = $dete;
        $this->ugovor = $ugovor->where("dete_id", $dete->id)->where("active", 1)->first();
    }
    public function render()
    {
        return view('livewire.edit-dete', ["dete" => $this->dete, "ugovor" => $this->ugovor]);
    }
    public function update()
    {
        $this->validate();
        $this->dete->save();
        $this->ugovor->save();
        toastr()->addSuccess('Uspešno promenjeni podaci o detetu.');
        $this->closeModalWithEvents([
            DecaTabelica::getName() => "deteUpdated"
        ]);
    }
    public function rules()
    {
        return [
            "dete.ime" => ["required"],
            "dete.prezime" => ["required"],
            "dete.ime_roditelja" => ["required"],
            "dete.prezime_roditelja" => ["required"],
            "dete.adresa" => ["required"],
            "dete.jmbg" => ["required", "digits:13", "unique:deca,jmbg," . $this->dete->id], //! Treci param se ignorise, tj nece da baca gresku ako se ne promeni jmbg jer je uniqe
            "dete.broj_licne_karte" => ["required", "digits:9", "unique:deca,broj_licne_karte," . $this->dete->id],
            "ugovor.broj_ugovora" => ["required", new BrojUgovoraRule()]
        ];
    }
    public function messages()
    {
        return [
            "dete.ime.required" => "Ime je obazeno",
            "dete.prezime.required" => "Prezime je obazeno",
            "dete.ime_roditelja.required" => "Ime roditelja je obazeno",
            "dete.prezime_roditelja.required" => "Prezime roditelja je obazeno",
            "dete.adresa.required" => "Adresa je obazena",
            "dete.jmbg.required" => "JMBG je obavezan",
            "dete.jmbg.digits" => "JMBG mora sadržati tačno 13 cifara",
            "dete.jmbg.unique" => "JMBG već postoji",
            "dete.broj_licne_karte.required" => "Broj lične karte je obavezan",
            "dete.broj_licne_karte.digits" => "Broj lične karte mora sadržati tačno 9 cifara",
            "dete.broj_licne_karte.unique" => "Broj lične karte već postoji",
            "ugovor.broj_ugovora.required" => "Broj ugovora je obavezan",
        ];
    }
}
