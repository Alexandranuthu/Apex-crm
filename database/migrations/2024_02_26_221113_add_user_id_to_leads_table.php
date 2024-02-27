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
        Schema::table('leads', function (Blueprint $table) {
            //add user_id column to leads table that comes after the id column
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            //specify that the user_id column is a foreign key that references the id column of the users table
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->constraint()
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
