<?php

namespace App;

use App\Departure;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
  use Notifiable;
    protected $table = 'students';

    protected $fillable = [
        'nipd', 'name', 'class', 'email', 'password'
    ];

    public function departure()
    {
      return $this->hasMany(Depature::class);
    }
}
