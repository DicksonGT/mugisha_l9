<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('feedback', function(Blueprint $table)
        {
            $table->increments('id');
			$table->unsignedInteger('member_id');
			$table->unsignedInteger('offer_id');
			$table->string('comment');
			$table->unsignedInteger('rating');

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
        Schema::drop('feedback');
    }
}