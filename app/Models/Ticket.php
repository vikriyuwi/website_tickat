<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = "Ticket";
    protected $primaryKey = 'TicketId';

    public $timestamps = false;

    public function Event() {
        return $this->belongsTo('App\Models\Event','EventId','EventId');
    }

    public function TicketRedeem() {
        return $this->belongsTo('App\Models\TicketRedeem','PaymentId','PaymentId');
    }

    public function Payment() {
        return $this->hasMany('App\Models\Payment','TicketRedeemId','TicketRedeemId');
    }

    protected $fillable = [
        'EventId',
        'TicketName',
        'TicketAmount',
        'TicketPrice',
        'TicketColor'
    ];
    
    use HasFactory;
}
