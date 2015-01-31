<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPromoToEnrollments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('enrollments', function(Blueprint $table)
		{
			$table->integer('promo_code_id')->index();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('enrollments', function(Blueprint $table)
		{
			$table->dropColumn('promo_code_id');
		});
	}

}
