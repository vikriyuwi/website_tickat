<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventOrganizer as EOModel;
use App\Models\Customer as CModel;
use Illuminate\Support\Facades\Session;

class Authentication extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Session::get('Login'))
        {
            if(Session::get('LoginRole') == 'Master') {
                return redirect('/dashboard');
            } else if(Session::get('LoginRole') == 'EventOrganizer') {
                return redirect('/mydashboard');
            } else {
                return redirect('/');
            }
        }

        return view('auth.loginCustomer');
    }

    public function eventOrganizer()
    {   
        if(Session::get('Login'))
        {
            if(Session::get('LoginRole') == 'Master') {
                return redirect('/dashboard');
            } else if(Session::get('LoginRole') == 'EventOrganizer') {
                return redirect('/mydashboard');
            } else {
                return redirect('/');
            }
        }
        
        return view('auth.loginEventOrganizer');
    }

    public function master()
    {   
        if(Session::get('Login'))
        {
            if(Session::get('LoginRole') == 'Master') {
                return redirect('/dashboard');
            } else if(Session::get('LoginRole') == 'EventOrganizer') {
                return redirect('/mydashboard');
            } else {
                return redirect('/');
            }
        }
        
        return view('auth.loginMaster');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function loginMaster(Request $request)
    {
        if(Session::get('Login'))
        {
            if(Session::get('LoginRole') == 'Master') {
                return redirect('/dashboard');
            } else if(Session::get('LoginRole') == 'EventOrganizer') {
                return redirect('/mydashboard');
            } else {
                return redirect('/');
            }
        }

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        

        if($request->username != 'master' && $request->password != 'master')
        {
            return redirect('/login/master')->with('status', 'Wrong authentication!');
        } else {
            Session::put('Login',TRUE);
            Session::put('LoginName','Master');
            Session::put('LoginId','Master');
            Session::put('LoginRole','Master');
            return redirect('/dashboard');
        }
        
    }

    public function loginEO(Request $request)
    {
        if(Session::get('Login'))
        {
            if(Session::get('LoginRole') == 'Master') {
                return redirect('/dashboard');
            } else if(Session::get('LoginRole') == 'EventOrganizer') {
                return redirect('/mydashboard');
            } else {
                return redirect('/');
            }
        }

        $request->validate([
            'email' => 'required|email|max:64|exists:EventOrganizer,EventOrganizerEmail',
            'password' => 'required'
        ]);

        $eo = EOModel::where('EventOrganizerEmail',$request->email)->first();

        if($eo->EventOrganizerPass != $request->password)
        {
            return redirect('/login/event-organizer')->with('status', 'Wrong password!');
        } else {
            Session::put('Login',TRUE);
            Session::put('LoginName',$eo->EventOrganizerName);
            Session::put('LoginId',$eo->EventOrganizerId);
            Session::put('LoginRole','EventOrganizer');
            return redirect('/mydashboard');
        }
        
    }

    public function loginC(Request $request)
    {
        if(Session::get('Login'))
        {
            if(Session::get('LoginRole') == 'Master') {
                return redirect('/dashboard');
            } else if(Session::get('LoginRole') == 'EventOrganizer') {
                return redirect('/mydashboard');
            } else {
                return redirect('/');
            }
        }

        $request->validate([
            'email' => 'required|max:64|exists:Customer,CustomerEmail',
            'password' => 'required'
        ]);

        $c = EOModel::where('CustomerEmail',$request->email)->first();

        if($c->CustomerPassword != $request->password)
        {
            return redirect('/login')->with('status', 'Wrong password!');
        } else {
            Session::put('Login',TRUE);
            Session::put('LoginName',$eo->CustomerName);
            Session::put('LoginId',$eo->CustomerId);
            Session::put('LoginRole','Customer');
            return redirect('/');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/login');
    }
}
