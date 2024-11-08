<?php

use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'client'])->name('client');
Route::get('/client/search', [HomeController::class, 'search'])->name('client.search');
Route::get('/client/assuranceCheck/{id}', [HomeController::class, 'assuranceCheck'])->name('client.assuranceCheck');
Route::get('/client/requestRecord/{id}', [HomeController::class, 'requestRecord'])->name('client.requestRecord');

Auth::routes();

Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::middleware(['auth'])->prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/approve-record/{id}', [DashboardController::class, 'approveRecordShow'])->name('approveRecord.show');
    Route::get('/decline-record/{id}', [DashboardController::class, 'declineRecordShow'])->name('declineRecord.show');

    Route::post('/send/{id}', [DashboardController::class, 'updateRequestRecord'])->name('updateRequestRecord');
    Route::post('/decline/{id}', [DashboardController::class, 'updateRequestRecordDECLINE'])->name('updateRequestRecordDECLINE');

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
        Route::get('/search', [AssuranceController::class, 'search'])->name('assurance.search');
    });

    Route::prefix('/records')->group(function () {
        Route::get('/', [RecordController::class, 'index'])->name('records.index');
        Route::post('/filter', [RecordController::class, 'filter'])->name('records.filter');
        Route::get('/show/{id}', [RecordController::class, 'show'])->name('records.show');
        Route::get('/rm/{id}', [RecordController::class, 'destroy'])->name('records.destroy');
        Route::get('/search', [RecordController::class, 'search'])->name('records.search');
        Route::post('/update/{id}', [RecordController::class, 'update'])->name('records.update');
    });
});

Route::post('/dashboard/records/store', [RecordController::class, 'store'])->name('records.store');
Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
});

Auth::routes(['register' => false]);
