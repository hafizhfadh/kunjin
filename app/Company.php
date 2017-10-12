<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    public function departure()
    {
      return $this->hasOne(Depature::class);
    }
}
