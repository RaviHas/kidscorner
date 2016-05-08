<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventCalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up()
	{
		Schema::create('event_cals', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('title');

			$table->date('eventDate');

			$table->string('venue');

			$table->time('time');

			$table->string('type');

			$table->string('photo');

			$table->string('color');

			$table->date('endDate');

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
		Schema::drop('event_cals');
	}

}
