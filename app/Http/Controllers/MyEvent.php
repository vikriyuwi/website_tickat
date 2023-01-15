<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Event as EModel;
use App\Models\EventOrganizer as EOModel;
use App\Models\EventType as ETModel;
use App\Models\Ticket as TModel;

class MyEvent extends Controller
{
    public function index()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'EventOrganizer')
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }

        $events = EModel::with(['EventOrganizer','EventType'])->where('EventOrganizerId','=',Session::get('LoginId'))->get();
        $ets = ETModel::all();
        return view('my-event.event.index',['events' => $events,'ets' => $ets]);
    }

    public function create()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'EventOrganizer')
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }

        return redirect('my-event/event');
    }

    public function store(Request $request)
    {
        $id = Session::get('LoginId');

        $request->validate([
            'name' => 'required|max:64',
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
            'EventOrganizerId' => $id,
            'EventTypeId' => $request->eventType,
            'EventDesc' => $request->description,
            'EventStart' => $request->eventStartDate.' '.$request->eventStartTime,
            'EventEnd' => $request->eventEndDate.' '.$request->eventEndTime,
            'EventLocation' => $request->eventLocation,
            'EventGmapsCode' => $request->gmapsCode,
            'EventDetailPlace' => $request->detailPlace
        ];

        EModel::create($data);

        return redirect('/my-event/event')->with('status', $request->name.' has been added!');
    }

    public function show($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'EventOrganizer')
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }

        if(Session::get('LoginId') != $id)
        {
            return redirect('my-event/event');
        }

        $event = EModel::with(['EventOrganizer','EventType'])->where('EventId','=',$id)->first();

        $EventStart=  explode(" ", $event->EventStart );
        $EventEnd=  explode(" ", $event->EventEnd );
        $tickets = TModel::where('EventId','=',$id)->get();

        $colors = [
            'primary',
            'secondary',
            'success',
            'info',
            'warning',
            'danger'
        ];
        return view('my-event.event.show',['EventId' => $id, 'event' => $event, 'est' => $EventStart, 'een' => $EventEnd, 'tickets' => $tickets, 'colors' => $colors]);
    }

    public function edit($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'EventOrganizer')
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }

        if(Session::get('LoginId') != $id)
        {
            return redirect('my-event/event');
        }

        $eos = EOModel::all();
        $ets = ETModel::all();
        $es = EModel::find($id);
        $EventStart=  explode(" ", $es->EventStart );
        $EventEnd=  explode(" ", $es->EventEnd );
        
        return view('my-event.event.edit',['eos' => $eos,'ets' => $ets, 'es' => $es, 'est' => $EventStart, 'een' => $EventEnd]);
    }

    public function update(Request $request, $id)
    {
        if(!Session::get('Login') || (Session::get('LoginRole') != 'EventOrganizer' && Session::get('LoginRole') != 'EventOrganizer'))
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }

        if(Session::get('LoginId') != $id)
        {
            return redirect('my-event/event');
        }

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
        if(Session::get('LoginRole') == 'EventOrganizer') {
            $event->EventOrganizerId = Session::get('LoginId');
        } else {
            $event->EventOrganizerId = $request->eventOrganizer;
        }
        $event->EventTypeId = $request->eventType;
        $event->EventDesc = $request->description;
        $event->EventStart = $request->eventStartDate.' '.$request->eventStartTime;
        $event->EventEnd = $request->eventEndDate.' '.$request->eventEndTime;
        $event->EventLocation = $request->eventLocation;
        $event->EventGmapsCode = $request->gmapsCode;
        $event->EventDetailPlace = $request->detailPlace;

        $event->save();

        return redirect('/my-event/event')->with('status', $request->name.' has been updated!');
    }

    public function destroy($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'EventOrganizer')
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }

        if(Session::get('LoginId') != $id)
        {
            return redirect('my-event/event');
        }
        
        $event = EModel::find($id);
        EModel::destroy($id);
        
        return redirect('/my-event/event')->with('status', $event->EventName.' has been deleted!');
    }
}
