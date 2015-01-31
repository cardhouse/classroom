<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnrollmentPromoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enrollment_promo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('enrollment_id')->unsigned()->index();
			$table->foreign('enrollment_id')->references('id')->on('enrollments')->onDelete('cascade');
			$table->integer('promo_id')->unsigned()->index();
			$table->foreign('promo_id')->references('id')->on('promo_codes')->onDelete('cascade');
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
		Schema::drop('enrollment_promo');
	}

}
