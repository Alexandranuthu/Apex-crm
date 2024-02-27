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
        Schema::table('posts', function (Blueprint $table) {
            // The new column will be called user_id and it will be an unsignedBigInteger
            $table->unsignedBigInteger('user_id')->after('id');
            //specify that the user_id column is a foreign key that references the id column of the users table
            // and that we want to cascade any delete operations
            //add constraint to the user_id column
            //A constraint is a rule that the database follows to maintain the integrity of the data
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->constrained()
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
           //remove the modified relationship
            //Drop the foreign key user_id in the post table
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
