<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "Event";
    protected $primaryKey = 'EventId';
    
    public $timestamps = false;

    public function EventOrganizer() {
        return $this->belongsTo('App\Models\EventOrganizer','EventOrganizerId','EventOrganizerId');
    }

    public function EventType() {
        return $this->belongsTo('App\Models\EventType','EventTypeId','EventTypeId');
    }

    public function Ticket() {
        return $this->hasMany('App\Models\Tickat','EventId','EventId');
    }

    protected $fillable = [
        'EventName',
        'EventOrganizerId',
        'EventTypeId',
        'EventDesc',
        'EventStart',
        'EventEnd',
        'EventLocation',
        'EventGmapsCode',
        'EventDetailPlace',
        'EventBudget'
    ];

    use HasFactory;
}
