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

class EOTicketRedeem extends Controller
{
    public function index()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'EventOrganizer')
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }
        $redeems = TRModel::all();
        $events = EModel::where('EventOrganizerId','=',Session::get('LoginId'))->get();
        $eos = EOModel::all();
        return view('my-event.ticketreedem.index',['events' => $events,'eos' => $eos,'redeems' => $redeems]);
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
