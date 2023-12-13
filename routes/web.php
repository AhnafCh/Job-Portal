<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployerController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProfileController;
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

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/users', function () {
    return view('user.index');
});


Route::get('/register/seeker', [UserController::class, 'createSeeker'])->name('create.seeker');
Route::post('/register/seeker', [UserController::class,'storeSeeker'])->name('store.seeker');

Route::get('/register/employer', [UserController::class, 'createEmployer'])->name('create.employer');
Route::post('/register/employer', [UserController::class,'storeEmployer'])->name('store.employer');

Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/login', [UserController::class,'postlogin'])->name('login.post');

Route::post('/logout', [UserController::class,'logout'])->name('logout');


Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');



Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'apply'])->name('apply');
Route::get('/verify', [DashboardController::class, 'verify'])->name('verification.notice');
// ahnaf

Route::get('/forgot-password', function () {
    return view('user.forgot-password');
})->name('password.request');

Route::post('/forgot-password', [UserController::class, 'postForgot'])->name('postForgot');

Route::get('reset/{token}', [UserController::class, 'reset'])->name('reset');
Route::post('reset/{token}', [UserController::class, 'postReset']);

Route::get('/seeker', [UserController::class, 'seekerProfile'])->name('seekerProfile');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit'); 

Route::get('/employer', [EmployerController::class, 'employerProfile'])->name('employerProfile'); 

Route::get('/employer/edit', [EmployerController::class, 'editShow'])->name('editProfile'); 
#############

Route::get('/view-profile/{email}', [ProfileController::class, 'show'])->name('view-profile');
Route::get('/applicants', [ProfileController::class, 'list'])->name('applicants');
