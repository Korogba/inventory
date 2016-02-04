<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prices', function(Blueprint $table)
		{
			$table->foreign('repair_details', 'fk_repair_details')->references('id')->on('repair_details')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('company_id', 'fk_company_id')->references('id')->on('companys')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('brand_id', 'fk_brand_id')->references('id')->on('brands')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prices', function(Blueprint $table)
		{
			$table->dropForeign('fk_repair_details');
			$table->dropForeign('fk_company_id');
			$table->dropForeign('fk_brand_id');
		});
	}

}
