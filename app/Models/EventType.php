<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    // ngasi tau nama tabel
    protected $table = "EventType";

    // ngasi tau nama primary key
    protected $primaryKey = 'EventTypeId';

    // ngasi tau ga ada kolom timestamps
    public $timestamps = false;

    // ngasi tau relasi
    public function Event() {
        return $this->hasMany('App\Models\Event','EventTypeId','EventTypeId');
    }

    // ngasi tau kolom yang bisa diisi
    protected $fillable = [
        'EventTypeName'
    ];

    use HasFactory;
}
