<?php

namespace App\Http\Controllers;

use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
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
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

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
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

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
            'email' => 'required|max:64|unique:EventOrganizer,EventOrganizerEmail',
            'phone' => 'required|numeric|max_digits:16',
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
            'EventOrganizerDesc' => $request->description,
            'EventOrganizerStatus' => 'active',
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
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

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
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

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
        if(!Session::get('Login') || (Session::get('LoginRole') != 'Master' && Session::get('LoginRole') != 'EventOrganizer'))
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $request->validate([
            'name' => 'required|max:64',
            'email' => 'required|max:64|unique:EventOrganizer,EventOrganizerEmail',
            'phone' => 'required|numeric|max_digits:16',
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

    public function active($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $eos = EOModel::find($id);
        $eos->EventOrganizerStatus = 'active';
        $eos->save();

        return redirect('/dashboard/event-organizer')->with('status', $eos->EventOrganizerName.' is active!');
    }

    public function deactive($id)
    {
        if(!Session::get('Login') || (Session::get('LoginRole') != 'Master' && Session::get('LoginRole') != 'EventOrganizer'))
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }

        $eos = EOModel::find($id);
        $eos->EventOrganizerStatus = 'deactive';
        $eos->save();

        return redirect('/dashboard/event-organizer')->with('status', $eos->EventOrganizerName.' is deactive!');
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
        
        $eo = EOModel::find($id);
        EOModel::destroy($id);
        
        return redirect('/dashboard/event-organizer')->with('status', $eo->EventOrganizerName.' has been deleted!');
    }
}
