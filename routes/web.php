<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolyearController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;

use App\Models\User;
use App\Models\Book;

/*
|--------------------------------------------------------------------------
| Rutas web
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

// TODO Pruebas durante el desarrollo.
Route::get('/pruebas', function () {
    return view('pruebas');
})->name('pruebas');

Route::middleware(['auth:sanctum', 'verified', 'status'])->get('/dashboard', function () {
    // TODO ajustar a curso activo.
    return view('/dashboard')
        ->with('schoolyear', activeSchoolyear())
        ->with('sections', numSectionsActiveSchoolyear())
        ->with('teachers', User::where('role', 1)->count())
        ->with('students', User::where('role', 2)->count())
        ->with('books', Book::count());
})->name('dashboard');

// Rutas de los administradores
Route::middleware(['auth:sanctum', 'verified', 'status', 'role:Admin'])->group(function () {
    Route::resource('/schoolyears', SchoolyearController::class);
    Route::resource('/sections', SectionController::class);
    Route::resource('/enrollments', EnrollmentController::class);
    Route::prefix('/users')->name('users.')->group(function () {
        Route::post('/import', [UserController::class, 'import'])->name('import');
        Route::put('/{user}/passwd', [UserController::class, 'passwd'])->where('user', '^\d+$')->name('passwd');
    });
    // Route::post('/users/import', [UserController::class, 'import'])->name('users.import');
    // Route::put('/users/{user}/passwd', [UserController::class, 'passwd'])->where('user', '^\d+$')->name('users.passwd');
    Route::resource('/users', UserController::class);
    Route::resource('/books', BookController::class);
});

// Rutas de los profesores
Route::middleware(['auth:sanctum', 'verified', 'status', 'role:Teacher'])->group(function () {
    Route::get('/mysections', function () {return view('mysections.index');})->name('mysections.index');
    Route::get('/students', function () {return view('students.index');})->name('students.index');
    Route::get('/library', function () {return view('library.index');})->name('library.index');
});

// Rutas de los alumnos
Route::middleware(['auth:sanctum', 'verified', 'status', 'role:Student'])->group(function () {
    Route::get('/readings', function () {return view('readings.index');})->name('readings.index');
    Route::get('/library', function () {return view('library.index');})->name('library.index');
});