<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Customer;
use App\Http\Controllers\Event;
use App\Http\Controllers\EventOrganizer;
use App\Http\Controllers\EventType;
use App\Http\Controllers\Payment;
use App\Http\Controllers\Ticket;
use App\Http\Controllers\TicketReadem;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\RoleCustomer;
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

Route::get('/',[RoleCustomer::class, 'index']);
Route::get('/event/{ecent}',[RoleCustomer::class, 'event']);

Route::get('/master',function(){
    return redirect('/dashboard');
});

Route::prefix('login')->group(function () {
    Route::get('/',[Authentication::class, 'index']);
    Route::get('/event-organizer',[Authentication::class, 'eventOrganizer']);
    Route::get('/master',[Authentication::class, 'master']);
});

Route::prefix('auth')->group(function () {
    Route::controller(Authentication::class)->group(function () {
        Route::post('/customer','loginC');
        Route::post('/event-organizer','loginEO');
        Route::post('/master','loginMaster');
        Route::post('/customer/resgister', 'customerRegister');
        Route::post('/event-organizer/register', 'eventOrganizerRegister');
        Route::get('/logout', 'logout');
    });
});

Route::prefix('dashboard')->group(function () {
    Route::get('/',[Dashboard::class, 'index']);
    Route::resource('customer', Customer::class);
    Route::prefix('customer')->group(function () {
        Route::get('{customer}/active',[Customer::class, 'active']);
        Route::get('{customer}/deactive',[Customer::class, 'deactive']);
    });
    Route::resource('event-organizer', EventOrganizer::class);
    Route::prefix('event-organizer')->group(function () {
        Route::get('{event_organizer}/active',[EventOrganizer::class, 'active']);
        Route::get('{event_organizer}/deactive',[EventOrganizer::class, 'deactive']);
    });
    Route::resource('payment', Payment::class);
    Route::prefix('payment')->group(function () {
        Route::get('{payment}/pending',[Payment::class, 'pending']);
        Route::get('pay/{id}',[Payment::class, 'pay']);
    });

    Route::resource('readem', TicketReadem::class);
    Route::prefix('readem')->group(function () {
        Route::get('{readem}/expired',[TicketReadem::class, 'expired']);
        Route::get('ready/{id}',[TicketReadem::class, 'ready']);
    });
    
    Route::resource('event-type', EventType::class);
    Route::resource('event', Event::class);
    Route::resource('ticket', Ticket::class);
});