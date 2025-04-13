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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('portfolio_id')->constrained()->onDelete('cascade');
            $table->string('symbol');
            $table->string('nickname')->nullable();
            $table->integer('total_units');
            $table->integer('gross');
            $table->integer('avg_buy_price');
            $table->integer('wacc')->nullable();
            $table->integer('target')->nullable();
            $table->integer('stoploss')->nullable();
            $table->integer('avg_sell_price')->nullable();
            $table->integer('rating')->nullable();
            $table->json('tags')->nullable();
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
