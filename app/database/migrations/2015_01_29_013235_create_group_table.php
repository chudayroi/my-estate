<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group', function($table)
		{
			//
			$table->integer('id');
			$table->integer('user_id');
			$table->integer('create_by');
			$table->integer('modified_by');
			$table->integer('item_id');
			$table->integer('country_id');
	        $table->string('name');
	        $table->string('title');
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
