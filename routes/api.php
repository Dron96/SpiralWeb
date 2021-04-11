<?php

use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('patients', [PatientController::class, 'store'])
    ->name('patient.create');
Route::get('patients', [PatientController::class, 'findPatient'])
    ->name('patient.find');
Route::post('exams', [ExaminationController::class, 'store'])
    ->name('exam.create');

