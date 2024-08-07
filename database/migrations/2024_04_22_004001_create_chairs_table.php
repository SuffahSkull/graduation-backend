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
        Schema::create('chairs', function (Blueprint $table) {
            $table->id(); 
            $table->integer('chairNumber');
            $table->string('roomName');
            $table->unsignedBigInteger('centerID');
            $table->foreign('centerID')->references('id')->on('medical_centers');
            $table->unsignedBigInteger('valid')->default(0);

            $table->timestamps();

           $table->index('centerID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chairs');
    }
};
