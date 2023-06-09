<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PariwisataController;
use App\Http\Controllers\UlasanController;
use App\Models\Pariwisata;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/home', HomeController::class, ['names' => [
    'index' => 'home',
    'store' => 'store',
]]);


Route::resource('/pariwisata', PariwisataController::class)->middleware('auth');
Route::resource('/ulasan', UlasanController::class);
Route::get('/ulasan/create/{id}', [UlasanController::class, 'create']);


Route::POST('/login', [LoginController::class, 'index']);
Route::POST('/logout', [LoginController::class, 'logout']);
