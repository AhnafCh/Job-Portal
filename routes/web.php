<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\JobSeekerController;

use App\Http\Controllers\JobCircularController;

use App\Http\Controllers\StatisticsController;
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
Route::get('/verify', [DashboardController::class, 'verify'])->name('verification.notice');

// ahnaf

Route::get('/forgot-password', function () {
    return view('user.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', [UserController::class, 'postForgot'])->name('postForgot');

Route::get('reset/{token}', [UserController::class, 'reset'])->name('reset');
Route::post('reset/{token}', [UserController::class, 'postReset']);


Route::middleware(['auth', 'job_seeker'])->group(function () {
    Route::get('/job_seeker', [JobSeekerController::class, 'show'])->name('job_seeker');
    Route::post('/job_seeker/update-cv', [JobSeekerController::class, 'updateCV'])->name('job_seeker.updateCV');
});


// job circular 

Route::middleware(['auth'])->group(function () {
    Route::prefix('employer')->group(function () {
        Route::get('/job_circular/create', [JobCircularController::class, 'create'])->name('employer.job_circular.create');
        Route::post('/job_circular/store', [JobCircularController::class, 'store'])->name('employer.job_circular.store');
        Route::get('/job_circular/{jobCircular}/edit', [JobCircularController::class, 'edit'])->name('employer.job_circular.edit');
        Route::put('/job_circular/{jobCircular}/update', [JobCircularController::class, 'update'])->name('employer.job_circular.update');
        Route::get('/job_circular/{jobCircular}/download', [JobCircularController::class, 'download'])->name('employer.job_circular.download');
        Route::get('/job_circular', [JobCircularController::class, 'index'])->name('employer.job_circular.index');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('employer')->group(function () {
        // ... existing routes ...

        Route::get('/job_circular/{jobCircular}/download', [JobCircularController::class, 'download'])->name('employer.job_circular.download');
    });
});

// delete a job circular
Route::middleware(['auth'])->group(function () {
    Route::get('employer/job_circular', [JobCircularController::class, 'index'])->name('employer.job_circular.index');
    Route::get('employer/job_circular/create', [JobCircularController::class, 'create'])->name('employer.job_circular.create');
    Route::post('employer/job_circular', [JobCircularController::class, 'store'])->name('employer.job_circular.store');
    Route::get('employer/job_circular/{job_circular}', [JobCircularController::class, 'show'])->name('employer.job_circular.show');
    Route::get('employer/job_circular/{job_circular}/edit', [JobCircularController::class, 'edit'])->name('employer.job_circular.edit');
    Route::put('employer/job_circular/{job_circular}', [JobCircularController::class, 'update'])->name('employer.job_circular.update');
    Route::delete('employer/job_circular/{job_circular}', [JobCircularController::class, 'destroy'])->name('employer.job_circular.destroy');
});

// route to live statistics

Route::get('/live-statistics', [StatisticsController::class, 'index'])->name('live-statistics.index');


// Ashfaq's All routes

Route::get('/profiles/{email}', [ProfileController::class, 'show'])->name('profiles.show');

Route::get('/profiles/{profile}/change', [ProfileController::class, 'change'])->name('product.change');

Route::put('/profiles/{profile}/update', [ProfileController::class, 'update'])->name('product.update');



Route::get('/profiles/{email}', [ProfileController::class, 'show'])->name('profiles.show');
Route::post('/upload-image/{email}', [ProfileController::class, 'uploadImage'])->name('upload.image');


Route::put('/profiles/{profile}/update-skills', [ProfileController::class, 'updateSkills'])->name('profiles.updateSkills');



Route::get('/index', [ProfileController::class, 'index'])->name('search.index');
Route::get('/search', [ProfileController::class, 'search'])->name('search');