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

Route::get('/login/callback', [SocialiteController::class, 'callback']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::prefix('publisher')->group(function () {
        Route::group(['middleware' => ['role:Publisher']], function () {

            Route::group(['middleware' => ['check.profile.info']], function () {
                Route::get('events/index', [App\Http\Controllers\Publisher\EventController::class, 'index'])->name('publisher.events.index');
                Route::get('events/create', [App\Http\Controllers\Publisher\EventController::class, 'create'])->name('publisher.events.create');
                Route::get('events/{id}/edit', [App\Http\Controllers\Publisher\EventController::class, 'edit'])->name('publisher.events.edit');
                Route::post('events/store', [App\Http\Controllers\Publisher\EventController::class, 'store'])->name('publisher.events.store');
                Route::patch('events/{id}/update', [App\Http\Controllers\Publisher\EventController::class, 'update'])->name('publisher.events.update');
                Route::delete('events/{id}', [App\Http\Controllers\Publisher\EventController::class, 'destroy'])->name('publisher.events.destroy');

                Route::get('event-services/{eventId}/index', [App\Http\Controllers\Publisher\EventServiceController::class, 'index'])->name('publisher.event.services.index');
                Route::get('event-services/{eventId}/create', [App\Http\Controllers\Publisher\EventServiceController::class, 'create'])->name('publisher.event.services.create');
                Route::get('event-services/{id}/edit', [App\Http\Controllers\Publisher\EventServiceController::class, 'edit'])->name('publisher.event.services.edit');
                Route::post('event-services/store', [App\Http\Controllers\Publisher\EventServiceController::class, 'store'])->name('publisher.event.services.store');
                Route::patch('event-services/{id}/update', [App\Http\Controllers\Publisher\EventServiceController::class, 'update'])->name('publisher.event.services.update');
                Route::delete('event-services/{id}', [App\Http\Controllers\Publisher\EventServiceController::class, 'destroy'])->name('publisher.event.services.destroy');

                Route::get('event-service-quotes/{eventServiceId}/index', [App\Http\Controllers\Publisher\EventServiceQuoteController::class, 'index'])->name('publisher.event.service.quotes.index');
                Route::post('event-service-quotes/{id}/award', [App\Http\Controllers\Publisher\EventServiceQuoteController::class, 'award'])->name('publisher.event.service.quotes.award');
                Route::post('event-service-quotes/{id}/cancel', [App\Http\Controllers\Publisher\EventServiceQuoteController::class, 'cancel'])->name('publisher.event.service.quotes.cancel');
                Route::post('event-service-quotes/{id}/completed', [App\Http\Controllers\Publisher\EventServiceQuoteController::class, 'completed'])->name('publisher.event.service.quotes.completed');
                Route::get('event-service-quotes/{supplierId}/supplier', [App\Http\Controllers\Publisher\EventServiceQuoteController::class, 'supplier'])->name('publisher.event.service.quote.supplier.info');

                Route::get('supplier/{id}/show', [App\Http\Controllers\Publisher\EventServiceQuoteController::class, 'supplier'])->name('publisher.supplier.info.show');
            });

            Route::post('info/save', [App\Http\Controllers\Publisher\PublisherController::class, 'save'])->name('publisher.info.save');
            Route::get('info/show', [App\Http\Controllers\Publisher\PublisherController::class, 'show'])->name('publisher.info.show');
        });
    });

    Route::prefix('supplier')->group(function () {
        Route::group(['middleware' => ['role:Supplier']], function () {
            Route::group(['middleware' => ['check.profile.info']], function () {
                Route::get('events/index', [App\Http\Controllers\Supplier\EventController::class, 'index'])->name('supplier.events.index');
                Route::get('publisher/{id}/show', [App\Http\Controllers\Supplier\EventController::class, 'publisherInfo'])->name('supplier.publisher.info.show');

                Route::get('event-service-quotes/{eventServiceId}/create', [App\Http\Controllers\Supplier\EventServiceQuoteController::class, 'create'])->name('supplier.event.service.quotes.create');
                Route::get('event-service-quotes/{id}/edit', [App\Http\Controllers\Supplier\EventServiceQuoteController::class, 'edit'])->name('supplier.event.service.quotes.edit');
                Route::post('event-service-quotes/store', [App\Http\Controllers\Supplier\EventServiceQuoteController::class, 'store'])->name('supplier.event.service.quotes.store');
                Route::patch('event-service-quotes/{id}/update', [App\Http\Controllers\Supplier\EventServiceQuoteController::class, 'update'])->name('supplier.event.service.quotes.update');
                Route::get('event-service-quotes/{eventServiceId}/index', [App\Http\Controllers\Supplier\EventServiceQuoteController::class, 'index'])->name('supplier.event.service.quotes.index');
                Route::get('info/{id}/show', [App\Http\Controllers\Supplier\EventServiceQuoteController::class, 'supplier'])->name('quote.supplier.info.show');
            });

            Route::post('info/save', [App\Http\Controllers\Supplier\SupplierController::class, 'save'])->name('supplier.info.save');
            Route::get('info/show', [App\Http\Controllers\Supplier\SupplierController::class, 'show'])->name('supplier.info.show');
        });
    });
});
