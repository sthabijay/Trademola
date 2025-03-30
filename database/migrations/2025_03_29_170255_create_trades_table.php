<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("symbol");
            $table->boolean("is_open");
            $table->integer("buy_price");
            $table->integer("sell_price");
            $table->integer("units");
            $table->integer("target");
            $table->integer("stoploss");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
