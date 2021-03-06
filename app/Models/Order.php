<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'stock',
        'initial',
        'paid',
        'size',
        'color',
        'type',
        'details',
        'deliveryDate',
        'client_id',
        'is_paid',
    ];

}
