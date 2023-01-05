<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Ticket as TModel;

class Ticket extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master' || Session::get('LoginRole') != 'EventOrganizer')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        $request->validate([
            'name' => 'required|max:64',
            'amount' => 'required',
            'price' => 'required',
            'color' => 'required|not_in:0',
        ]);

        $data = [
            'EventId' => $request->eventId,
            'TicketName' => $request->name,
            'TicketAmount' => $request->amount,
            'TicketPrice' => $request->price,
            'TicketColor' => $request->color
        ];
        
        TModel::create($data);
        
        return redirect('/dashboard/event/'.$request->eventId)->with('status', $request->name.' has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $ticket = TModel::find($id);
        $colors = [
            'primary',
            'secondary',
            'success',
            'info',
            'warning',
            'danger'
        ];

        return view('dashboard.event.ticket.edit',['ticket' => $ticket,'colors' => $colors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master' || Session::get('LoginRole') != 'EventOrganizer')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $request->validate([
            'name' => 'required|max:64',
            'amount' => 'required',
            'price' => 'required',
            'color' => 'required|not_in:0',
        ]);

        $ticket = TModel::find($id);

        $ticket->TicketName = $request->name;
        $ticket->TicketAmount = $request->amount;
        $ticket->TicketPrice = $request->price;
        $ticket->TicketColor = $request->color;

        $ticket->save();

        return redirect( url('/dashboard/event/'.$ticket->EventId) )->with('status', 'Ticket '.$request->name.' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        $ticket = TModel::find($id);
        TModel::destroy($id);
        
        return redirect('/dashboard/event/'.$ticket->EventId)->with('status', 'Ticket '.$ticket->TicketName.' has been deleted!');
    }
}
