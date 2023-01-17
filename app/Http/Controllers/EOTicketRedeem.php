<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\TicketRedeem as TRModel;
use App\Models\Customer as CModel;
use App\Models\Payment as PModel;
use App\Models\Ticket as TModel;
use App\Models\Event as EModel;
use App\Models\EventOrganizer as EOModel;

class EOTicketRedeem extends Controller
{
    public function index()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'EventOrganizer')
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        } 

        $redeemspen = TRModel::whereHas('Ticket.Event', function($query){
            $query->where('EventOrganizerId','=',Session::get('LoginId'));
        })->where('Status','=','PENDING')->get();
        $redeemsrea = TRModel::whereHas('Ticket.Event', function($query){
            $query->where('EventOrganizerId','=',Session::get('LoginId'));
        })->where('Status','=','READY')->get();
        $redeemsexp = TRModel::whereHas('Ticket.Event', function($query){
            $query->where('EventOrganizerId','=',Session::get('LoginId'));
        })->where('Status','=','EXPIRED')->get();
        
        return view('my-event.ticketreedem.index',['redeemspen' => $redeemspen,'redeemsrea' => $redeemsrea,'redeemsexp' => $redeemsexp]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'EventOrganizer')
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }
        $redeems = TRModel::with(['Ticket.Event'])->where('TicketRedeemId','=',$id)->first();
        $event = EModel::where('EventId','=',$redeems->Ticket->EventId)->first();
        $EventStart=  explode(" ", $event->EventStart );
        $EventEnd=  explode(" ", $event->EventEnd );
        $ticket = TModel::find($redeems->TicketId);
        $payments = PModel::where('TicketRedeemId','=',$id)->orderBy('PaymentId','DESC')->get();

        $redeemat = explode(" ",$redeems->RedeemAt);

        $colors = [
            'primary',
            'secondary',
            'success',
            'info',
            'warning',
            'danger'
        
        ];
        return view ('my-event.ticketreedem.show',['redeems' => $redeems,'colors' => $colors,'EventStart' => $EventStart,'EventEnd' => $EventEnd,'event' => $event,'est' => $EventStart,'een' => $EventEnd,'ticket' => $ticket,'payments' => $payments,'redeemat'=>$redeemat]);
        }
        
    

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
