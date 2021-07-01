<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolyearController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;

use App\Models\Schoolyear;
use App\Models\Classroom;
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
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // Devuelve vista con los datos del panel.
    // TODO ajustar a curso activo.
    return view('/dashboard')
        ->with('schoolyear', Schoolyear::where('selected', true)->first())
        ->with('classrooms', numClassroomsSchoolyear())
        ->with('teachers', User::where('role', 2)->count())
        ->with('students', User::where('role', 0)->count())
        ->with('books', Book::count());
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->resource('schoolyears', SchoolyearController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('classrooms', ClassroomController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('users', UserController::class);

Route::middleware(['auth:sanctum', 'verified'])->resource('books', BookController::class);


// Pruebas durante el desarrollo. TODO BORRAR
Route::get('pruebas', function () {
    return view('pruebas');
});
