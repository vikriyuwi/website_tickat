<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\TicketRedeem;
use App\Models\Ticket;
use App\Models\Event;
use App\Models\EventOrganizer;

class Dashboard extends Controller
{
    public function index()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'Master')
        {
            return redirect('/login/master')->with('status', 'You have to login first!');
        }


        // SELECT DATE_FORMAT(`Payment`.`PaymentTime`, '%Y-%m') as month, `Event`.`EventName`, `EventOrganizer`.`EventOrganizerName`, COUNT(*) as `JumlahPenjualan` FROM `Payment`
        // JOIN `TicketRedeem` ON `Payment`.`TicketRedeemId` = `TicketRedeem`.`TicketRedeemId`
        // JOIN `Ticket` ON `Ticket`.`TicketId`	= `TicketRedeem`.`TicketId`
        // JOIN `Event` ON `Ticket`.`EventId` = `Event`.`EventId`
        // JOIN `EventOrganizer` ON `Event`.`EventOrganizerId` = `EventOrganizer`.`EventOrganizerId`
        // WHERE `Payment`.`PaymentVerification`= 'PENDING' OR `Payment`.`PaymentVerification` = 'PAID'
        // GROUP BY `TicketRedeem`.`TicketId`
        // ORDER BY `JumlahPenjualan` DESC

        // $salesamount = Payment::with(['TicketRedeem','Ticket','Event','EventOrganizer'])->select(DB::raw("DATE_FORMAT(PaymentTime,'%Y-%m') as month"))->addSelect("EventName","EventOrganizerName","COUNT(*) as SalesAmount")
        //     ->where('Payment.PaymentVerification','=','PENDING')->orWhere('Payment.PaymentVerification','=','PAID')
        //     ->groupBy('TicketRedeem.TicketId')
        //     ->orderBy('JumlahPenjualan','DESC')
        //     ->get();

        $salesamount = Payment::select(DB::raw("DATE_FORMAT(Payment.PaymentTime,'%Y-%m') as month"))->addSelect("TicketRedeem.TicketId","Event.EventName","EventOrganizer.EventOrganizerName")->addSelect(DB::raw("COUNT(*) as SalesAmount"))
        ->join('TicketRedeem','Payment.TicketRedeemId','=','TicketRedeem.TicketRedeemId')
        ->join('Ticket','TicketRedeem.TicketId','=','Ticket.TicketId')
        ->join('Event','Ticket.EventId','=','Event.EventId')
        ->join('EventOrganizer','Event.EventOrganizerId','=','EventOrganizer.EventOrganizerId')
        ->where('Payment.PaymentVerification','=','PENDING')->orWhere('Payment.PaymentVerification','=','PAID')
        ->groupBy('TicketRedeem.TicketId')
        ->orderBy('SalesAmount','DESC')
        ->get();

        return view('dashboard.index');
    }

    public function EventOrganizer()
    {
        if(!Session::get('Login') || Session::get('LoginRole') != 'EventOrganizer')
        {
            return redirect('/login/event-organizer')->with('status', 'You have to login first!');
        }

        return view('dashboard.my-event');
    }
}
