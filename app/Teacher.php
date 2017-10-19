<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
  protected $fillable = [
      'nik', 'name', 'class', 'email', 'password'
  ];
}
