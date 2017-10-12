<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
  // Table Name
  protected $table = 'departements';
  // Primary Key
  public $primaryKey = 'id';
  // Timestamps
  public $timestamps = true;

  public function posts(){
      return $this->hasMany('App\Employees');
  }
}
