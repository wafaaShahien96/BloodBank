<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBloodTypesTable extends Migration {

	public function up()
	{
		Schema::create('blood_types', function(Blueprint $table) {
	    $table->increments('id');
        $table->timestamps();
     	$table->enum('blood_type', array('O-','O','A-','A+','B-','B+','AB-','AB+'));
		});
	}

	public function down()
	{
		Schema::drop('blood_types');
	}
}