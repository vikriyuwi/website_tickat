<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSalesPerMonth extends Model
{
    use HasFactory;

    // ngasi tau nama tabel
    protected $table = "EventSalesPerMonth";

    // ngasi tau ga ada kolom timestamps
    public $timestamps = false;
}
