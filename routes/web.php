<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LaconController;
use App\Http\Controllers\JeniskegiatanController;
use App\Http\Controllers\SosialController;
use App\Http\Controllers\MesjidController;
use App\Http\Controllers\YatimController;

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



Auth::routes([
    'register' => false
]);

// Admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::group(['prefix' => '/dashboard'], function(){

    // Route::middleware('auth')->group(function () {

        Route::resource('/kegiatan', KegiatanController::class);
        Route::post('/kegiatan_ajax', [KegiatanController::class, 'ajax']);
        Route::get('/single_kegiatan', [KegiatanController::class, 'singleKegiatan']);
        
        Route::resource('/pengurus', PengurusController::class);
        Route::resource('/jabatan', JabatanController::class);
        Route::resource('/lacon', LaconController::class);
        Route::resource('/jeniskegiatan', JeniskegiatanController::class);

        // Bagian keuangan mesjid
        Route::resource('/sosial', SosialController::class);
        Route::resource('/mesjid', MesjidController::class);
        Route::resource('/yatim', YatimController::class);
        

    // });


    
});

