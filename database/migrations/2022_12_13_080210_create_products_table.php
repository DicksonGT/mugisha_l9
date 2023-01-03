<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('products', function(Blueprint $table)
        {
            $table->increments('id');
			$table->string('name')->nullable();
			$table->string('barcode')->nullable();
			$table->unsignedInteger('product_cat_id');
			$table->unsignedInteger('price');
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
        Schema::drop('products');
    }
}