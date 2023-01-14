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
        $customers = CModel::all();
        $redeems = DB::table("TicketRedeem AS tr")
        ->leftJoin('Customer AS c', function($join){
        $join->on("tr.CustomerId", "=", "c.CustomerId");
        })
        ->leftJoin( 'Ticket AS t', function($join){
	    $join->on("tr.TicketId", "=", "t.TicketId");
        })
        ->leftJoin('Event AS e', function($join){
	    $join->on("t.EventId", "=", "e.EventId");
        })
        ->leftJoin('EventOrganizer AS eo', function($join){
	    $join->on("eo.EventOrganizerId", "=", "e.EventOrganizerId");
        })
        ->select("tr.TicketRedeemId", "e.EventOrganizerId", "eo.EventOrganizerName","c.CustomerName")
        ->where("eo.EventOrganizerId", "=", Session::get('LoginId'))->get();
        // dd($redeems);
        return view('my-event.ticketreedem.index',['redeems' => $redeems,'customer' => $customers]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        
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
