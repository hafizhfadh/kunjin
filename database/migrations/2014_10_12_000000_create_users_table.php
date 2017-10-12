<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
<<<<<<< HEAD
=======
use App\User;
>>>>>>> e8a8e39f290ba5e127282cc8606d470c6296cc4f

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
<<<<<<< HEAD
=======
        User::create([
          'name' => 'Admin',
          'email'=> 'smktarunabhaktihubin@gmail.com',
          'password'=> bcrypt('semangatya')
        ]);
>>>>>>> e8a8e39f290ba5e127282cc8606d470c6296cc4f
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
