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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', length: 100); //The string method creates a VARCHAR quivalent column of the given length
            $table->text('description'); //The text method creates a TEXT equivalent column:
            $table->timestamps(); //created_at,updated_at
            
        });
    }
};
