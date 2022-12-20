<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventOrganizer extends Model
{
    use HasFactory;

    protected $table = "EventOrganizer";

    protected $fillable = [
        'EventOrganizerName',
        'EventOrganizerEmail',
        'EventOrganizerPhone',
        'EventOrganizerPass',
        'EventOrganizerOfficeAddress',
        'EventOrganizerDesc',
    ];
}
