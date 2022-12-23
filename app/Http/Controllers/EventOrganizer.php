<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventOrganizer as EOModel;

class EventOrganizer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eos = EOModel::all();
        return view('dashboard.event-organizer.index',['eos' => $eos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.event-organizer.create');
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
            'email' => 'required|max:64',
            'phone' => 'required|numeric|max:13',
            'password' => 'required',
            'password-confirm' => 'required|same:password',
            'location' => 'required|max:100',
            'description' => 'required',
        ]);

        $data = [
            'EventOrganizerName' => $request->name,
            'EventOrganizerEmail' => $request->email,
            'EventOrganizerPhone' => $request->phone,
            'EventOrganizerPass' => $request->password,
            'EventOrganizerOfficeAddress' => $request->location,
            'EventOrganizerDesc' => $request->description
        ];

        EOModel::create($data);

        return redirect('/dashboard/event-organizer')->with('status', $request->name.' has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eos = EOModel::find($id);
        return view('dashboard.event-organizer.show',['eos' => $eos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eos = EOModel::find($id);
        return view('dashboard.event-organizer.edit',['eos' => $eos]);
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
            'email' => 'required|max:64',
            'phone' => 'required|max:13',
            'location' => 'required|max:100',
            'description' => 'required',
        ]);

        $eos = EOModel::find($id);

        $eos->EventOrganizerName = $request->name;
        $eos->EventOrganizerEmail = $request->email;
        $eos->EventOrganizerPhone = $request->phone;
        $eos->EventOrganizerOfficeAddress = $request->location;
        $eos->EventOrganizerDesc = $request->description;

        $eos->save();

        return redirect('/dashboard/event-organizer')->with('status', $request->name.' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eo = EOModel::find($id);
        EOModel::destroy($id);
        
        return redirect('/dashboard/event-organizer')->with('status', $eo->EventOrganizerName.' has been deleted!');
    }
}
