<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarmodelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carmodel', function(Blueprint $table)
		{
			$table->increments('carmodel_id');
			$table->string('carmodel', 45);
			$table->integer('carmake_id')->unsigned()->index('fk_id_car_idx');
			$table->date('year');
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
		Schema::drop('carmodel');
	}

}
