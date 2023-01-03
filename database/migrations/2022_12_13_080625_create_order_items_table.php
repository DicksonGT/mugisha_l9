<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('order_items', function(Blueprint $table)
        {
            $table->increments('id');
			$table->string('order_code');
			$table->unsignedInteger('product_id');
			$table->unsignedInteger('service_id');
			$table->unsignedInteger('quantity')->default(0);
			$table->unsignedInteger('price')->default(0);
			$table->unsignedInteger('total')->default(0);
			$table->unsignedInteger('member_id');

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
        Schema::drop('order_items');
    }
}