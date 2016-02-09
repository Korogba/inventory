<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rate', function(Blueprint $table)
		{
			$table->foreign('subcomponent_id', 'fk_subcomponent_id')->references('subcomponent_id')->on('subcomponent')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('repairshop_id', 'fk_repairshop_id')->references('repairshop_id')->on('repairshop')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('carmodel_id', 'fk_carmodel_id')->references('carmodel_id')->on('carmodel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rate', function(Blueprint $table)
		{
			$table->dropForeign('fk_subcomponent_id');
			$table->dropForeign('fk_repairshop_id');
			$table->dropForeign('fk_carmodel_id');
		});
	}

}
