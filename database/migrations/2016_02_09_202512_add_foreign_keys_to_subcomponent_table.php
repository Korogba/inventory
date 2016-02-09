<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubcomponentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subcomponent', function(Blueprint $table)
		{
			$table->foreign('component_id', 'fk_component_id')->references('component_id')->on('component')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subcomponent', function(Blueprint $table)
		{
			$table->dropForeign('fk_component_id');
		});
	}

}
