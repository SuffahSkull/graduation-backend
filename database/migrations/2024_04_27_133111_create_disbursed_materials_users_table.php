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
        Schema::create('disbursed_materials_users', function (Blueprint $table) {
            $table->id(); 
            $table->integer('quantity');
           // $table->string('status');
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('centerID');
            $table->unsignedBigInteger('disbursedMaterialID');
            $table->foreign('userID')->references('id')->on('users');
            $table->foreign('centerID')->references('id')->on('medical_centers');
            $table->foreign('disbursedMaterialID')->references('id')->on('disbursed_materials');
            $table->unsignedBigInteger('valid')->default(0);
            $table->integer('expenseQuantity')->default(0);

            $table->timestamps();
            

        
           $table->index(['centerID', 'created_at']);

           $table->index(['userID', 'centerID', 'disbursedMaterialID'], 'disbursed');
          
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disbursed_materials_users');
    }
};
