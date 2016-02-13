<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('address', function(Blueprint $table)
		{
			$table->increments('address_id');
			$table->string('persontitle', 5);
			$table->string('firstname', 20);
			$table->string('lastname', 20);
			$table->string('address1', 50);
			$table->string('address2', 50)->nullable();
			$table->integer('zone_id')->unsigned()->index('fk_zone_id_idx');
			$table->string('country', 5)->default('NGA');
			$table->string('po_box', 10)->nullable();
			$table->string('phone', 10);
			$table->string('mobilephone', 10);
			$table->string('fax', 10)->nullable();
			$table->string('email', 50);
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
		Schema::drop('address');
	}

}
