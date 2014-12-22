<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummaryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('summary',function($table)
        {
            $table->increments('tid');
            $table->string('title',64);
            $table->tinyInteger('cid');
            $table->text('content');
            $table->timestamp('create_date');
            $table->timestamp('last_change');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::drop('summary');
	}

}
