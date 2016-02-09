<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRepairshopTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('repairshop', function(Blueprint $table)
		{
			$table->foreign('zone_id', 'fk_zone_id')->references('zone_id')->on('zone')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('repairshop', function(Blueprint $table)
		{
			$table->dropForeign('fk_zone_id');
		});
	}

}
