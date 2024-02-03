<?php

use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KwitansiController;
use App\Http\Controllers\PajakDaerahController;
use App\Http\Controllers\PenerimaContoller;
use App\Http\Controllers\PptkContoller;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\SpdController;
use App\Http\Controllers\SubController;
use App\Http\Controllers\TempKwitansiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', UserController::class)->middleware('userAccess:admin');
    Route::resource('program', ProgramController::class)->middleware('userAccess:user');
    Route::resource('kegiatan', KegiatanController::class)->middleware('userAccess:user');
    Route::resource('sub', SubController::class)->middleware('userAccess:user');
    Route::resource('rekening', RekeningController::class)->middleware('userAccess:user');
    Route::resource('anggaran', AnggaranController::class);
    Route::resource('spd', SpdController::class);
    Route::resource('pptk', PptkContoller::class);
    Route::resource('penerima', PenerimaContoller::class);
    Route::resource('pengelola', DecisionController::class);
    Route::resource('kwitansi', KwitansiController::class);
    Route::resource('tempkwitansi', TempKwitansiController::class);
    Route::get('/modalcaripagu', [KwitansiController::class, 'modalCariPagu']);
    Route::get('/modalcaripenerima', [KwitansiController::class, 'modalCariPenerima']);
    Route::resource('pajakdaerah', PajakDaerahController::class);
    Route::post('/kwitansi/generate-pajak-daerah', [KwitansiController::class, 'generatePajakDaerah'])->name('kwitansi.generatePajakDaerah');
});
