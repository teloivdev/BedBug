<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [WebsiteController::class, 'home']);
Route::get('/fetch', [WebsiteController::class, 'fetch']);

/* Login stuff */
Route::middleware(['auth'])->group(function () {
    Route::get('loginRedirect', [AdminController::class, 'loginRedirect'])->name('loginRedirect');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('account.admin.dashboard');
        Route::get('admin/policies', [AdminController::class, 'activePolicies'])->name('account.admin.policies');
    });

    Route::middleware(['role:customer'])->group(function () {
        Route::get('/dashboard', [AccountController::class, 'dashboard'])->middleware('role:customer')->name('account.dashboard');
        Route::post('account/update', [AccountController::class, 'updatePolicyHolderInformation'])->name('account.update');

    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
