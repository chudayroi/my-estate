<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsAmountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_amount', function($table)
		{
			//
			$table->integer('id');
			$table->integer('user_id');
			$table->integer('create_by');
			$table->integer('modified_by');
	        $table->string('name');
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
