<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineQuizzesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('online_quizzes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('grade');
			$table->string('subject');
			$table->string('title');
			$table->string('noOfQuestions');
			$table->string('time');
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
		Schema::drop('online_quizzes');
	}

}
