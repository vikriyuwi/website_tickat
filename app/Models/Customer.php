<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'CustomerId';

    protected $table = "Customer";
    protected $fillable = [
        'CustomerName',
        'CustomerEmail',
        'CustomerPhone',
        'CustomerPass',
        'CustomerGender',
        // 'CustomerStatus',
    ];
}
