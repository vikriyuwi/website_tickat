<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketRedeem extends Model
{
    protected $table = "TicketRedeem";
    protected $primaryKey = 'TicketRedeemId';
    
    public $timestamps = false;

    public function Customer() {
        return $this->belongsTo('App\Models\Customer','CustomerId','CustomerId');
    }

    public function Ticket() {
        return $this->belongsTo('App\Models\Ticket','TicketId','TicketId');
    }

    public function Payment() {
        return $this->hasMany('App\Models\Payment','PaymentId','PaymentId');
    }

    protected $fillable = [
        'CustomerId',
        'TicketId',
        'PaymentId',
        'RedeemCode',
        'RedeemAt',
        'Status',
    ];

    use HasFactory;
}
