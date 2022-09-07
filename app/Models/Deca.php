<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deca extends Model
{
    use HasFactory;
    protected $table = "deca";
    protected $fillable = ["ime", "prezime", "adresa", "jmbg", "ime_roditelja", "prezime_roditelja", "broj_licne_karte"];

    public function ugovori()
    {
        return $this->hasMany(Ugovor::class, 'dete_id');
    }
    public function fakture()
    {
        return $this->hasMany(Faktura::class, 'dete_id');
    }
}
