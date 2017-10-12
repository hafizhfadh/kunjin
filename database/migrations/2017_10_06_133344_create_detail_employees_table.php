<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact')->nullable();
            $table->text('address')->nullable();
            $table->string('religion')->nullable();
            $table->string('birthDate')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
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
        Schema::dropIfExists('detail_employees');
    }
}
