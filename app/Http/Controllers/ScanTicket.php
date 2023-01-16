<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\TicketRedeem as TRModel;

class ScanTicket extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('Login') || (Session::get('LoginRole') != 'EventOrganizer' && Session::get('LoginRole') != 'EventOrganizer'))
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }
        return view('customer.dashboard.scan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($trm)
    {
        if(!Session::get('Login') || (Session::get('LoginRole') != 'EventOrganizer' && Session::get('LoginRole') != 'EventOrganizer'))
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function redeem(Request $request)
    {
        if(!Session::get('Login') || (Session::get('LoginRole') != 'EventOrganizer' && Session::get('LoginRole') != 'EventOrganizer'))
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }

        $request->validate([
            'RedeemCode' => 'exists:TicketRedeem,RedeemCode'
        ]);

        $TR = TRModel::where('RedeemCode','=',$request->RedeemCode)->first();

        if($TR->Ticket->Event->EventOrganizerId != Session::get('LoginId'))
        {
            return redirect('/my-event/scan')->with('warning', 'The ticket is not for you event!');
        }

        if($TR->Status == 'EXPIRED')
        {
            return redirect('/my-event/scan')->with('warning', 'Sorry, the ticket is expired!');
        } else if ($TR->Status != 'READY')
        {
            return redirect('/my-event/scan')->with('warning', 'Sorry, the ticket is cannot be used yes! Please complete the payment');
        }

        $TR->Status = 'EXPIRED';
        $TR->RedeemAt = new DateTime();
        $TR->save();

        return redirect('/my-event/scan')->with('status','Ticked has been redeemed!');
    }
}
