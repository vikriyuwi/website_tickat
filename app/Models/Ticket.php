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

    protected $fillable = [
        'EventId',
        'TicketName',
        'TicketAmount',
        'TicketPrice',
        'TicketColor'
    ];
    
    use HasFactory;
}
