<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files', function($table)
		{
			//
			$table->increments('id');
	        $table->integer('create_by');
			$table->integer('modified_by');
	        $table->integer('user_id');
	        $table->integer('products_id');
	        $table->integer('categories_id');
	        $table->integer('sliders_id');
	        $table->string('name');
	        $table->string('src')->default('null');
	        $table->string('title')->default('null');
	        $table->string('content')->default('null');
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
