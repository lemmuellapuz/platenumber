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
        Schema::create('vehicle_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->string('plate_number');
            $table->string('vehicle_make');
            $table->string('model');
            $table->string('color');
            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles');

            $table->index('vehicle_id');
            $table->index('plate_number');
            $table->index('vehicle_make');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_logs');
    }
};
