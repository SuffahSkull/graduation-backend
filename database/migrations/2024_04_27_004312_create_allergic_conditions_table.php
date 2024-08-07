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
        Schema::create('allergic_conditions', function (Blueprint $table) {
            $table->id(); 
            $table->string('allergy');
            $table->date('dateOfSymptomOnset');
            $table->text('generalDetails');
            $table->unsignedBigInteger('medicalRecordID');
            $table->foreign('medicalRecordID')->references('id')->on('medical_records');
            $table->unsignedBigInteger('valid')->default(0);

            $table->timestamps();

           $table->index('medicalRecordID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allergic_conditions');
    }
};
