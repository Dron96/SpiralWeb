<?php

use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::middleware(['auth'])->group(function () {
//    Route::get('/exam/{examination}', [ExaminationController::class, 'showExaminationResult'])
//        ->name('exams.show');
//    Route::get('/{patient}', [ExaminationController::class, 'show'])
//        ->name('patient.show');
//    Route::get('/patients', [PatientController::class, 'index'])
//        ->name('patients.index');
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::get('/', [PatientController::class, 'index'])
    ->name('patients.index');

Route::get('/exam/{examination}', [ExaminationController::class, 'showExaminationResult'])
    ->name('exams.show');
Route::get('/{patient}', [ExaminationController::class, 'show'])
    ->name('patient.show');
//Route::get('/patients', [PatientController::class, 'index'])
//    ->name('patients.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
