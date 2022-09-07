<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ugovor extends Model
{
    use HasFactory;
    protected $table = "ugovori";
    protected $fillable = ["dete_id", "broj_ugovora", "ime_nosioca", "prezime_nosioca", "broj_licne_karte", "created_at", "updated_at", "active"];

    public function dete()
    {
        return $this->belongsTo(Deca::class, 'dete_id');
    }
}
