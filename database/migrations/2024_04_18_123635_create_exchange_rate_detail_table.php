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
        Schema::create('exchange_rate_detail', function (Blueprint $table) {
            $table->string('id_exchange_detail')->primary();
            $table->string('id_exchange')->nullable();
            $table->string('currency_name')->nullable();
            $table->double('exchange_rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchange_rate_detail');
    }
};
