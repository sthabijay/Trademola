<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'symbol',
        'nickname',
        'total_units',
        'gross',
        'avg_buy_price',
        'target',
        'stoploss',
        'avg_sell_price',
        'rating',
        'tags',
        'note',
    ];

    protected $casts = [
        'tags' => 'array',
        'avg_sell_price' => 'integer',
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    // Optional: computed property for is_open
    public function getIsOpen(): bool
    {
        return $this->total_units > 0;
    }
}
