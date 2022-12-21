<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $table = "EventType";
    protected $primaryKey = 'EventTypeId';
    public $timestamps = false;

    public function Event() {
        return $this->hasMany('App\Models\Event','EventTypeId','EventTypeId');
    }

    protected $fillable = [
        'EventTypeName'
    ];

    use HasFactory;
}
