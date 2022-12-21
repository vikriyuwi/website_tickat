<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventOrganizer extends Model
{
    use HasFactory;

    protected $table = "EventOrganizer";
    protected $primaryKey = 'EventOrganizerId';
    public $timestamps = false;

    public function Event() {
        return $this->hasMany('App\Models\Event','EventOrganizerId','EventOrganizerId');
    }

    protected $fillable = [
        'EventOrganizerName',
        'EventOrganizerEmail',
        'EventOrganizerPhone',
        'EventOrganizerPass',
        'EventOrganizerOfficeAddress',
        'EventOrganizerDesc',
    ];
}
