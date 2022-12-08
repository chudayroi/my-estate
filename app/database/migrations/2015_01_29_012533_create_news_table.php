<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function($table)
		{
			//
			$table->increments('id');
	        $table->integer('user_id');
	        $table->integer('create_by');
			$table->integer('modified_by');
	        $table->integer('categories_id');
	        $table->string('item_id');
	        $table->string('group_id');
	        $table->string('name');
	        $table->string('title');
	        $table->date("startdate");
	        $table->date("enddate");
	        $table->string('image');
	        $table->text('content');
	        $table->text('content_summary');
	        $table->text('tags');
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
