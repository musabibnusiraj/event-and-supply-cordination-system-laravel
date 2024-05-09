<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login/callback', [SocialiteController::class, 'callback']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::prefix('publisher')->group(function () {
        Route::group(['middleware' => ['role:Publisher']], function () {
            Route::get('events/index', [App\Http\Controllers\Publisher\EventController::class, 'index'])->name('publisher.events.index');
            Route::get('events/create', [App\Http\Controllers\Publisher\EventController::class, 'create'])->name('publisher.events.create');
            Route::get('events/{id}/edit', [App\Http\Controllers\Publisher\EventController::class, 'edit'])->name('publisher.events.edit');
            Route::post('events/store', [App\Http\Controllers\Publisher\EventController::class, 'store'])->name('publisher.events.store');
            Route::post('events/{id}/update', [App\Http\Controllers\Publisher\EventController::class, 'update'])->name('publisher.events.update');
        });
    });

    Route::prefix('supplier')->group(function () {
        Route::group(['middleware' => ['role:Supplier']], function () {
            Route::get('events/index', [App\Http\Controllers\Supplier\EventController::class, 'index'])->name('supplier.events.index');
        });
    });
});
