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

    public function recalculateMetrics()
    {
        $entries = $this->entries;

        $buyEntries = $entries->where('is_buy', true);
        $sellEntries = $entries->where('is_buy', false);

        $totalBoughtUnits = $buyEntries->sum('units');
        $totalSellUnits = $sellEntries->sum('units');

        $avgBuyPrice = $totalBoughtUnits > 0
            ? $buyEntries->sum(fn($e) => $e->price * $e->units) / $totalBoughtUnits
            : 0;

        $avgSellPrice = $totalSellUnits > 0
            ? $sellEntries->sum(fn($e) => $e->price * $e->units) / $totalSellUnits
            : 0;

        $gross = ($avgSellPrice * $totalSellUnits) - ($avgBuyPrice * $totalSellUnits);

        $this->update([
            'total_units' => $totalBoughtUnits - $totalSellUnits,
            'avg_buy_price' => $avgBuyPrice,
            'avg_sell_price' => $avgSellPrice,
            'gross' => $gross,
        ]);
    }


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
