<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();

            // FR user-id
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('first_name', 225);
            $table->string('last_name', 225);
            $table->string('email', 225);
            $table->string('phone_number', 225);

            // FR department-id
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('department');

            $table->decimal('salary', 8, 2);

            // FR job-id
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->on('job');

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
        Schema::dropIfExists('employee');
    }
}
