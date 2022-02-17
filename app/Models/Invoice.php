<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'itbis',
        'subtotal',
        'date',
        'client_id',
        'product_id',
        'user_id',
        'hasOrder',
    ];
}
