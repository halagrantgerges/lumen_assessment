<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('email');
            $table->float('total_amount_net');
            $table->string('payment_method');
            $table->float('discount_value');
            $table->float('total_payment_after_discount');
            $table->timestamps();
            
            /*
                  "email": "test@email.com",
      "total_amount_net": "1890.00",
      "shipping_costs": "29.00",
      "payment_method": "VISA",
             * */
             
             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order');
    }
}


