<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to link transactions to a user

            $table->string('type');  // Type of transaction (e.g., deposit, withdrawal, bet, payout)

            $table->decimal('amount', 10, 2); // Amount involved in the transaction

            $table->string('currency', 3)->default('USD'); // Currency of the transaction (assuming USD as default)

            $table->unsignedBigInteger('game_id')->nullable(); // Foreign key to link transactions to a specific game

            $table->unsignedBigInteger('payment_method_id')->nullable(); // Foreign key to link transactions to a payment method
            
            $table->timestamps(); 
        
            // Foreign key constraints
            $table->foreign('game_id')->references('id')->on('games')->onDelete('set null'); // Assuming games table exists
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('set null'); // Assuming payment_methods table exists
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
