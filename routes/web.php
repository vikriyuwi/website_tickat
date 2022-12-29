<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer;
use App\Http\Controllers\Event;
use App\Http\Controllers\EventOrganizer;
use App\Http\Controllers\EventType;
use App\Http\Controllers\Payment;
use App\Http\Controllers\Ticket;
use App\Http\Controllers\TicketReadem;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    });
    Route::prefix('customer')->group(function () {
        Route::get('/', [Customer::class, 'index']);
        Route::get('/add', [Customer::class, 'create']);
        Route::get('/edit', [Customer::class, 'edit']);
    });
    Route::resource('event-organizer', EventOrganizer::class);
    Route::resource('event', Event::class);
    Route::get('/event-type', function () {
        return view('...');
    });
});