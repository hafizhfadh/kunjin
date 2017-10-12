<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('office_id');
            $table->integer('departement_id');
            $table->integer('position_id');
            $table->integer('age');
            $table->integer('detail_employee_id');
            $table->string('name');
            $table->date('joint');
            $table->integer('lengthofwork');
            $table->date('startcontract');
            $table->date('endcontract');
            $table->integer('lengthofcontract');
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
        Schema::dropIfExists('employees');
    }
}
