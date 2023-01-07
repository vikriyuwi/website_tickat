<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReadem extends Model
{
    protected $table = "TicketReadem";
    protected $primaryKey = 'TicketReademId';
    
    public $timestamps = false;

    public function Customer() {
        return $this->belongsTo('App\Models\Customer','CustomerId','CustomerId');
    }

    public function Ticket() {
        return $this->belongsTo('App\Models\Ticket','TicketId','TicketId');
    }

    public function PaymentId() {
        return $this->hasMany('App\Models\Payment','PaymentId','PaymentId');
    }

    protected $fillable = [
        'CustomerId',
        'TicketId',
        'PaymentId',
        'ReademCode',
        'ReademAt',
        'Status',
    ];

    use HasFactory;
}
