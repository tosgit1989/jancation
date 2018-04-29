<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayLogsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('play_logs', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('from_user_id');
			$table->integer('to_user_id');
			$table->integer('result');
			$table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('play_logs');
	}
}
