<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OngkirController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cekOngkir', [OngkirController::class,'index']);
Route::get('/provinces/{id}/cities', [OngkirController::class,'getCities']);
Route::post('/cekOngkir', [OngkirController::class,'submit']);


