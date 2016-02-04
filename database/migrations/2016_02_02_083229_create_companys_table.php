<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companys', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 45);
			$table->string('address', 45);
			$table->string('email', 45)->unique();
			$table->integer('zone')->unsigned()->index('fk_zone_id_idx');
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
		Schema::drop('companys');
	}

}
