<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properties', function(Blueprint $table)
		{
			$table->increments('id');
 			$table->string('name', 32);
		        $table->string('type', 64);
		        $table->string('address', 64);
			$table->string('to', 256);
			$table->float('minprice');
			$table->float('maxprice');
			$table->integer('bedrooms');
			$table->integer('bathrooms');
			$table->string('area');
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
		Schema::drop('properties');
	}

}
