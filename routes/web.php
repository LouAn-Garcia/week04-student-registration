<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'create']);

Route::post('/register', [StudentController::class, 'store'])
    ->name('students.store');

Route::get('/registration-success/{student}', [StudentController::class, 'success'])
    ->name('students.success');

Route::get('/students', [StudentController::class, 'index'])
    ->name('students.index');