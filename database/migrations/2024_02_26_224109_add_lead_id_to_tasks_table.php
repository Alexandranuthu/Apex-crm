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
        Schema::table('tasks', function (Blueprint $table) {
            //Add lead_id column to tasks table that comes after the id column
            
            $table->unsignedBigInteger('lead_id')->nullable()->after('id');
            //specify that the lead_id column is a foreign key that references the id column of the leads table
            $table->foreign('lead_id')
                  ->references('id')
                  ->on('leads')
                  ->constraint()
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['lead_id']);
            $table->dropColumn('lead_id');
        });
    }
};
