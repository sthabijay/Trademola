<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_id',
        'symbol',
        'price',
        'units',
        'is_buy',
    ];

    protected $casts = [
        'is_buy' => 'boolean',
    ];

    public function log()
    {
        return $this->belongsTo(Log::class);
    }

}