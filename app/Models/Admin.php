<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'AdminId';

    protected $table = "Admin";
    protected $fillable = [
        'AdminName',
        'AdminEmail',
        'AdminPass',
    ];

    public function Customer() {
        return $this->hasMany('App\Models\Customer','CustomerVerifiedBy','AdminId');
    }

    public function EventOrganizer() {
        return $this->hasMany('App\Models\EventOrganizer','EventOrganizerVerifiedBy','AdminId');
    }

    public function Payment() {
        return $this->hasMany('App\Models\Payment','PaymentVerifiedBy','AdminId');
    }
}
