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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
             //$table->foreignId('user_id')->constrained();
             $table->string('name');
             $table->string('email');
             $table->string('phone');
             $table->string('message')->nullable();
             //value in dollars
             $table->float('value')->nullable()->default(123.45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
