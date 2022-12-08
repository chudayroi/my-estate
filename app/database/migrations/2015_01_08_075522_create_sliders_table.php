<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sliders', function($table)
		{
			$table->increments('id');
	        $table->integer('user_id');
			$table->integer('create_by');
			$table->integer('modified_by');
	        $table->string('title')->default('null');;
	        $table->string('content')->default('null');
	        $table->date("startdate");
	        $table->date("enddate");
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
