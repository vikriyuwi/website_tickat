<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Payment as PaymentModel;
use App\Models\TicketRedeem as TRModel;
use Carbon\Carbon;

class Payment extends Controller
{
 
    public function index()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $payments = PaymentModel::all();
        return view('dashboard.payment.index', ['payments' => $payments]);
    }

    public function create()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        return view('dashboard.payment.create');
    }

    public function store(Request $request)
    {
        if(!Session::get('Login'))
        {
            return redirect('/login')->with('status', 'You have to login first!');
        }

        return redirect('dashboard/payment');
    }

    public function show($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        return redirect('dashboard/payment');
    }

    public function edit($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        return redirect('dashboard/payment');
    }

    public function update(Request $request, $id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        
       return redirect('dashboard/payment');
    }

    public function pay(Request $request)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $id = $request->id;

        $payment = PaymentModel::find($id);
        $ticketredeem = TRModel::where('PaymentId','=',$payment->PaymentId)->first();

        if ($payment->PaymentVerification === 'PENDING') {
            $ticketredeem->Status = 'READY';
            $ticketredeem->save();

            $payment->PaymentVerification = 'PAID';
            $payment->PaymentVerificationTime = Carbon::now();
            $payment->save();

            return redirect('dashboard/payment')->with('status', 'Payment verified!');
        } else {
            $payment->PaymentVerification = 'PENDING';
            $payment->PaymentVerificationTime = NULL;
            $payment->save();
            $ticketredeem->Status = 'PENDING';
            $ticketredeem->save();
            return redirect('dashboard/payment')->with('status', 'Payment unverified!');
        }   
    }

    public function destroy($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }
        
        return redirect('dashboard/payment');
    }
}
