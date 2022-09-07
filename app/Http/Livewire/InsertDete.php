<?php

namespace App\Http\Livewire;

use App\Models\Deca;
use App\Models\Ugovor;
use App\Rules\BrojUgovoraRule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class InsertDete extends ModalComponent
{
    public Deca $dete;

    public function mount(Deca $dete)
    {
        $this->dete = $dete;
    }

    public function render()
    {
        return view('livewire.insert-dete');
    }

    public function insert()
    {
        $this->validate();
        try {
            $id = Deca::insertGetId([
                "ime" => ucwords($this->dete["ime"]),
                "prezime" => ucwords($this->dete["prezime"]),
                "adresa" => ucwords($this->dete["adresa"]),
                "jmbg" => $this->dete["jmbg"],
                "ime_roditelja" => ucwords($this->dete["ime_roditelja"]),
                "prezime_roditelja" => ucwords($this->dete["prezime_roditelja"]),
                "broj_licne_karte" => $this->dete["broj_licne_karte"],
                "created_at" => Carbon::now("Europe/Belgrade")
            ]);
            Ugovor::insert([
                "dete_id" => $id,
                "broj_ugovora" => $this->dete["broj_ugovora"],
                "ime_nosioca" => ucwords($this->dete["ime_roditelja"]),
                "prezime_nosioca" => ucwords($this->dete["prezime_roditelja"]),
                "broj_licne_karte" => $this->dete["broj_licne_karte"],
                "active" => 1,
                "created_at" => Carbon::now("Europe/Belgrade")
            ]);
            toastr()->addSuccess('Uspešno uneti podaci o detetu.');
        } catch (\Throwable $th) {
            toastr()->addError('Došlo je do greške.');
            Log::error("Doslo je do greske prilikom dodavanja deteta (InsertDete) " . $th->getMessage());
        }

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
            "dete.jmbg" => ["required", "digits:13", "unique:deca,jmbg"],
            "dete.broj_licne_karte" => ["required", "digits:9", "unique:deca,broj_licne_karte"],
            "dete.broj_ugovora" => ["required", new BrojUgovoraRule(), "unique:ugovori,broj_ugovora"]
        ];
    }
    public function messages()
    {
        return [
            "dete.ime.required" => "Ime je obavezno",
            "dete.prezime.required" => "Prezime je obavezno",
            "dete.ime_roditelja.required" => "Ime roditelja je obavezno",
            "dete.prezime_roditelja.required" => "Prezime roditelja je obavezno",
            "dete.adresa.required" => "Adresa je obavezna",
            "dete.jmbg.required" => "JMBG je obavezan",
            "dete.jmbg.digits" => "JMBG mora sadržati tačno 13 cifara",
            "dete.jmbg.unique" => "JMBG već postoji",
            "dete.broj_licne_karte.required" => "Broj lične karte je obavezan",
            "dete.broj_licne_karte.digits" => "Broj lične karte mora sadržati tačno 9 cifara",
            "dete.broj_licne_karte.unique" => "Broj lične karte već postoji",
            "dete.broj_ugovora.required" => "Broj ugovora je obavezan",
            "dete.broj_ugovora.unique" => "Već postoji taj broj ugovora",
        ];
    }
}
