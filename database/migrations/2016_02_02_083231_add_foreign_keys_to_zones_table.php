<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToZonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('zones', function(Blueprint $table)
		{
			$table->foreign('city_id', 'fk_city_id')->references('id')->on('citys')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('zones', function(Blueprint $table)
		{
			$table->dropForeign('fk_city_id');
		});
	}

}
