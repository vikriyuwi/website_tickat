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

Route::get('/template', function () {
    return view('template');
});

Route::resource('event', Event::class);
Route::resource('event-organizer', EventOrganizer::class);
Route::resource('event-type', EventType::class);
Route::resource('payment', Payment::class);
Route::resource('ticket', Ticket::class);
Route::resource('ticket-readem', TicketReadem::class);

Route::prefix('dashboard')->group(function () {
    Route::prefix('customer')->group(function () {
        Route::get('/', [Customer::class, 'index']);
        Route::post('/add', [Customer::class, 'store']);
    });
    Route::prefix('event-organizer')->group(function () {
        Route::get('/', [EventOrganizer::class, 'index']);
        Route::post('/add', [EventOrganizer::class, 'store']);
    });
});