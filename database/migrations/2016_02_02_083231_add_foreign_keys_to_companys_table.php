<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('companys', function(Blueprint $table)
		{
			$table->foreign('zone', 'fk_zone_id')->references('id')->on('zones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('companys', function(Blueprint $table)
		{
			$table->dropForeign('fk_zone_id');
		});
	}

}
