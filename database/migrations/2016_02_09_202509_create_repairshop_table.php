<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairshopTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repairshop', function(Blueprint $table)
		{
			$table->increments('repairshop_id');
			$table->string('repairshop', 45);
			$table->integer('address_id')->unsigned();
			$table->string('email', 45);
			$table->integer('zone_id')->unsigned()->index('fk_zone_id_idx');
			$table->string('phone_number', 14);
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
		Schema::drop('repairshop');
	}

}
