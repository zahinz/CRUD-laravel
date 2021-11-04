<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_history', function (Blueprint $table) {
            $table->id();

            // FR employee-id
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employee');

            $table->dateTime('start_date');
            $table->dateTime('end_date');

            // FR job-id
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->on('job');

            // FR department-id
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('department');

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
        Schema::dropIfExists('job_history');
    }
}
