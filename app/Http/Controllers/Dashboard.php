<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
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

        $upcomingEvents = Event::with(['EventOrganizer','EventType'])->where('EventOrganizerId','=',Session::get('LoginId'))->where('EventStart','>',Carbon::now())->orderBy('EventStart','ASC')->skip(1)->take(3)->get();
        $upcomingEvent = Event::with(['EventOrganizer','EventType'])->where('EventOrganizerId','=',Session::get('LoginId'))->where('EventStart','>',Carbon::now())->orderBy('EventStart','ASC')->first();
        
        // count days
        $curdate = new DateTime();
        $eventDate = new DateTime($upcomingEvent->EventStart);
        $interval = $curdate->diff($eventDate);
        $daystogo = $interval->format('%a');

        $soldCount = TicketRedeem::whereHas('Ticket', function($query) use($upcomingEvent){
            $query->where('EventId','=',$upcomingEvent->EventId);
        })->count();

        $eventSales = EventSales::where('EventOrganizerId','=',Session::get('LoginId'))->get();

        return view('dashboard.my-event',['upcomingEvents'=>$upcomingEvents,'upcomingEvent'=>$upcomingEvent,'daystogo'=>$daystogo,'soldCount'=>$soldCount,'eventSales'=>$eventSales]);
    }
}
