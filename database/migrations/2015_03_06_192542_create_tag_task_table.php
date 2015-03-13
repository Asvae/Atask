<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_task', function(Blueprint $table)
		{
            $table->increments('id');
            $table->timestamps();

            $table->integer('tag_id')->unsigned();
            $table ->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');

            $table->integer('task_id')->unsigned();
            $table ->foreign('task_id')
                ->references('id')
                ->on('tasks')
                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tag_task');
	}

}
