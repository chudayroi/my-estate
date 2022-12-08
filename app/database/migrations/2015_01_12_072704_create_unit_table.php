<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unit', function($table)
		{
			//
			$table->string('id');
			$table->integer('user_id');
			$table->integer('create_by');
			$table->integer('modified_by');
	        $table->string('name');
	        $table->string('type');
	        $table->boolean('deleted')->default(0);
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
