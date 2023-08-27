<?php

use App\Http\Controllers\CallController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyGroupController;
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
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // CompanyGroup
    Route::get('company-groups', [CompanyGroupController::class, 'index'])->name('company-groups.index');
    Route::get('company-groups/create', [CompanyGroupController::class, 'create'])->name('company-groups.create');
    Route::post('company-groups', [CompanyGroupController::class, 'store'])->name('company-groups.store');
    Route::get('company-groups/{id}/edit', [CompanyGroupController::class, 'edit'])->name('company-groups.edit');
    Route::patch('company-groups/{id}', [CompanyGroupController::class, 'update'])->name('company-groups.update');
    Route::delete('company-groups/{id}', [CompanyGroupController::class, 'destroy'])->name('company-groups.destroy');

    // Company
    Route::get('companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::patch('companies/{id}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('companies/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');

    // Call
    Route::get('calls', [CallController::class, 'index'])->name('calls.index');
    Route::get('companies/{company}/calls/create', [CallController::class, 'create'])->name('calls.create');
    Route::post('companies/{company}/calls', [CallController::class, 'store'])->name('calls.store');
    Route::get('companies/{company}/calls/{id}/edit', [CallController::class, 'edit'])->name('calls.edit');

});

require __DIR__.'/auth.php';
