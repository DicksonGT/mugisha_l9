<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('members', function(Blueprint $table)
        {
            $table->increments('id');
			$table->string('first_name');
			$table->string('second_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('phone_number');
			$table->string('nida_number')->nullable();
			$table->string('employment_status')->default('self employed');
			$table->string('employer')->nullable();
			$table->unsignedInteger('region_id')->default(1);
			$table->unsignedInteger('district_id')->default(1);
			$table->string('club_name')->nullable();

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
        Schema::drop('members');
    }
}