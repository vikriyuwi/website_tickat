<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'PaymentId';

    protected $table = "Payment";

    public function TicketRedeem() {
        return $this->belongsTo('App\Models\TicketRedeem','TicketRedeemId','TicketRedeemId');
    }
    
    protected $fillable = [
        'TicketRedeemId',
        'PaymentMethod',
        'PaymentCode',
        'PaymentVerification',
        'PaymentTime',
        'PaymentVerificationTime',
        'PaymentVerifiedBy'
    ];

    public function Admin() {
        return $this->belongsTo('App\Models\Admin','PaymentVerifiedBy','AdminId');
    }
}
