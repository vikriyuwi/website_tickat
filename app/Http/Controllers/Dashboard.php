<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\TicketRedeem;
use App\Models\Ticket;
use App\Models\Event;
use App\Models\EventOrganizer;
use App\Models\EventSales;
use App\Models\EventSalesPerMonth;

class Dashboard extends Controller
{
    public function index()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        

        return view('dashboard.index');
    }

    public function EventOrganizer()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'EventOrganizer')
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }

        return view('dashboard.my-event');
    }
}
