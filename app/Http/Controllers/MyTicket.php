<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Event as EModel;
use App\Models\EventOrganizer as EOModel;
use App\Models\EventType as ETModel;
use App\Models\Ticket as TModel;
use App\Models\TicketReadem as TRModel;
use App\Models\Payment as PModel;

class MyTicket extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.dashboard.index');
    }

    public function myBook()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Customer')
        {
            return redirect('/login')->with('status', 'You have to login first!');
        }
        return view('customer.dashboard.mybook');
    }

    public function book($id)
    {
        $ticket = TModel::find($id);

        $event = EModel::find($ticket->EventId)->first();
        $eo = EOModel::find($ticket->EventId)->first();

        $EventStart=  explode(" ", $event->EventStart );
        $EventEnd=  explode(" ", $event->EventEnd );

        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $int = '0123456789';

        if(!Session::get('Login') || Session::get('LoginRole') != 'Customer')
        {
            return redirect('/login')->with('status', 'You have to login first!');
        }
        return view('customer.dashboard.book',['ticket'=>$ticket,'event'=>$event,'eo'=>$eo,'est'=>$EventStart,'een'=>$EventEnd]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $date = new \DateTime('NOW');
        
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $int = '0123456789';

        $paycode = '';
        for ($i = 0; $i < 3; $i++) {
            $paycode .= $char[rand(0, 26 - 1)];
        }
        for ($i = 3; $i < 16; $i++) {
            $paycode .= $int[rand(0, 10 - 1)];
        }

        $code = '';
        for ($i = 0; $i < 3; $i++) {
            $code .= $char[rand(0, 26 - 1)];
        }
        for ($i = 3; $i < 16; $i++) {
            $code .= $int[rand(0, 10 - 1)];
        }

        $request->validate([
            'paymentMethod' => 'required|not_in:0'
        ]);

        $pay = [
            'PaymentMethod' => $request->paymentMethod,
            'PaymentCode' => $paycode,
            'PaymentVerification' => 'PENDING',
            'PaymentTime' => $date->format('Y-m-d H:i:s')
        ];

        $validator = Validator::make($pay, [
            'PaymentCode' => 'unique:Payment,PaymentCode'
        ]);

        $payment = PModel::create($pay);

        $data = [
            'CustomerId' => Session::get('LoginId'),
            'PaymentId' => $payment->PaymentId,
            'TicketId' => $request->id,
            'ReademCode' => $code,
            'ReademAt' => $date->format('Y-m-d H:i:s'),
            'Status' => 'READY',
        ];

        $validator = Validator::make($data, [
            'ReademCode' => 'unique:TicketReadem,ReademCode'
        ]);

        TRModel::create($data);

        $ticket = TModel::find($request->id);

        $ticket->TicketAmount = $ticket->TicketAmount-1;

        $ticket->save();

        return redirect('/my-ticket/book')->with('status', 'Your ticket is waiting to finish the payment!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
