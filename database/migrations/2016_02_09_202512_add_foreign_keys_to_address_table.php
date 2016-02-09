<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('address', function(Blueprint $table)
		{
			$table->foreign('zone_id', 'fk_address_zone_id')->references('zone_id')->on('zone')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('repairshop_id', 'fk_address_repairshop_id')->references('repairshop_id')->on('repairshop')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('address', function(Blueprint $table)
		{
			$table->dropForeign('fk_address_zone_id');
			$table->dropForeign('fk_address_repairshop_id');
		});
	}

}
