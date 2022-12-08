<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			//
			$table->increments('id');
			$table->integer('usertype_id');
	        $table->string('email')->unique();
	        $table->string('password')->default('null');
	        $table->string('fb_id')->default('null');
	        $table->string('first_name')->default('null');
	        $table->string('last_name')->default('null');
	        $table->string('fb_fullname')->default('null');
	        $table->string('remember_token')->default('null');
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
