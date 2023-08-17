<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfficerController;

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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/loan_application', [HomeController::class, 'loan_application'])->name('loan_application');

Route::post('/loan_store', [HomeController::class, 'loan_store'])->name('loan_store');
Route::get('/loan_status', [HomeController::class, 'loan_status'])->name('loan_status');





// admin 
Route::get('/all_application', [AdminController::class, 'all_application']);
Route::get('/accept_loan_request/{id}', [AdminController::class, 'accept_loan_request']);
Route::get('/reject_page/{id}', [AdminController::class, 'reject_page']);
Route::post('/reject_loan/{id}', [AdminController::class, 'reject_loan']);
Route::get('/accept_loan', [AdminController::class, 'accept_loan']);
Route::get('/loan_reject', [AdminController::class, 'loan_reject']);
Route::get('/processing_loan', [AdminController::class, 'processing_loan']);



//officer
Route::get('/requested_application', [OfficerController::class, 'requested_application']);
Route::get('/accept_by_officer/{id}', [OfficerController::class, 'accept_by_officer']);
Route::get('/reject_request/{id}', [OfficerController::class, 'reject_request']);
Route::post('/reject_loan_by_officer/{id}', [OfficerController::class, 'reject_loan_by_officer']);
