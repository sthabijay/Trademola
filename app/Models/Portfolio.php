<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'IS_MAIN',
        'gross',
        'current_investment',
        'current_value',
        'total_units'
    ];

    public function reevaluateMetrics()
    {    
        $this->gross = round($this->logs()->sum('gross'), 2);

        $this->current_investment = round($this->logs->sum(function ($log) {
            return $log->total_units * $log->avg_buy_price;
        }), 2);

        $this->current_value = round($this->logs->sum(function ($log) {
            $price = $log->avg_sell_price ?? $log->avg_buy_price;
            return $log->total_units * $price;
        }), 2);

        $this->total_units = round($this->logs()->sum('total_units'), 2);

        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }
}
