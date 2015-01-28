<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPriceToLocalClasses extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('local_classes', function(Blueprint $table)
		{
			$table->integer('price')->default(30);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('local_classes', function(Blueprint $table)
		{
			$table->dropColumn('price');
		});
	}

}
