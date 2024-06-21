<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to link game results to a user

            $table->foreignId('game_id')->constrained()->onDelete('cascade'); // Foreign key to link game results to a game

            $table->boolean('win')->default(false); // Indicates whether the user won the game

            $table->integer('score')->nullable(); // Score achieved by the user in the game

            $table->decimal('payout_amount', 10, 2)->nullable(); // Amount paid out to the user for winning

            $table->json('additional_data')->nullable(); // JSON column for storing additional game result data
            
            $table->timestamps(); 
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_results');
    }
}
