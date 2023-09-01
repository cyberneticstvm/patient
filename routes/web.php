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
});
Route::middleware(['web', 'check'])->controller(PatientController::class)->group(function(){
    Route::get('/dashboard', 'dashboard')->name('dashboard');  
    Route::get('/prescription', 'prescription')->name('prescription');    
    Route::get('//prescription/download/{id}', 'prescriptionHTML')->name('prescription.html');    
    Route::get('/appointments', 'appointments')->name('appointments');  
    Route::get('/appointment/create', 'appointment')->name('appointment.create');  
    Route::post('/appointment/create', 'saveAppointment')->name('appointment.save');  
    Route::get('/feedbacks', 'feedbacks')->name('feedbacks');
    Route::get('/feedback/create', 'feedback')->name('feedback.create');  
    Route::post('/feedback/create', 'saveFeedback')->name('feedback.save');
    Route::get('/logout', 'logout')->name('logout');  
});

