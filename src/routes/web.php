<?php

use App\Http\Controllers\CallHistoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {

    // HOME
    Route::get('/', function () {
        return view('home');
    })->name('home');

    // User
    Route::get('users', [UserController::class, 'index'])->name('user.index');
    Route::get('users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('users', [UserController::class, 'store'])->name('user.store');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('users/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Company
    Route::get('companies', [CompanyController::class, 'index'])->name('company.index');
    Route::get('companies/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('companies', [CompanyController::class, 'store'])->name('company.store');
    Route::get('companies/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::patch('companies/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('companies/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');

    // Call
    Route::get('call-histories', [CallHistoryController::class, 'index'])->name('call-history.index');
    Route::get('companies/{company}/call-histories/create', [CallHistoryController::class, 'create'])->name('call-history.create');
    Route::post('companies/{company}/call-histories', [CallHistoryController::class, 'store'])->name('call-history.store');

});

require __DIR__.'/auth.php';
