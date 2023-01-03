<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('product_cats', function(Blueprint $table)
        {
            $table->increments('id');
			$table->string('name');
			$table->string('code')->nullable();
			$table->unsignedInteger('business_type_id');

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
        Schema::drop('product_cats');
    }
}