<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rate', function(Blueprint $table)
		{
			$table->increments('rate_id');
			$table->integer('subcomponent_id')->unsigned()->index('fk_repair_details_idx');
			$table->integer('repairshop_id')->unsigned()->index('fk_company_id_idx');
			$table->integer('carmodel_id')->unsigned()->index('fk_brand_id_idx');
			$table->decimal('amount', 9)->unsigned();
			$table->timestamps();
			$table->decimal('min_amount', 9);
			$table->decimal('max_amount', 9);
			$table->unique(['subcomponent_id','repairshop_id','carmodel_id'], 'unique');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rate');
	}

}
