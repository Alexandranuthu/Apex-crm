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
        Schema::create('Deals', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('owner');
            $table->decimal('amount', 10, 2);
            $table->integer('status');
            $table->date('start_date');
            $table->date('close_date');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Deals');
    }
};
