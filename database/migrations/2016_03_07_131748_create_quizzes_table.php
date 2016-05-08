<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quizzes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('grade');
			$table->string('subject');
			$table->string('title');
			$table->string('questiontype');
			$table->string('questiontext');
			$table->string('questionimage');
			$table->string('answer1');
			$table->string('answer2');
			$table->string('answer3');
			$table->string('answer4');
			$table->integer('canswer');
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
		Schema::drop('quizzes');
	}

}
