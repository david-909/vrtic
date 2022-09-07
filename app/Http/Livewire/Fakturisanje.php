<?php

namespace App\Http\Livewire;

use App\Mail\FakturaMail;
use App\Models\Deca;
use App\Models\Faktura;
use App\Models\Godina;
use App\Models\Mesec;
use App\Models\Ugovor;
use Barryvdh\Debugbar\Facades\Debugbar;
use Carbon\Carbon;
use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use LivewireUI\Modal\ModalComponent;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;


class Fakturisanje extends ModalComponent
{
    public $dete_id;
    public $iznos = 30000;
    public Deca $dete;
    public Faktura $faktura;

    public function mount(Faktura $faktura, Deca $dete, $dete_id)
    {
        $this->faktura = $faktura;
        $this->dete = $dete;
        $this->dete_id = $dete_id;
    }

    public function render()
    {
        $this->dete = Deca::select(["ime", "prezime", "ime_roditelja", "id", "adresa"])->where("id", $this->dete_id)->first();
        $this->meseci = Mesec::all();
        $this->godine = Godina::all();

        return view('livewire.fakturisanje', ["dete" => $this->dete, "meseci" => $this->meseci, "godine" => $this->godine]);
    }
    public function insert()
    {
        $this->validate();
        try {
            $provera = Faktura::where("dete_id", $this->dete_id)->where("godina_id", $this->faktura->godina_id)->where("mesec_id", $this->faktura->mesec_id)->first();
            if ($provera) {
                Toastr::addWarning("Već postoji takva faktura.");
                $this->closeModal();
            } else {
                $broj_ugovora = $this->dete->ugovori()->where("active", 1)->select("broj_ugovora")->first();
                $broj_fakture = $broj_ugovora->broj_ugovora . "-" . $this->faktura->mesec_id . "-" . $this->faktura->godina->godina;
                $mailTo = $this->faktura->mail != "" ? $this->faktura->mail : "kosticdavid99@gmail.com";

                $numberOfDays = cal_days_in_month(CAL_GREGORIAN, $this->faktura->mesec_id, $this->faktura->godina->godina);
                $datumRacuna = $numberOfDays . "." . $this->faktura->mesec_id . "." . $this->faktura->godina->godina;

                $documentFileName = $this->dete->ime . "-" . $this->dete->prezime . "-" . $broj_fakture . ".pdf";

                $ugovor = Ugovor::where("dete_id", $this->dete_id)->where("active", 1)->first();

                $image = file_get_contents(public_path("img/pdf_svg/LogoMaryPoppins.svg"));
                $logo = base64_encode($image);
                $mailData = [
                    'mesec' => $this->faktura->mesec->mesec,
                    'godina' => $this->faktura->godina->godina,
                    'adresa' => $this->dete->adresa,
                    'ime_nosioca' => $ugovor->ime_nosioca,
                    'prezime_nosioca' => $ugovor->prezime_nosioca,
                    'ime_deteta' => $this->dete->ime,
                    'ime_prezime_deteta' => $this->dete->ime . " " . $this->dete->prezime,
                    'adresa' => $this->dete->adresa,
                    'mesec' => $this->faktura->mesec->mesec,
                    'iznos' => $this->iznos,
                    'pib' => '111000111',
                    'maticni_broj' => '22002200',
                    'racun' => '160-0142542484546-25',
                    'telefon' => '0601234567',
                    'mail' => 'vrtic@mail.com',
                    'broj_fakture' => $broj_fakture,
                    'datumRacuna' => $datumRacuna,
                    'logo' => $logo,
                    'title' => "Faktura: " . $this->dete->ime . " " . $this->dete->prezime . " | " . $broj_fakture
                ];
                $pdf = Pdf::loadView("emails.faktura", [
                    "mailData" => $mailData
                ]);
                Storage::disk('public')->put("fakture/" . $documentFileName, $pdf->output());
                $path = Storage::url("fakture/" . $documentFileName);


                DB::table("fakture")->insert([
                    "dete_id" => $this->dete_id,
                    "godina_id" => $this->faktura->godina_id,
                    "mesec_id" => $this->faktura->mesec_id,
                    "iznos" => $this->iznos,
                    "putanja" => $path,
                    "placeno" => 0,
                    "broj_fakture" => $broj_fakture,
                    "created_at" => Carbon::now("Europe/Belgrade")
                ]);

                Mail::send('emails.tekst', ['mailData' => $mailData], function ($msg) use ($pdf, $mailData, $mailTo) {
                    $msg->to($mailTo);
                    $msg->attachData($pdf->output(), 'faktura.pdf');
                    $msg->subject($mailData["title"]);
                });

                Toastr::addSuccess("Uspešno ste napravili fakturu.");
                $this->closeModalWithEvents([
                    DecaTabelica::getName() => "deteUpdated"
                ]);
            }
        } catch (\Throwable $th) {
            Toastr::addError("Došlo je do greške.");
            Log::error("Doslo je do greske prilikom dodavanja fakture (Fakturisanje) " . $th->getMessage());
        }
    }
    public function rules()
    {
        return [
            "faktura.mesec_id" => "required|numeric|min:1",
            "faktura.godina_id" => "required|numeric|min:1",
            "faktura.mail" => "email|nullable",
        ];
    }
    public function messages()
    {
        return [
            "faktura.mesec_id.required" => "Morate izabrati mesec",
            "faktura.mesec_id.numeric" => "Morate izabrati mesec",
            "faktura.godina_id.required" => "Morate izabrati godinu.",
            "faktura.godina_id.numeric" => "Morate izabrati godinu.",
            "faktura.mail.email" => "Mail nije u dobrom formatu.",
        ];
    }
}
