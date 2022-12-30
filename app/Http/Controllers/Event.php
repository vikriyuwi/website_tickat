<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event as EModel;
use App\Models\EventOrganizer as EOModel;
use App\Models\EventType as ETModel;
use App\Models\Ticket as TModel;

class Event extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = EModel::with(['EventOrganizer','EventType'])->get();
        $eos = EOModel::all();
        $ets = ETModel::all();
        return view('dashboard.event.index',['events' => $events,'eos' => $eos,'ets' => $ets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eos = EOModel::all();
        $ets = ETModel::all();
        return view('dashboard.event.create',['eos' => $eos,'ets' => $ets]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:64',
            'eventOrganizer' => 'required|exists:EventOrganizer,EventOrganizerId',
            'eventType' => 'required|exists:EventType,EventTypeId',
            'description' => 'required',
            'eventStartDate' => 'required|date|after:today',
            'eventStartTime' => 'required',
            'eventEndDate' => 'required|date|after:today',
            'eventEndTime' => 'required',
            'eventLocation' => 'required|max:64',
            'gmapsCode' => 'required',
            'detailPlace' => 'required|max:64'
        ]);

        $data = [
            'EventName' => $request->name,
            'EventOrganizerId' => $request->eventOrganizer,
            'EventTypeId' => $request->eventType,
            'EventDesc' => $request->description,
            'EventStart' => $request->eventStartDate.' '.$request->eventStartTime,
            'EventEnd' => $request->eventEndDate.' '.$request->eventEndTime,
            'EventLocation' => $request->eventLocation,
            'EventGmapsCode' => $request->gmapsCode,
            'EventDetailPlace' => $request->detailPlace
        ];
        
        EModel::create($data);
        
        return redirect('/dashboard/event')->with('status', $request->name.' has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = EModel::with(['EventOrganizer','EventType'])->find($id)->first();
        $EventStart=  explode(" ", $event->EventStart );
        $EventEnd=  explode(" ", $event->EventEnd );
        $tickets = TModel::where('EventId','=',$id)->get();

        $colors = [
            'primary',
            'secondary',
            'sucess',
            'info',
            'warning',
            'danger'
        ];
        return view('dashboard.event.show',['event' => $event, 'est' => $EventStart, 'een' => $EventEnd, 'tickets' => $tickets, 'colors' => $colors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eos = EOModel::all();
        $ets = ETModel::all();
        $es = EModel::find($id);
        $EventStart=  explode(" ", $es->EventStart );
        $EventEnd=  explode(" ", $es->EventEnd );

        return view('dashboard.event.edit',['eos' => $eos,'ets' => $ets, 'es' => $es, 'est' => $EventStart, 'een' => $EventEnd]);
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
        $request->validate([
            'name' => 'required|max:64',
            'eventOrganizer' => 'required|exists:EventOrganizer,EventOrganizerId',
            'eventType' => 'required|exists:EventType,EventTypeId',
            'description' => 'required',
            'eventStartDate' => 'required|date|after:today',
            'eventStartTime' => 'required',
            'eventEndDate' => 'required|date|after:today',
            'eventEndTime' => 'required',
            'eventLocation' => 'required|max:64',
            'gmapsCode' => 'required',
            'detailPlace' => 'required|max:64'
        ]);

        $event = EModel::find($id);

        $event->EventName = $request->name;
        $event->EventOrganizerId = $request->eventOrganizer;
        $event->EventTypeId = $request->eventType;
        $event->EventDesc = $request->description;
        $event->EventStart = $request->eventStartDate.' '.$request->eventStartTime;
        $event->EventEnd = $request->eventEndDate.' '.$request->eventEndTime;
        $event->EventLocation = $request->eventLocation;
        $event->EventGmapsCode = $request->gmapsCode;
        $event->EventDetailPlace = $request->detailPlace;

        $event->save();

        return redirect('/dashboard/event')->with('status', $request->name.' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = EModel::find($id);
        EModel::destroy($id);
        
        return redirect('/dashboard/event')->with('status', $event->EventName.' has been deleted!');
    }
}
