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
        Schema::create('treatment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doc_id'); // Define doc_id column
            $table->unsignedBigInteger('pet_id'); // Define pet_id column
            $table->string('note');
            $table->string('treatment');
            $table->timestamps();

            // Adding foreign key constraints
            $table->foreign('doc_id')->references('id')->on('doctors');
            $table->foreign('pet_id')->references('id')->on('pets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
