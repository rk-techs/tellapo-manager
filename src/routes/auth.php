<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ※※開発テスト用※※
|--------------------------------------------------------------------------
|
*/
Route::middleware('guest')->group(function () {
    if (app()->environment('local')) {
        Route::get('login-test/{id}', function ($id) {
            $user = App\Models\User::find($id);
            if (!$user) {
                return "パラメータ: {$user}が間違っています。";
            }
            Auth::loginUsingId($id);
            return redirect('/');
        });
    }
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});
