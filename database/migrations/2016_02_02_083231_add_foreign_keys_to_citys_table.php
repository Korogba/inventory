<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCitysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('citys', function(Blueprint $table)
		{
			$table->foreign('state_id', 'fk_state_id')->references('id')->on('states')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('citys', function(Blueprint $table)
		{
			$table->dropForeign('fk_state_id');
		});
	}

}
