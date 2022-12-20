<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventOrganizer extends Model
{
    use HasFactory;

    protected $table = "EventOrganizer";
    public $timestamps = false;

    protected $fillable = [
        'EventOrganizerName',
        'EventOrganizerEmail',
        'EventOrganizerPhone',
        'EventOrganizerPass',
        'EventOrganizerOfficeAddress',
        'EventOrganizerDesc',
    ];
}
