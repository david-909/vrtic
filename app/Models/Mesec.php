<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesec extends Model
{
    use HasFactory;
    protected $table = "meseci";

    public function fakture()
    {
        return $this->hasMany(Faktura::class, 'mesec_id');
    }
}
