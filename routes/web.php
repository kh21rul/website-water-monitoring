<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringController;

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

Route::get('/', function() {
    return view('monitoring');
});

Route::get('/bacasuhu', [MonitoringController::class, 'bacasuhu']);
Route::get('/bacakekeruhan', [MonitoringController::class, 'bacakekeruhan']);
Route::get('/bacaph', [MonitoringController::class, 'bacaph']);
Route::get('/bacado', [MonitoringController::class, 'bacado']);
Route::get('/bacakualitasair', [MonitoringController::class, 'bacakualitasair']);
Route::get('/bacakendali', [MonitoringController::class, 'bacakendali']);

// Route untuk menyimpan nilai sensor ke database
Route::get('/simpan/{temperature}/{turbidity}/{ph}/{dissolved_oxygen}/{kualitas_air}/{sistem_kendali}', [MonitoringController::class, 'simpan']);