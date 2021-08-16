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
    return view('/welcome');
})->name('home');

// Pruebas durante el desarrollo. TODO BORRAR
Route::get('pruebas', function () {
    return view('pruebas');
});

Route::middleware(['auth:sanctum', 'verified', 'checkstatus'])->get('/dashboard', function () {
    // TODO ajustar a curso activo.
    return view('/dashboard')
        ->with('schoolyear', activeSchoolyear())
        ->with('sections', numSectionsActiveSchoolyear())
        ->with('teachers', User::where('role', 1)->count())
        ->with('students', User::where('role', 2)->count())
        ->with('books', Book::count());
})->name('dashboard');

// Rutas de los administradores
Route::middleware(['auth:sanctum', 'verified', 'checkstatus', 'userrole:0'])->group(function () {
    Route::resource('schoolyears', SchoolyearController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('enrollments', EnrollmentController::class);
    Route::resource('users', UserController::class);
    Route::post('users/import', [UserController::class, 'import'])->name('users.import');
    Route::put('users/{user}/passwd', [UserController::class, 'passwd'])->name('users.passwd');
    Route::resource('books', BookController::class);
});

// Rutas de los profesores
Route::middleware(['auth:sanctum', 'verified', 'checkstatus', 'userrole:1'])->group(function () {

    Route::get('mysections', function () {
        return view('mysections.index');
    })->name('mysections.index');

    Route::get('students', function () {
        return view('students.index');
    })->name('students.index');

    Route::get('library', function () {
        return view('library.index');
    })->name('library.index');

});

// Rutas de los alumnos
Route::middleware(['auth:sanctum', 'verified', 'checkstatus', 'userrole:2'])->group(function () {

    Route::get('readings', function () {
        return view('readings.index');
    })->name('readings.index');

    Route::get('library', function () {
        return view('library.index');
    })->name('library.index');

});