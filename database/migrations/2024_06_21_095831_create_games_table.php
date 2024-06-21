<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the game

            $table->text('description')->nullable(); // Description of the game

            $table->string('slug')->unique(); // Slug for SEO-friendly URLs

            $table->decimal('entry_fee', 10, 2)->default(0.00); // Entry fee for playing the game

            $table->integer('max_players')->nullable(); // Maximum number of players allowed

            $table->boolean('active')->default(true); // Whether the game is active or not

            $table->dateTime('start_time')->nullable(); // Start time of the game

            $table->dateTime('end_time')->nullable(); // End time of the game

            $table->json('rules')->nullable(); // JSON column to store game rules

            $table->unsignedBigInteger('winner_id')->nullable(); // Foreign key to track winner

            $table->unsignedBigInteger('category_id')->nullable(); // Foreign key for game category

            $table->string('image_url')->nullable(); // URL for game images or thumbnails
    
            $table->timestamps(); 
    
            // Foreign key constraints
            $table->foreign('winner_id')->references('id')->on('users')->onDelete('set null'); 
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
