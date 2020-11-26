<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('patient_name');
			$table->string('patient_phone');
			$table->string('hospital_name');
			$table->date('patient_age');
			$table->integer('bags_number');
			$table->string('hospital_address');
			$table->text('details');
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
			$table->integer('blood_type_id')->unsigned();
			$table->integer('client_id')->unsigned();
			$table->integer('city_id')->unsigned();
			
			
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}