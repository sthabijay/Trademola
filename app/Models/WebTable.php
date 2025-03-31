<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebTable extends Model
{
    protected $fillable = ['symbol', 'ltp'];

    public static function dropData()
    {
        self::truncate();
    }

    /** @use HasFactory<\Database\Factories\WebTableFactory> */
    use HasFactory;
}
