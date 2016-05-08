<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpldtblsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up()
	{
		Schema::create('upldtbls', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('subject',25);
			$table->integer('grade');
			$table->string('url',2083);
			$table->string('title',2083);

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
		Schema::drop('upldtbls');
	}

}
