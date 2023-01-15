<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\TicketRedeem as TRModel;
use App\Models\Customer as CModel;
use App\Models\Payment as PModel;
use App\Models\Ticket as TModel;
use App\Models\Event as EModel;
use App\Models\EventOrganizer as EOModel;

class TicketRedeem extends Controller
{

    public function index()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $redeems = TRModel::all();
        return view('dashboard.redeem.index',['redeems' => $redeems]);

    }

    public function create()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        return redirect('dashboard/redeem');
    }

    public function store(Request $request)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        return redirect('dashboard/redeem');
    }
    
    public function show($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        $ticketredeem = TRModel::find($id);

        $ticket = TModel::find($ticketredeem->TicketId);
        $event = EModel::find($ticket->EventId);
        $eo = EOModel::find($event->EventOrganizerId);
        $payments = PModel::where('TicketRedeemId','=',$id)->orderBy('PaymentId','DESC')->get();

        $EventStart=  explode(" ", $event->EventStart );
        $EventEnd=  explode(" ", $event->EventEnd );

        return view('dashboard.redeem.detail',['ticketredeem'=>$ticketredeem,'ticket'=>$ticket,'event'=>$event,'eo'=>$eo,'est'=>$EventStart,'een'=>$EventEnd,'payments'=>$payments]);
    }

    public function edit($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        return redirect('dashboard/redeem');
    }

    public function update(Request $request, $id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        return redirect('dashboard/redeem');
    }

    public function ready($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $readem = TRModel::find($id);
        $readem->Status = 'READY';
        $readem->save();

        return redirect('/dashboard/readem')->with('status', $readem->Status.' has been ready!');
    }

    public function expired($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master' || Session::get('LoginRole') != 'Customer')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        
        $readem = TRModel::find($id);
        $readem->CustomerStatus = 'EXPIRED';
        $readem->save();
        return redirect('/dashboard/readem')->with('status', $reade->Status.' has been expired!');
    }

    public function destroy($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
    }
}
