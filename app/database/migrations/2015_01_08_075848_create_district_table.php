<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	        
		Schema::create('district', function($table)
		{
			//
			$table->integer('id');
			$table->integer('user_id');
			$table->integer('create_by');
			$table->integer('modified_by');
	        $table->integer('city_id');
	        $table->string('name');
	        $table->string('value');
	        $table->boolean("deleted")->default(0);
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
		//
	}

}
