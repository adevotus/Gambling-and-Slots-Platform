<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the payment method (e.g., Credit Card, PayPal)

            $table->string('type'); // Type of the payment method (e.g., credit_card, paypal)

            $table->boolean('is_active')->default(true); // Whether the payment method is active or not
            
            $table->timestamps(); // Laravel default columns for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
}
