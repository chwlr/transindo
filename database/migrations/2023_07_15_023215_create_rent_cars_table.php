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
        Schema::create('rent_cars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_user')->nullable(false);
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->uuid('id_car')->nullable(false);
            $table->foreign('id_car')->references('id')->on('cars')->onDelete('cascade');
            $table->timestamp('startRent');
            $table->timestamp('finishRent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_cars');
    }
};
