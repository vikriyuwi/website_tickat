<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Payment as PModel;
use App\Models\TicketRedeem as TRModel;
use Carbon\Carbon;

class Payment extends Controller
{

    public function pay(Request $request)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }

        $id = $request->id;

        $payment = PModel::find($id);

        $ticketredeem = TRModel::find($payment->TicketRedeemId);

        if ($payment->PaymentVerification === 'PENDING') {
            $ticketredeem->Status = 'READY';
            $ticketredeem->save();

            $payment->PaymentVerification = 'PAID';
            $payment->PaymentVerificationTime = Carbon::now();
            $payment->save();

            return redirect('dashboard/redeem/'.$ticketredeem->TicketRedeemId)->with('success', 'Payment verified!');
        } else {
            $payment->PaymentVerification = 'PENDING';
            $payment->PaymentVerificationTime = NULL;
            $payment->save();
            $ticketredeem->Status = 'PENDING';
            $ticketredeem->save();
            return redirect('dashboard/redeem/'.$ticketredeem->TicketRedeemId)->with('success', 'Payment unverified!');
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
