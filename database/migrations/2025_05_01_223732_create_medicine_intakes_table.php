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
        Schema::create('medicine_intakes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_id');
            $table->unsignedBigInteger('patient_id');
            $table->json('intake_time'); 
            $table->string('dosage')->nullable(); // or whatever type makes sense
            $table->boolean('usable_for_infants')->default(false);  // Add the column here

            $table->timestamps();
    
            $table->foreign('medicine_id')->references('id')->on('medicines');
            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_intakes');
    }
};
