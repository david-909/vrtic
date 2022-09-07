<?php

use App\Http\Controllers\DecaController;
use App\Http\Controllers\FakturaController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\FaktureDeteta;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DecaController::class, "index"])->name("deca.index");
Route::post("/fileupload", [FileController::class, "upload"])->name("file.upload");
