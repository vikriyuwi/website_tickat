<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EOTicket extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'EventOrganizer')
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }
        return redirect('/my-event/event');
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
        if(!Session::get('Login') || Session::get('LoginRole') != 'EventOrganizer')
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
