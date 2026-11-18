
<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ROUTE HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| ROUTE PENDAFTARAN KURSUS - PERTEMUAN 12
|--------------------------------------------------------------------------
*/

Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);

/*
|--------------------------------------------------------------------------
| ROUTE PENDAFTARAN LAMA
|--------------------------------------------------------------------------
| Mempertahankan alamat halaman pendaftaran sebelumnya.
*/

Route::get('/pendaftaran', [EnrollmentController::class, 'create'])
    ->name('pendaftaran.create');

Route::post('/pendaftaran/preview', [EnrollmentController::class, 'store'])
    ->name('pendaftaran.preview');

/*
|--------------------------------------------------------------------------
| ROUTE JSON KETERSEDIAAN KURSI
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
| ROUTE CRUD KURSUS - PERTEMUAN 10
|--------------------------------------------------------------------------
*/

Route::resource('courses', CourseController::class);
Route::view('/erd', 'erd')->name('erd');