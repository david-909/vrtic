<?php

namespace App\Http\Livewire;

use App\Models\Deca;
use App\Models\Ugovor;
use App\Rules\BrojUgovoraRule;
use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use stdClass;

class ObnovaUgovora extends ModalComponent
{
    public $search = "";
    public Ugovor $ugovor;

    public function mount(Ugovor $ugovor)
    {
        $this->ugovor = $ugovor;
    }

    public function render()
    {
        $deca = "";
        if (!empty($this->search)) {
            $deca =  Deca::where("id", "LIKE", "%$this->search%")
                ->orWhere("ime", "LIKE", "%$this->search%")
                ->orWhere("prezime", "LIKE", "%$this->search%")
                ->orWhere("jmbg", "LIKE", "%$this->search%")->get();
        }
        return view('livewire.obnova-ugovora', ["deca" => $deca]);
    }

    public function insert()
    {
        $this->validate();
        $this->ugovor->active = 1;
        try {
            $ugovor = Ugovor::where("dete_id", $this->ugovor->dete_id)->where("active", 1)->first();
            $ugovor->active = 0;
            $ugovor->save();
            $this->ugovor->save();
            Toastr::addSuccess("Uspešno ste obnovili ugovor.");
        } catch (\Throwable $th) {
            Toastr::addError("Došlo je do greške prilikom obnove ugovora.");
            Log::error("Doslo je do greske (ObnovaUgovora) " . $th->getMessage());
        }
        $this->closeModalWithEvents([
            DecaTabelica::getName() => "deteUpdated"
        ]);
    }

    public function rules()
    {
        return [
            "ugovor.dete_id" => "required",
            "ugovor.ime_nosioca" => ["required"],
            "ugovor.prezime_nosioca" => ["required"],
            "ugovor.broj_licne_karte" => ["required", "digits:9"],
            "ugovor.broj_ugovora" => ["required", new BrojUgovoraRule()]
        ];
    }
    public function messages()
    {
        return [
            "ugovor.dete_id.required" => "Morate izabrati dete",
            "ugovor.ime_nosioca.required" => "Ime je obazeno",
            "ugovor.prezime_nosioca.required" => "Prezime je obazeno",
            "ugovor.broj_licne_karte.required" => "Broj lične karte je obavezan",
            "ugovor.broj_licne_karte.digits" => "Broj lične karte mora sadržati tačno 9 cifara",
            "ugovor.broj_ugovora.required" => "Broj ugovora je obavezan",
        ];
    }
}
