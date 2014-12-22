<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('catalog',function($table)
        {
            $table->increments('id');
            $table->string('name',32);
        });

        DB::table('catalog')->insert(array(
            'name'=>"每日总结"
        ));
        DB::table('catalog')->insert(array(
            'name'=>"月度总结"
        ));
        DB::table('catalog')->insert(array(
            'name'=>"年度总结"
        ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::drop('catalog');
	}

}
