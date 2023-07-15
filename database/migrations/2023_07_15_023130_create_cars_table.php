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
        Schema::create('cars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_user')->nullable(false);
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('brand');
            $table->string('model');
            $table->string('numberPlate');
            $table->decimal('rates', 10,2);
            $table->enum('availability', ['available', 'unavailable']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
