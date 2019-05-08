<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('rf_id')->unique()->nullable();
            $table->string('name',150)->nullable();
            $table->string('father_name',150)->nullable();
            $table->string('present_address',150)->nullable();
            $table->string('permanent_address',150)->nullable();
            $table->string('birth_registration_id',150)->nullable();
            $table->string('birth_date',150)->nullable();
            $table->string('national_id',150)->nullable();
            $table->string('nationality',150)->nullable();
            $table->string('religion',150)->nullable();
            $table->string('education',150)->nullable();
            $table->string('phone_number',150)->nullable();
            $table->string('blood_group',150)->nullable();
            $table->string('license_no',150);
            $table->string('license_category',150);
            $table->string('vehicle_type',150);
            $table->string('identifier_info',150)->nullable();
            $table->string('validity_date',150);
            $table->string('image',150)->nullable();
            $table->integer('print_status')->default(0)->unsigned();
            $table->integer('renew_status')->default(0)->unsigned();
            $table->integer('print_count')->default(0)->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamp('print_date')->nullable();
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
        Schema::dropIfExists('drivers');
    }
}
