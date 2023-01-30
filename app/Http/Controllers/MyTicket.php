<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Customer as CModel;
use App\Models\Event as EModel;
use App\Models\EventOrganizer as EOModel;
use App\Models\EventType as ETModel;
use App\Models\Ticket as TModel;
use App\Models\TicketRedeem as TRModel;
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
        $redeem = TRModel::with(['Customer','Ticket','Payment'])->where('CustomerId','=',Session::get('LoginId'))->where('Status','=','READY')->get();
        $redeemexp = TRModel::with(['Customer','Ticket','Payment'])->where('CustomerId','=',Session::get('LoginId'))->where('Status','=','EXPIRED')->get();
        return view('customer.dashboard.index',['redeems' => $redeem,'redeemexp'=>$redeemexp]);
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
        if(!Session::get('Login') || Session::get('LoginRole') != 'Customer')
        {
            return redirect('/login')->with('status', 'You have to login first!');
        }
        
        $request->validate([
            'paymentMethod' => 'required|not_in:0'
        ]);

        $date = new \DateTime('NOW');
        
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $int = '0123456789';

        // buat payment
        $paycode = '';
        do {
            $generate = '';
            for ($i = 0; $i < 3; $i++) {
            $generate .= $char[rand(0, 26 - 1)];
            }
            for ($i = 3; $i < 16; $i++) {
                $generate .= $int[rand(0, 10 - 1)];
            }
            $paycode = $generate;
        } while (PModel::where('PaymentCode','=',$paycode)->count() > 0);

        // buat redeem
        $code = '';
        do {
            $generate = '';
            for ($i = 0; $i < 3; $i++) {
            $generate .= $char[rand(0, 26 - 1)];
            }
            for ($i = 3; $i < 16; $i++) {
                $generate .= $int[rand(0, 10 - 1)];
            }
            $code = $generate;
        } while (TRModel::where('RedeemCode','=',$code)->count() > 0);


        // store trm
        $data = [
            'CustomerId' => Session::get('LoginId'),
            'TicketId' => $request->id,
            'RedeemCode' => $code,
            'Status' => 'PENDING',
        ];
        
        $success = false;

        while (!$success)
        {
            DB::beginTransaction();

            $ticketredeem = TRModel::create($data);

            // payment
            $pay = [
                'TicketRedeemId' => $ticketredeem->TicketRedeemId,
                'PaymentMethod' => $request->paymentMethod,
                'PaymentCode' => $paycode,
                'PaymentVerification' => 'PENDING',
                'PaymentTime' => $date->format('Y-m-d H:i:s')
            ];
            $payment = PModel::create($pay);

            // tiket dikurangin
            $ticket = TModel::find($request->id);
            $ticket->TicketAmount = $ticket->TicketAmount-1;
            $ticket->save();

            if((!$ticketredeem || !$payment) || !$ticket) {
                DB::rollback();
            } else {
                DB::commit();
                $success = true;
            }
        }

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
        $ticketredeem = TRModel::find($id);

        $ticket = TModel::find($ticketredeem->TicketId);
        $event = EModel::find($ticket->EventId);
        $eo = EOModel::find($event->EventOrganizerId);
        $payment = PModel::where('TicketRedeemId','=',$id)->orderBy('PaymentId','DESC')->first();
        $redeemat = explode(" ",$ticketredeem->RedeemAt);
        $EventStart=  explode(" ", $event->EventStart );
        $EventEnd=  explode(" ", $event->EventEnd );
        
        return view('customer.dashboard.ticket',['ticketredeem'=>$ticketredeem,'ticket'=>$ticket,'event'=>$event,'eo'=>$eo,'est'=>$EventStart,'een'=>$EventEnd,'payment'=>$payment,'redeemat'=>$redeemat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Customer')
        {
            return redirect('/login')->with('status', 'You have to login first!');
        }

        $ticketredeem = TRModel::find($id);

        $ticket = TModel::find($ticketredeem->TicketId);
        $event = EModel::find($ticket->EventId);
        $eo = EOModel::find($event->EventOrganizerId);
        $payments = PModel::where('TicketRedeemId','=',$id)->orderBy('PaymentId','DESC')->get();
        $redeemat = explode(" ",$ticketredeem->RedeemAt);

        $EventStart=  explode(" ", $event->EventStart );
        $EventEnd=  explode(" ", $event->EventEnd );

        return view('customer.dashboard.detail',['ticketredeem'=>$ticketredeem,'ticket'=>$ticket,'event'=>$event,'eo'=>$eo,'est'=>$EventStart,'een'=>$EventEnd,'payments'=>$payments,'redeemat'=>$redeemat]);
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
            'paymentMethod' => 'required|not_in:0'
        ]);

        $date = new \DateTime('NOW');
        
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $int = '0123456789';

        // buat payment
        $paycode = '';
        do {
            $generate = '';
            for ($i = 0; $i < 3; $i++) {
            $generate .= $char[rand(0, 26 - 1)];
            }
            for ($i = 3; $i < 16; $i++) {
                $generate .= $int[rand(0, 10 - 1)];
            }
            $paycode = $generate;
        } while (PModel::where('PaymentCode','=',$paycode)->count() > 0);

        $success = false;

        while (!$success)
        {
            DB::beginTransaction();

            $payment=PModel::where('TicketRedeemId','=',$id)->orderBy('PaymentId','DESC')->first();
            $payment->PaymentVerification = 'CANCELED';
            $payment->PaymentVerifiedBy = NULL;
            $payment->save();

            // payment
            $pay = [
                'TicketRedeemId' => $id,
                'PaymentMethod' => $request->paymentMethod,
                'PaymentCode' => $paycode,
                'PaymentVerification' => 'PENDING',
                'PaymentTime' => $date->format('Y-m-d H:i:s')
            ];

            $newPayment = PModel::create($pay);

            if(!$payment || !$newPayment) {
                DB::rollback();
            } else {
                DB::commit();
                $success = true;
            }
        }
        return redirect('/my-ticket/book/'.$id.'/detail')->with('success', 'Your ticket is waiting to finish the new payment!');
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
