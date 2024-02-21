<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('auth.admin-login');
});

Auth::routes();

    Route::middleware(['auth', 'user-access:user'])->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/userviewbooks', [BookController::class, 'userviewbooks'])->name('userviewbooks');
        Route::get('/bookinhand', [BookController::class, 'bookinhand'])->name('bookinhand');
        Route::get('/book/{id}/view', [BookController::class, 'viewbook'])->name('viewbook');
        Route::get('/book/{id}/borrow', [BookController::class, 'borrow'])->name('borrow');
        Route::get('/book/{id}/return', [BookController::class, 'returnbook'])->name('returnbook');
        Route::post('/book/review', [BookController::class, 'reviewbook'])->name('reviewbook');
    });

    Route::middleware(['auth', 'user-access:admin'])->group(function () {
        Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
        Route::get('/admin/addbook', [BookController::class, 'addbook'])->name('admin.addbook');
        Route::get('/admin/viewbooks', [BookController::class, 'viewbooks'])->name('admin.viewbooks');
        Route::post('/admin/savebook', [BookController::class, 'savebook'])->name('admin.savebook');
    });

    // Route::middleware(['auth', 'user-access:manager'])->group(function () {
    // Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
    // });
