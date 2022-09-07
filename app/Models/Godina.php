<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Godina extends Model
{
    use HasFactory;
    protected $table = "godine";

    public function fakture()
    {
        return $this->hasMany(Faktura::class, 'godina_id');
    }
}
