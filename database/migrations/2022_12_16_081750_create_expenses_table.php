<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('expenses', function(Blueprint $table)
        {
            $table->increments('id');
			$table->unsignedInteger('client_id');
			$table->string('item')->nullable();
			$table->date('paid_on')->nullable();
			$table->unsignedInteger('payment_method')->default(1);
			$table->unsignedInteger('amount')->default(0);

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
        Schema::drop('expenses');
    }
}