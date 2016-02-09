<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCarmodelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('carmodel', function(Blueprint $table)
		{
			$table->foreign('carmake_id', 'fk_carmake_id')->references('carmake_id')->on('carmake')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('carmodel', function(Blueprint $table)
		{
			$table->dropForeign('fk_carmake_id');
		});
	}

}
