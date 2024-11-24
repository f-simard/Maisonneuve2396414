<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetLocaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

Route::middleware('guest')->group(function () {
	Route::get('create/student', [StudentController::class, 'create'])->name('student.create');
	Route::post('create/student', [StudentController::class, 'store'])->name('student.store');
	Route::get('/login', [AuthController::class, 'create'])->name('login');
	Route::post('/login', [AuthController::class, 'store'])->name('login.store');

});

Route::middleware('auth')->group(function () {
	Route::get('/student/all', [StudentController::class, 'index'])->name('student.index');
	Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
	Route::get('edit/student/{student}', [StudentController::class, 'edit'])->name('student.edit');
	Route::post('edit/student/{student}', [StudentController::class, 'update'])->name('student.update');
	Route::get('delete/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
	Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');
});
