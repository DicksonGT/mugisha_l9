<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('orders', function(Blueprint $table)
        {
            $table->increments('id');
			$table->string('order_code');
			$table->date('date');
			$table->unsignedInteger('total')->default(0);
			$table->string('tranx_code');
			$table->unsignedInteger('client_id');
			$table->date('paid_on')->nullable();
			$table->unsignedInteger('item_count');
			$table->unsignedInteger('payment_status')->default(100);
			$table->unsignedInteger('status_code')->default(100);

            $table->softDeletes();
            $table->timestamps();

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}