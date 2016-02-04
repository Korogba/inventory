<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRepairDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('repair_details', function(Blueprint $table)
		{
			$table->foreign('type_id', 'fk_type_id')->references('id')->on('repair_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('repair_details', function(Blueprint $table)
		{
			$table->dropForeign('fk_type_id');
		});
	}

}
