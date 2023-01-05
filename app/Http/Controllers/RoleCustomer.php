<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event as EModel;
use App\Models\EventOrganizer as EOModel;
use App\Models\EventType as ETModel;
use App\Models\Ticket as TModel;

class RoleCustomer extends Controller
{
    public function index()
    {
        $event = EModel::with(['EventOrganizer','EventType'])->where('EventStart', '>', date('Y/m/d'))->orderBy('EventStart', 'ASC')->first();
        $EventStart=  explode(" ", $event->EventStart );
        $EventEnd=  explode(" ", $event->EventEnd );

        return view('customer/index',['event' => $event,'est' => $EventStart,'een' => $EventEnd]);
    }
}
