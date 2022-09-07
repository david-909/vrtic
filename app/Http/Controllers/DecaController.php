<?php

namespace App\Http\Controllers;

use App\Models\Deca;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DecaController extends Controller
{
    public function index()
    {
        return view("pages.index");
    }   
}
