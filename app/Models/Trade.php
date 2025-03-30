<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $fillable = ['symbol', 'is_open', 'buy_price', 'sell_price', 'units', 'target', 'stoploss']; 

    /** @use HasFactory<\Database\Factories\TradeFactory> */
    use HasFactory;
}
