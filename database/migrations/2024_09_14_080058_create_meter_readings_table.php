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
        Schema::create('meter_readings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id');
            $table->unsignedBigInteger('meter_id');
            $table->decimal('reading_value', 10, 2);
            $table->dateTime('reading_time');
            $table->timestamps();

            $table->foreign('meter_id')->references('id')->on('meters');
            $table->foreign('tenant_id')->references('id')->on('tenants');
            $table->index('meter_id, tenant_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meter_readings');
    }
};
