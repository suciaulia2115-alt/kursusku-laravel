<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| LOGIN DAN AUTENTIKASI
|--------------------------------------------------------------------------
*/

// Halaman login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

// Halaman lupa password
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])
    ->name('password.request');

// Proses pemeriksaan email
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])
    ->name('password.email');

// Halaman ubah password langsung (praktikum lokal)
Route::get('/change-password', [AuthController::class, 'showLocalPasswordForm'])
    ->name('password.local.form');

// Proses menyimpan password baru
Route::post('/change-password', [AuthController::class, 'updateLocalPassword'])
    ->name('password.local.update');

// Halaman reset password menggunakan token Laravel
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])
    ->name('password.reset');

// Proses reset password menggunakan token Laravel
Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->name('password.update');

/*
|--------------------------------------------------------------------------
| HALAMAN YANG MEMERLUKAN LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Halaman profile
    Route::get('/profile', [AuthController::class, 'profile'])
        ->name('profile');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});

/*
|--------------------------------------------------------------------------
| PENDAFTARAN KURSUS - PERTEMUAN 12
|--------------------------------------------------------------------------
*/

Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);

/*
|--------------------------------------------------------------------------
| PENDAFTARAN LAMA
|--------------------------------------------------------------------------
*/

Route::get('/pendaftaran', [EnrollmentController::class, 'create'])
    ->name('pendaftaran.create');

Route::post('/pendaftaran/preview', [EnrollmentController::class, 'store'])
    ->name('pendaftaran.preview');

/*
|--------------------------------------------------------------------------
| KETERSEDIAAN KURSI KURSUS
|--------------------------------------------------------------------------
*/

Route::get('/courses/{course}/availability', function (int $course) {

    $availability = [
        1 => [
            'course' => 'Web Dasar',
            'remaining' => 12,
        ],

        2 => [
            'course' => 'PHP Dasar',
            'remaining' => 8,
        ],

        3 => [
            'course' => 'Laravel Dasar',
            'remaining' => 4,
        ],
    ];

    abort_unless(isset($availability[$course]), 404);

    return response()->json($availability[$course]);

})->name('courses.availability');

/*
|--------------------------------------------------------------------------
| CRUD KURSUS - PERTEMUAN 10
|--------------------------------------------------------------------------
*/

Route::resource('courses', CourseController::class);

/*
|--------------------------------------------------------------------------
| HALAMAN ERD
|--------------------------------------------------------------------------
*/

Route::view('/erd', 'erd')
    ->name('erd');
