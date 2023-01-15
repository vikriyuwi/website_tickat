<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Customer as CModel;
use App\Models\Event as EModel;
use App\Models\EventOrganizer as EOModel;
use App\Models\EventType as ETModel;
use App\Models\Ticket as TModel;
use App\Models\TicketRedeem as TRModel;
use App\Models\Payment as PModel;

class RoleCustomer extends Controller
{
    public function index()
    {
        $event = EModel::with(['EventOrganizer','EventType'])->where('EventStart', '>', date('Y/m/d'))->orderBy('EventStart', 'ASC')->first();
        $count = EModel::with(['EventOrganizer','EventType'])->where('EventStart', '>', date('Y/m/d'))->count();
        $events = EModel::with(['EventOrganizer','EventType'])->where('EventStart', '>', date('Y/m/d'))->orderBy('EventStart', 'ASC')->get();
        $EventStart=  explode(" ", $event->EventStart);
        $EventEnd=  explode(" ", $event->EventEnd);
        $EventCount = TModel::count();
        $TicketRedeemCount = TRModel::count();
        $EventOrganizerCount = EOModel::count();


        return view('customer/index',['event' => $event, 'events' => $events,'est' => $EventStart,'een' => $EventEnd,'EventCount'=>$EventCount,'TicketRedeemCount'=>$TicketRedeemCount,'EventOrganizerCount'=>$EventOrganizerCount]);
    }

    public function myBook()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Customer')
        {
            return redirect('/login')->with('status', 'You have to login first!');
        }
        $redeem = TRModel::with(['Customer','Ticket','Payment'])->where('CustomerId','=',Session::get('LoginId'))->get();

        return view('customer.dashboard.mybook',['redeems' => $redeem]);
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
        $ticket = TModel::find($id);

        $event = EModel::find($ticket->EventId);
        $eo = EOModel::find($event->EventOrganizerId);

        $EventStart=  explode(" ", $event->EventStart );
        $EventEnd=  explode(" ", $event->EventEnd );

        if(!Session::get('Login') || Session::get('LoginRole') != 'Customer')
        {
            return redirect('/login')->with('status', 'You have to login first!');
        }
        return view('customer.dashboard.book',['ticket'=>$ticket,'event'=>$event,'eo'=>$eo,'est'=>$EventStart,'een'=>$EventEnd]);
    }
}
