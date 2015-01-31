<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddEnrollmentToPromoCodes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('promo_codes', function(Blueprint $table)
		{
			$table->integer('enrollment_id')->index();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('promo_codes', function(Blueprint $table)
		{
			$table->dropColumn('enrollment_id');
		});
	}

}
