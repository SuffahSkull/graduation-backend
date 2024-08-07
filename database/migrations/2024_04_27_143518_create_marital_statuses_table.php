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
        Schema::create('marital_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('childrenNumber');
            $table->string('healthStateChildren');
            $table->unsignedBigInteger('generalPatientInformationID');
            $table->foreign('generalPatientInformationID')->references('id')->on('general_patient_informations');
            $table->unsignedBigInteger('valid')->default(0);
            $table->timestamps();
           $table->index('generalPatientInformationID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marital_statuses');
    }
};
