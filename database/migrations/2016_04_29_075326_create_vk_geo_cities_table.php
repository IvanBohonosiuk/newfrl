<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVkGeoCitiesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'vk_geo_cities', function ( Blueprint $table )
		{
			$table->bigInteger( 'city_id' )
				  ->index()
			;
			$table->bigInteger( 'country_id' )
				  ->index()
			;
			$table->string( 'lang', 2 )
				  ->index()
			;
			$table->string( 'title' )
				  ->index()
			;
			$table->text( 'area' )
				  ->nullable()
			;
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop( 'vk_geo_cities' );
	}
}
