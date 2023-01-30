<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\EventType as ETModel;

class EventType extends Controller
{
    public function index()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        
        $ets = ETModel::all();
        return view('dashboard.event.event-type.index',['ets' => $ets]);
    }

    public function create()
    {
        if (!Session::get('Login') || Session::get('LoginRole') != 'Master') {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        return view ('dashboard.event.event-type.create');
    }


    public function store(Request $request)
    {
        if (!Session::get('Login') || Session::get('LoginRole') != 'Master') {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $id = Session::get('LoginId');

        $request->validate([
            'name' => 'required|max:64',
        ]);

        $data = [
            'EventTypeName' => $request->name,
        ];

        $ets = ETModel::create($data);

        return redirect('/dashboard/event/event-type')->with('status', 'Event Type Created!');

    }

    public function show($id)
    {
        if (!Session::get('Login') || Session::get('LoginRole') != 'Master') {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $ets = ETModel::find($id);
        return view('dashboard.event.event-type.show', ['ets' => $ets]);
        
    }

    public function edit($id)
    {
        if (!Session::get('Login') || Session::get('LoginRole') != 'Master') {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $ets = ETModel::find($id);
        return view('dashboard.event.event-type.edit', ['ets' => $ets]);
        
    }

    public function update(Request $request, $id)
    {
        if (!Session::get('Login') || Session::get('LoginRole') != 'Master') {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        
        $request->validate([
            'name' => 'required|max:64',
        ]);

       $ets = ETModel::find($id);
         $ets->EventTypeName = $request->name;
            $ets->save();

        return redirect('/dashboard/event/event-type')->with('status', 'Event Type Updated!');
        
    }

    public function destroy($id)
    {
        if (!Session::get('Login') || Session::get('LoginRole') != 'Master') {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $ets = ETModel::find($id);
        ETModel::destroy($id);
        return redirect('/dashboard/event/event-type')->with('status', $ets->EventTypeName.' has been deleted!');

    }
}
