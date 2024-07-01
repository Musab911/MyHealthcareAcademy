<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('internship_name');
            $table->string('first_industry');
            $table->string('first_field1')->nullable();
            $table->string('first_field2')->nullable();
            $table->string('first_field3')->nullable();
            $table->string('first_field4')->nullable();
            $table->string('first_field5')->nullable();
            $table->string('second_industry')->nullable();
            $table->string('second_field1')->nullable();
            $table->string('second_field2')->nullable();
            $table->string('second_field3')->nullable();
            $table->string('second_field4')->nullable();
            $table->string('second_field5')->nullable();
            $table->string('city');
            $table->integer('duration_weeks');
            $table->date('start_date');
            $table->decimal('price', 10, 2);
            $table->string('firstName');
            $table->string('lastName');
            $table->date('dateOfBirth');
            $table->string('gender');
            $table->string('nationality');
            $table->string('phone');
            $table->string('emailAddress');
            $table->string('nativeLanguage');
            $table->string('englishLevel');
            $table->text('motivation');
            $table->string('degree');
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
        Schema::dropIfExists('applications');
    }
}
