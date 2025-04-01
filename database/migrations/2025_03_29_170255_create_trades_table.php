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
            
            // Required columns
            $table->string("symbol");
            $table->integer("buy_price");
            $table->integer("units");

            // Optional columns
            $table->boolean("is_open")->nullable();
            $table->integer("sell_price")->nullable();
            $table->integer("target")->nullable();
            $table->integer("stoploss")->nullable();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
