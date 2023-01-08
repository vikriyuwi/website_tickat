<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Event as EModel;
use App\Models\EventOrganizer as EOModel;
use App\Models\EventType as ETModel;
use App\Models\Ticket as TModel;

class RoleCustomer extends Controller
{
    public function index()
    {
        $event = EModel::with(['EventOrganizer','EventType'])->where('EventStart', '>', date('Y/m/d'))->orderBy('EventStart', 'ASC')->first();
        $count = EModel::with(['EventOrganizer','EventType'])->where('EventStart', '>', date('Y/m/d'))->count();
        $events = EModel::with(['EventOrganizer','EventType'])->where('EventStart', '>', date('Y/m/d'))->orderBy('EventStart', 'ASC')->get();
        $EventStart=  explode(" ", $event->EventStart );
        $EventEnd=  explode(" ", $event->EventEnd );

        return view('customer/index',['event' => $event, 'events' => $events,'est' => $EventStart,'een' => $EventEnd]);
    }

    public function event($id)
    {
        $event = EModel::with(['EventOrganizer','EventType'])->where('EventId','=',$id)->first();

        $EventStart=  explode(" ", $event->EventStart );
        $EventEnd=  explode(" ", $event->EventEnd );

        $tickets = TModel::where('EventId','=',$id)->get();

        return view('customer.event',['EventId' => $id, 'event' => $event, 'est' => $EventStart, 'een' => $EventEnd, 'tickets' => $tickets]);
    }

    public function book($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Customer')
        {
            return redirect('/login')->with('status', 'You have to login first!');
        }
        return view('customer.dashboard.book');

    }
}
