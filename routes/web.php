<?php

use App\Http\Controllers\PendudukController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('layout.home');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Penduduk
Route::get('/penduduk', [PendudukController::class, 'index'])->name('penduduk');
Route::get('/penduduk/add', [PendudukController::class, 'add']);
Route::post('/penduduk/simpan', [PendudukController::class, 'simpan']);
Route::get('/penduduk/edit/{id_penduduk}', [PendudukController::class, 'edit']);
Route::post('/penduduk/update/{id_penduduk}', [PendudukController::class, 'update']);
Route::get('/penduduk/delete/{id_penduduk}', [PendudukController::class, 'delete']);
Route::get('/penduduk/cari', [PendudukController::class, 'cari']);

// Region
Route::get('/wilayah', [RegionController::class, 'index'])->name('wilayah');
Route::get('/wilayah/add', [RegionController::class, 'add']);
Route::post('/wilayah/simpan', [RegionController::class, 'simpan']);
Route::get('/wilayah/edit/{id_wilayah}', [RegionController::class, 'edit']);
Route::post('/wilayah/update/{id_wilayah}', [RegionController::class, 'update']);
Route::get('/wilayah/delete/{id_wilayah}', [RegionController::class, 'delete']);
Route::get('/wilayah/cari', [RegionController::class, 'cari']);
// Table
Route::get('/surat', [SuratController::class, 'index'])->name('surat');
