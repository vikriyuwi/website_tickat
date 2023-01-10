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
                return redirect('/my-ticket');
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
                return redirect('/my-ticket');
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
                return redirect('/my-ticket');
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
                return redirect('/my-ticket');
            }
        }

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        

        if($request->username != 'master' || $request->password != 'master')
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
                return redirect('/my-ticket');
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
            if($eo->EventOrganizerStatus == 'active')
            {
                Session::put('Login',TRUE);
                Session::put('LoginName',$eo->EventOrganizerName);
                Session::put('LoginId',$eo->EventOrganizerId);
                Session::put('LoginRole','EventOrganizer');
                return redirect('/mydashboard');
            } else {
                return redirect('/login/event-organizer')->with('status', 'Your account is deactive. Please contact admin!');
            }
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
                return redirect('/my-ticket');
            }
        }

        $request->validate([
            'email' => 'required|max:64|exists:Customer,CustomerEmail',
            'password' => 'required'
        ]);

        $c = CModel::where('CustomerEmail',$request->email)->first();

        if($c->CustomerPass != $request->password)
        {
            return redirect('/login')->with('status', 'Wrong password!');
        } else {
            if($c->CustomerStatus == 'active')
            {
                Session::put('Login',TRUE);
                Session::put('LoginName',$c->CustomerName);
                Session::put('LoginId',$c->CustomerId);
                Session::put('LoginRole','Customer');
                return redirect('/my-ticket');
            } else {
                return redirect('/login')->with('status', 'Your account is deactive. Please contact admin!');
            }
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }

    public function registercustomer()
    {
        if(Session::get('Login'))
        {
            if(Session::get('LoginRole') == 'Master') {
                return redirect('/dashboard');
            } else if(Session::get('LoginRole') == 'EventOrganizer') {
                return redirect('/mydashboard');
            } else {
                return redirect('/my-ticket');
            }
        }

        return view('auth.registercustomer');
    }

    public function storecustomer(Request $request)
    {
        $request->validate([
            'name' => 'required|max:64',
            'email' => 'required|max:64|unique:Customer,CustomerEmail',
            'phone' => 'required|numeric|max_digits:16',
            'gender' => 'required|in:Male,Female',
            'password' => 'required',
            'password-confirm' => 'required|same:password',
        ]);

        $data = [
            'CustomerName' => $request->name,
            'CustomerEmail' => $request->email,
            'CustomerPhone' => $request->phone,
            'CustomerGender' => $request->gender,
            'CustomerPass' => $request->password,
            'CustomerStatus' => 'active',
            ];
            
        CModel::create($data);

        return redirect('/login')->with('status', $request->name.' has been registered. You can login with your account now!');
    }
}
