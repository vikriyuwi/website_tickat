<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment as PaymentModel;
use Carbon\Carbon;

class Payment extends Controller
{
 
    public function index()
    {
        $payments = PaymentModel::all();
       return view('dashboard.payment.index', ['payments' => $payments]);
    }

    public function create()
    {
        return view('dashboard.payment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'method' => 'required|in:Cash,Transfer,Debit,Credit',
        'code' => 'required|max:64',
        'verification' => 'required|max:32',
        'time' => 'required|date',
        'verificationtime' => 'required|date',
        ]);

        $datas = [
        'PaymentMethod' => $request->method,
        'PaymentCode' => $request->code,
        'PaymentVerification' => $request->verification,
        'PaymentTime' => $request->time,
        'PaymentVerificationTime' => $request->verificationtime,
        ];

        PaymentModel::save($datas);
        return redirect('/dashboard/payment')->with('status', $request->method.' has been added!');
    }

    public function show($id)
    {
        $payments = PaymentModel::find($id);
        return view('dashboard.payment.show', ['payments' => $payments]);
    }

    public function edit($id)
    {
        $payments = PaymentModel::find($id);
        return view('dashboard.payment.edit',['payments' => $payments]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'method' => 'required|in:Cash,Transfer,Debit,Credit',
        'code' => 'required|max:64',
        'verification' => 'required|max:32',
        'time' => 'required|date',
        'verificationtime' => 'required|date',
        ]);

        $datas = PaymentModel::find($id);
        $datas->PaymentMethod = $request->method;
        $datas->PaymentCode = $request->code;
        $datas->PaymentVerification = $request->verification;
        $datas->PaymentTime = $request->time;
        $datas->PaymentVerificationTime = $request->verificationtime;
        
        $datas->save();
        return redirect('/dashboard/payment')->with('status', $request->method.' has been updated!');
    }

    public function pay(Request $request)
    {
        $id = $request->id;

        $payment = PaymentModel::find($id);
        if ($payment->PaymentTime <= Carbon::now()) {
            $payment->PaymentStatus = 'fail';
            $payment->save();
            return redirect('dashboard/payment')->with('status', 'Payment fail!');
        } else {
            $payment->PaymentStatus = 'paid';
            $payment->save();
            return redirect('dashboard/payment')->with('status', 'Payment paid!');
        }   
    }

    public function destroy($id)
    {
        
    }
}
