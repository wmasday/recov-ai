<?php

use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/1', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/2', [App\Http\Controllers\HomeController::class, 'index'])->name('records');
Route::get('/3', [App\Http\Controllers\HomeController::class, 'index'])->name('records');

Route::prefix('/dashboard')->group(function () {
    Route::prefix('/employee')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
        Route::get('/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');
        Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
        Route::post('/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
        Route::get('/rm/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
        Route::get('/search', [EmployeeController::class, 'search'])->name('employee.search');
    });

    Route::prefix('/assurance')->group(function () {
        Route::get('/', [AssuranceController::class, 'index'])->name('assurance.index');
        Route::get('/show/{id}', [AssuranceController::class, 'show'])->name('assurance.show');
        Route::post('/store/{id}', [AssuranceController::class, 'store'])->name('assurance.store');
    });
});
