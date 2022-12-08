<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	        
		Schema::create('products', function($table)
		{
			//
			$table->increments('id');
	        $table->integer('create_by');
	        $table->integer('user_id');
			$table->integer('modified_by');
	        $table->integer('categories_id');
	        $table->string('types_id');
	        $table->string('name');
	        $table->string('title');
	        $table->date("startdate");
	        $table->date("enddate");
	        $table->string('street');
	        $table->integer('district_id');
	        $table->integer('city_id');
	        $table->decimal('area', 18, 2);
	        $table->string('area_unit_id');
	        $table->decimal('amount', 18, 2);
	        $table->string('amount_unit_id');
	        $table->string('image');
	        $table->text('content');
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
