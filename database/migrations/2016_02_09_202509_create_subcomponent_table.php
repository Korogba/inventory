<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubcomponentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcomponent', function(Blueprint $table)
		{
			$table->increments('subcomponent_id');
			$table->string('name', 45);
			$table->integer('component_id')->unsigned()->index('fk_type_id_idx');
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
		Schema::drop('subcomponent');
	}

}
