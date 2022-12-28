<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\pemasukanController;
use App\Http\Controllers\Cita2Controller;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\pengeluaranController;
use App\Http\Controllers\landingpageController;
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

Route::get('/', [landingpageController::class, 'index']);
Route::get('/login', [LandingController::class, 'login']);

Route::get('/home/about/{id}', [HomeController::class, 'about']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/cita-cita/detail/{citacita_id}', [Cita2Controller::class, 'detail']);
Route::get('/cita-cita/edit/{citacita_id}', [Cita2Controller::class, 'edit']);
Route::post('/cita-cita/update/{citacita_id}', [Cita2Controller::class, 'update']);
Route::get('/cita-cita/delete/{citacita_id}', [Cita2Controller::class, 'delete']);

Route::get('/cita-cita', [Cita2Controller::class, 'index'])->name('citacita');
Route::get('/kalkulator', [KalkulatorController::class, 'index'])->name('kalkulator');
Route::post('/kalkulator/insert', [KalkulatorController::class, 'insert']);
Route::post('/cita-cita/insert', [Cita2Controller::class, 'insert']);
Route::get('/cita-cita/add', [Cita2Controller::class, 'add']);
Route::get('/kalkulator/add', [KalkulatorController::class, 'add']);
Route::get('kalkulator/delete/{calculator_id}', [KalkulatorController::class, 'delete']);
Auth::routes();

Route::get('/pemasukan', [pemasukanController::class, 'index'])->name('pemasukan');
Route::get('/pemasukan/add', [pemasukanController::class, 'add']);
Route::post('/pemasukan/insert', [pemasukanController::class, 'insert']);
Route::get('/pemasukan/delete/{pemasukan_id}', [pemasukanController::class, 'delete']);

Route::get('/pengeluaran', [pengeluaranController::class, 'index'])->name('pengeluaran');
Route::get('/pengeluaran/add', [pengeluaranController::class, 'add']);
Route::post('/pengeluaran/insert', [pengeluaranController::class, 'insert']);
Route::get('/pengeluaran/delete/{pengeluaran_id}', [pengeluaranController::class, 'delete']);
Route::get('/home', [HomeController::class, 'index'])->name('home');



