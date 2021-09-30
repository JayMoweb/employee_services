<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salary', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name',120);
            $table->string('employee_salary1');
            $table->string('employee_salary2');
            $table->string('employee_salary3');
            $table->string('employee_salary4');
            $table->string('salary_types');   
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
        Schema::dropIfExists('employee_salary');
    }
}
