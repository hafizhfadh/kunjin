<?php

namespace App;

use App\Departure;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    public function departure()
    {
      return $this->hasMany(Depature::class);
    }
}
