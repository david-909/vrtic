<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktura extends Model
{
    use HasFactory;
    protected $table = "fakture";

    public function dete()
    {
        return $this->belongsTo(Deca::class, 'dete_id');
    }
    public function godina()
    {
        return $this->belongsTo(Godina::class, 'godina_id');
    }
    public function mesec()
    {
        return $this->belongsTo(Mesec::class, 'mesec_id');
    }
}
