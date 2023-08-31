<?php

use App\Http\Controllers\PatientController;
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

Route::middleware(['web'])->controller(PatientController::class)->group(function(){
    Route::get('/', 'login')->name('login');    
    Route::get('/otp', 'generateOtp')->name('otp.generate');
    Route::post('/', 'validateOtp')->name('otp.validate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');  
    Route::get('/prescription', 'prescription')->name('prescription');  
    Route::get('/prescription/download/{id}', 'prescriptionPDF')->name('prescription.pdf');  
    Route::get('/appointment', 'appointment')->name('appointment');  
    Route::get('/feedback', 'feedback')->name('feedback');
    Route::get('/logout', 'logout')->name('logout');  
});
