<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\TicketReadem as TRModel;
use App\Models\Customer as CustomerModel;
use App\Models\Payment as PaymentModel;
use App\Models\Ticket as TicketModel;

class TicketReadem extends Controller
{

    public function index()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        TRModel::with(['customer','ticket'])->get();
        $customers = CustomerModel::all();
        $payments = PaymentModel::all();
        $ticket = TicketModel::all();
        $readem = TRModel::all();
        return view('dashboard.readem.index',['customers' => $customers,'payments' => $payments,'ticket' => $ticket,'readem' => $readem]);

    }

    public function create()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
    }

    public function store(Request $request)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
    }
    
    public function show($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
    }

    public function edit($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
    }

    public function update(Request $request, $id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
    }

    public function ready($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $readem = TRModel::find($id);
        $readem->Status = 'ready';
        $readem->save();

        return redirect('/dashboard/readem')->with('status', $readem->Status.' has been ready!');
    }

    public function expired($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master' || Session::get('LoginRole') != 'Customer')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        
        $readem = TRModel::find($id);
        $readem->CustomerStatus = 'expired';
        $readem->save();
        return redirect('/dashboard/readem')->with('status', $reade->Status.' has been expired!');
    }

    public function destroy($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
    }
}
