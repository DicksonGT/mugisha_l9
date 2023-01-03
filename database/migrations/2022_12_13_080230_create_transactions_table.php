<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('transactions', function(Blueprint $table)
        {
            $table->increments('id');
			$table->unsignedInteger('txn_id');
			$table->unsignedInteger('type');
			$table->unsignedInteger('company_id');
			$table->unsignedInteger('member_id');
			$table->unsignedInteger('offer_id');
			$table->unsignedInteger('amount');
			$table->text('details');

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
        Schema::drop('transactions');
    }
}