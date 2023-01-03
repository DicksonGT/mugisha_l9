<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMfisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('mfis', function(Blueprint $table)
        {
            $table->increments('id');
			$table->string('name');
			$table->string('address')->nullable();
			$table->string('phone_number');
			$table->unsignedInteger('region_id');
			$table->unsignedInteger('district_id');

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
        Schema::drop('mfis');
    }
}