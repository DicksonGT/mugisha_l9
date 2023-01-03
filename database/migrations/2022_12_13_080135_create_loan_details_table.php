<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('loan_details', function(Blueprint $table)
        {
            $table->increments('id');
			$table->unsignedInteger('member_id');
			$table->unsignedInteger('amount_requested');
			$table->unsignedInteger('amount_granted')->default(0);
			$table->date('request_date');
			$table->date('funding_date')->nullable();
			$table->unsignedInteger('mfi_id')->nullable();
			$table->unsignedInteger('mfi_product_id')->nullable();
			$table->unsignedInteger('status_code')->nullable();
			$table->text('comment')->nullable();

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
        Schema::drop('loan_details');
    }
}